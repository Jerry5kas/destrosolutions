import gsap from 'gsap'
import ScrollTrigger from 'gsap/ScrollTrigger'

// Register GSAP plugins
gsap.registerPlugin(ScrollTrigger)

/**
 * Pure GSAP Hero Carousel System
 * No Alpine.js conflicts - Full GSAP control
 */
class PureGSAPHero {
  constructor(slidesData) {
    this.slides = slidesData
    this.currentSlide = 0
    this.isAnimating = false
    this.slideInterval = null
    this.slideDuration = 8000 // 8 seconds
    
    this.init()
  }

  init() {
    // Wait for DOM to be ready
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', () => this.setupHero())
    } else {
      this.setupHero()
    }
  }

  setupHero() {
    const heroSection = document.querySelector('.pure-gsap-hero')
    if (!heroSection) return

    this.createSlides()
    this.setupControls()
    this.setupInitialAnimations()
    this.startCarousel()
  }

  createSlides() {
    const heroSection = document.querySelector('.pure-gsap-hero')
    const slidesWrapper = heroSection.querySelector('.slides-wrapper')
    
    // Clear existing slides
    slidesWrapper.innerHTML = ''

    // Create slides from Laravel data
    this.slides.forEach((slide, index) => {
      const slideElement = document.createElement('div')
      slideElement.className = 'slide'
      slideElement.innerHTML = `
        <div class="slide-bg" style="background-image: url(${slide.bg});"></div>
        <div class="slide-overlay"></div>
        <div class="slide-grid"></div>
        <div class="slide-content">
          <h1 class="slide-title">${slide.title}</h1>
          <p class="slide-subtitle">${slide.subtitle}</p>
          <button class="slide-button">Get in Contact</button>
        </div>
      `
      slidesWrapper.appendChild(slideElement)
    })

    // Set initial position
    gsap.set(slidesWrapper, { x: 0 })
  }

  setupControls() {
    const heroSection = document.querySelector('.pure-gsap-hero')
    const dotsContainer = heroSection.querySelector('.dots-container')
    
    // Clear existing dots
    dotsContainer.innerHTML = ''

    // Create dots
    this.slides.forEach((_, index) => {
      const dot = document.createElement('div')
      dot.className = `dot ${index === 0 ? 'active' : ''}`
      dot.addEventListener('click', () => this.goToSlide(index))
      dotsContainer.appendChild(dot)
    })
  }

  setupInitialAnimations() {
    // Animate first slide
    this.animateSlideContent(0)
    
    // Hide other slides
    const slides = document.querySelectorAll('.slide')
    slides.forEach((slide, index) => {
      if (index !== 0) {
        this.hideSlideContent(slide)
      }
    })
  }

  animateSlideContent(slideIndex) {
    const slides = document.querySelectorAll('.slide')
    const currentSlide = slides[slideIndex]
    
    if (!currentSlide) return

    const title = currentSlide.querySelector('.slide-title')
    const subtitle = currentSlide.querySelector('.slide-subtitle')
    const button = currentSlide.querySelector('.slide-button')

    // Title letter-by-letter animation
    if (title) {
      this.animateTitle(title)
    }

    // Subtitle slide-in from left
    if (subtitle) {
      gsap.fromTo(subtitle, 
        {
          opacity: 0,
          x: -150,
          rotationY: -15
        },
        {
          opacity: 1,
          x: 0,
          rotationY: 0,
          duration: 1.2,
          ease: "power2.out",
          delay: 1.0
        }
      )
    }

    // Button slide-in from right
    if (button) {
      gsap.fromTo(button,
        {
          opacity: 0,
          x: 150,
          scale: 0.8,
          rotationY: 15
        },
        {
          opacity: 1,
          x: 0,
          scale: 1,
          rotationY: 0,
          duration: 1.2,
          ease: "back.out(1.7)",
          delay: 1.4
        }
      )
    }
  }

  animateTitle(titleElement) {
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

    // Animate letters
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

  hideSlideContent(slide) {
    const title = slide.querySelector('.slide-title')
    const subtitle = slide.querySelector('.slide-subtitle')
    const button = slide.querySelector('.slide-button')

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

  goToSlide(slideIndex) {
    if (this.isAnimating || slideIndex === this.currentSlide) return
    
    this.isAnimating = true
    
    // Hide current slide content
    const slides = document.querySelectorAll('.slide')
    slides.forEach(slide => {
      this.hideSlideContent(slide)
    })

    // Update current slide
    this.currentSlide = slideIndex

    // Animate slide transition
    const slidesWrapper = document.querySelector('.slides-wrapper')
    const translateX = -slideIndex * 100

    gsap.to(slidesWrapper, {
      x: `${translateX}%`,
      duration: 1,
      ease: "power2.inOut",
      onComplete: () => {
        // Animate new slide content
        this.animateSlideContent(slideIndex)
        this.updateDots()
        this.isAnimating = false
      }
    })
  }

  updateDots() {
    const dots = document.querySelectorAll('.dot')
    dots.forEach((dot, index) => {
      if (index === this.currentSlide) {
        dot.classList.add('active')
        gsap.to(dot, {
          scale: 1.2,
          duration: 0.3,
          ease: "power2.out"
        })
      } else {
        dot.classList.remove('active')
        gsap.to(dot, {
          scale: 1,
          duration: 0.3,
          ease: "power2.out"
        })
      }
    })
  }

  nextSlide() {
    const nextIndex = (this.currentSlide + 1) % this.slides.length
    this.goToSlide(nextIndex)
  }

  startCarousel() {
    this.slideInterval = setInterval(() => {
      this.nextSlide()
    }, this.slideDuration)
  }

  stopCarousel() {
    if (this.slideInterval) {
      clearInterval(this.slideInterval)
      this.slideInterval = null
    }
  }

  // Pause on hover
  setupHoverControls() {
    const heroSection = document.querySelector('.pure-gsap-hero')
    
    heroSection.addEventListener('mouseenter', () => {
      this.stopCarousel()
    })
    
    heroSection.addEventListener('mouseleave', () => {
      this.startCarousel()
    })
  }

  // Destroy method for cleanup
  destroy() {
    this.stopCarousel()
    gsap.killTweensOf('.slide')
  }
}

// Export for use
export default PureGSAPHero
