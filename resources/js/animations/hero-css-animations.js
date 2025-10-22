/**
 * Hero Animation System - Alpine.js Compatible
 * Uses CSS classes instead of direct DOM manipulation
 */
class HeroAnimationSystem {
  constructor() {
    this.currentSlideIndex = 0
    this.isAnimating = false
    this.init()
  }

  init() {
    // Wait for Alpine.js to initialize
    document.addEventListener('alpine:init', () => {
      this.setupHeroAnimations()
    })
    
    // Also setup if Alpine is already initialized
    if (window.Alpine) {
      this.setupHeroAnimations()
    }
  }

  setupHeroAnimations() {
    // Wait for DOM to be ready
    setTimeout(() => {
      this.initializeSlideAnimations()
      this.setupAlpineIntegration()
    }, 300)
  }

  initializeSlideAnimations() {
    const heroSection = document.querySelector('[x-data*="carousel"]')
    if (!heroSection) return

    // Setup initial animations for first slide
    this.setupSlideContent(0)
  }

  setupAlpineIntegration() {
    const heroSection = document.querySelector('[x-data*="carousel"]')
    if (!heroSection) return

    // Get Alpine.js carousel instance
    const alpineCarousel = heroSection._x_dataStack?.[0]
    
    if (alpineCarousel) {
      // Store reference
      this.alpineCarousel = alpineCarousel
      
      // Override the carousel's start method to include our animations
      const originalStart = alpineCarousel.start
      alpineCarousel.start = () => {
        originalStart.call(alpineCarousel)
        this.setupSlideChangeListener()
      }
    }
  }

  setupSlideChangeListener() {
    const heroSection = document.querySelector('[x-data*="carousel"]')
    if (!heroSection) return

    // Use MutationObserver to detect slide changes
    const observer = new MutationObserver((mutations) => {
      mutations.forEach((mutation) => {
        if (mutation.type === 'attributes' && mutation.attributeName === 'style') {
          const slidesWrapper = mutation.target
          if (slidesWrapper.classList.contains('flex')) {
            this.handleSlideChange()
          }
        }
      })
    })

    observer.observe(heroSection, {
      attributes: true,
      subtree: true
    })

    // Also listen for Alpine.js updates
    const alpineObserver = new MutationObserver((mutations) => {
      mutations.forEach((mutation) => {
        if (mutation.type === 'childList') {
          // Check if this is a slide change
          const addedNodes = Array.from(mutation.addedNodes)
          const removedNodes = Array.from(mutation.removedNodes)
          
          if (addedNodes.some(node => node.classList?.contains('slide')) ||
              removedNodes.some(node => node.classList?.contains('slide'))) {
            setTimeout(() => this.handleSlideChange(), 100)
          }
        }
      })
    })

    alpineObserver.observe(heroSection, {
      childList: true,
      subtree: true
    })
  }

  setupSlideContent(slideIndex) {
    const heroSection = document.querySelector('[x-data*="carousel"]')
    if (!heroSection) return

    const slides = heroSection.querySelectorAll('.slide')
    const currentSlide = slides[slideIndex]
    
    if (!currentSlide) return

    // Remove any existing animation classes
    this.removeAnimationClasses(currentSlide)

    // Add animation classes
    setTimeout(() => {
      this.addAnimationClasses(currentSlide)
    }, 100)
  }

  addAnimationClasses(slide) {
    const title = slide.querySelector('h1')
    const subtitle = slide.querySelector('p')
    const button = slide.querySelector('button')

    if (title) {
      this.setupTitleAnimation(title)
    }
    if (subtitle) {
      subtitle.classList.add('hero-subtitle')
    }
    if (button) {
      button.classList.add('hero-button')
    }
  }

  removeAnimationClasses(slide) {
    const title = slide.querySelector('h1')
    const subtitle = slide.querySelector('p')
    const button = slide.querySelector('button')

    if (title) {
      title.classList.remove('hero-title')
      // Remove letter spans
      const letters = title.querySelectorAll('.letter')
      letters.forEach(letter => {
        letter.remove()
      })
    }
    if (subtitle) {
      subtitle.classList.remove('hero-subtitle')
    }
    if (button) {
      button.classList.remove('hero-button')
    }
  }

  setupTitleAnimation(titleElement) {
    // Split text into letters
    const text = titleElement.textContent
    titleElement.innerHTML = text.split('').map((char, index) => 
      char === ' ' ? ' ' : `<span class="letter" style="--letter-delay: ${index}">${char}</span>`
    ).join('')

    // Add animation class
    titleElement.classList.add('hero-title')
  }

  handleSlideChange() {
    if (this.isAnimating) return
    
    this.isAnimating = true
    
    // Get current slide index
    if (this.alpineCarousel) {
      this.currentSlideIndex = this.alpineCarousel.currentIndex
    }

    // Animate the new slide content
    setTimeout(() => {
      this.setupSlideContent(this.currentSlideIndex)
      this.isAnimating = false
    }, 200)
  }

  // Method to manually trigger slide animation
  animateSlide(slideIndex) {
    if (this.isAnimating) return
    
    this.isAnimating = true
    
    // Animate new slide content
    setTimeout(() => {
      this.setupSlideContent(slideIndex)
      this.isAnimating = false
    }, 200)
  }
}

// Initialize the hero animation system
const heroAnimationSystem = new HeroAnimationSystem()

// Make it globally available
window.heroAnimationSystem = heroAnimationSystem

export default heroAnimationSystem
