import gsap from 'gsap'

/**
 * Hero Text Animation System
 * Works alongside Alpine.js carousel without conflicts
 */
class HeroTextAnimations {
  constructor() {
    this.currentSlideIndex = 0
    this.isAnimating = false
    this.alpineCarousel = null
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
    }, 200)
  }

  initializeSlideAnimations() {
    const heroSection = document.querySelector('[x-data*="carousel"]')
    if (!heroSection) return

    // Setup initial animations for first slide
    this.setupSlideContent(0)
    
    // Hide other slides initially
    const slides = heroSection.querySelectorAll('.slide')
    slides.forEach((slide, index) => {
      if (index !== 0) {
        this.hideSlideContent(slide)
      }
    })
  }

  setupAlpineIntegration() {
    const heroSection = document.querySelector('[x-data*="carousel"]')
    if (!heroSection) return

    // Get Alpine.js carousel instance
    this.alpineCarousel = heroSection._x_dataStack?.[0]
    
    if (this.alpineCarousel) {
      // Override the carousel's next method to include our animations
      const originalNext = this.alpineCarousel.next || (() => {
        this.alpineCarousel.currentIndex = (this.alpineCarousel.currentIndex + 1) % this.alpineCarousel.slides.length
      })
      
      this.alpineCarousel.next = () => {
        originalNext.call(this.alpineCarousel)
        this.handleSlideChange()
      }
    }

    // Listen for manual slide changes (dot clicks)
    const dots = heroSection.querySelectorAll('.dot-indicator')
    dots.forEach((dot, index) => {
      dot.addEventListener('click', () => {
        this.alpineCarousel.currentIndex = index
        this.handleSlideChange()
      })
    })
  }

  setupSlideContent(slideIndex) {
    const heroSection = document.querySelector('[x-data*="carousel"]')
    if (!heroSection) return

    const slides = heroSection.querySelectorAll('.slide')
    const currentSlide = slides[slideIndex]
    
    if (!currentSlide) return

    const title = currentSlide.querySelector('h1')
    const subtitle = currentSlide.querySelector('p')
    const button = currentSlide.querySelector('button')

    if (title) {
      this.setupTitleAnimation(title)
    }
    if (subtitle) {
      this.setupSubtitleAnimation(subtitle)
    }
    if (button) {
      this.setupButtonAnimation(button)
    }
  }

  setupTitleAnimation(titleElement) {
    // Split text into letters
    const text = titleElement.textContent
    titleElement.innerHTML = text.split('').map(char => 
      char === ' ' ? ' ' : `<span class="letter">${char}</span>`
    ).join('')

    const letters = titleElement.querySelectorAll('.letter')
    
    // Set initial state
    gsap.set(letters, {
      opacity: 0,
      y: 50,
      rotationX: 90,
      transformOrigin: "50% 50% -50px"
    })

    // Animate letters with a more dramatic effect
    gsap.to(letters, {
      opacity: 1,
      y: 0,
      rotationX: 0,
      duration: 0.8,
      stagger: 0.05,
      ease: "back.out(1.7)",
      delay: 0.3
    })
  }

  setupSubtitleAnimation(subtitleElement) {
    // Set initial state
    gsap.set(subtitleElement, {
      opacity: 0,
      x: -150,
      rotationY: -15
    })

    // Animate from left with rotation
    gsap.to(subtitleElement, {
      opacity: 1,
      x: 0,
      rotationY: 0,
      duration: 1.2,
      ease: "power2.out",
      delay: 1.0
    })
  }

  setupButtonAnimation(buttonElement) {
    // Set initial state
    gsap.set(buttonElement, {
      opacity: 0,
      x: 150,
      scale: 0.8,
      rotationY: 15
    })

    // Animate from right with rotation
    gsap.to(buttonElement, {
      opacity: 1,
      x: 0,
      scale: 1,
      rotationY: 0,
      duration: 1.2,
      ease: "back.out(1.7)",
      delay: 1.4
    })
  }

  hideSlideContent(slide) {
    const title = slide.querySelector('h1')
    const subtitle = slide.querySelector('p')
    const button = slide.querySelector('button')

    if (title) {
      const letters = title.querySelectorAll('.letter')
      gsap.set(letters, {
        opacity: 0,
        y: 50,
        rotationX: 90,
        transformOrigin: "50% 50% -50px"
      })
    }
    if (subtitle) {
      gsap.set(subtitle, {
        opacity: 0,
        x: -150,
        rotationY: -15
      })
    }
    if (button) {
      gsap.set(button, {
        opacity: 0,
        x: 150,
        scale: 0.8,
        rotationY: 15
      })
    }
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
    }, 200) // Slight delay to ensure slide transition is complete
  }

  // Method to manually trigger slide animation
  animateSlide(slideIndex) {
    if (this.isAnimating) return
    
    this.isAnimating = true
    
    // Hide current slide content
    const heroSection = document.querySelector('[x-data*="carousel"]')
    if (!heroSection) return

    const slides = heroSection.querySelectorAll('.slide')
    slides.forEach(slide => {
      this.hideSlideContent(slide)
    })

    // Animate new slide content
    setTimeout(() => {
      this.setupSlideContent(slideIndex)
      this.isAnimating = false
    }, 200)
  }

  // Method to restart animations (useful for page refresh)
  restartAnimations() {
    this.initializeSlideAnimations()
    this.setupAlpineIntegration()
  }
}

// Initialize the hero text animations
const heroTextAnimations = new HeroTextAnimations()

// Make it globally available
window.heroTextAnimations = heroTextAnimations

export default heroTextAnimations
