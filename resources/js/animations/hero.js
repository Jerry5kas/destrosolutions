import gsap from 'gsap'
import ScrollTrigger from 'gsap/ScrollTrigger'
import { TextReveal, ParallaxBg } from './components.js'

/**
 * HeroAnimations - Specialized animations for hero section
 */
export class HeroAnimations {
  constructor(options = {}) {
    this.heroElement = options.heroElement || '.hero-section'
    this.slides = options.slides || []
    this.currentSlide = 0
    this.slideInterval = null
    this.slideDuration = options.slideDuration || 6000
    
    this.init()
  }

  init() {
    this.setupCarousel()
    this.setupTextReveals()
    this.setupParallax()
    this.setupDotIndicators()
    this.startCarousel()
  }

  /**
   * Setup carousel functionality
   */
  setupCarousel() {
    const heroEl = document.querySelector(this.heroElement)
    if (!heroEl) return

    const slidesWrapper = heroEl.querySelector('.slides-wrapper')
    const slides = heroEl.querySelectorAll('.slide')
    
    if (!slidesWrapper || !slides.length) return

    // Set initial position
    gsap.set(slidesWrapper, { x: 0 })
    
    // Store references
    this.slidesWrapper = slidesWrapper
    this.slides = slides
    this.totalSlides = slides.length

    // Setup slide animations
    slides.forEach((slide, index) => {
      // Background scale animation
      const bg = slide.querySelector('.slide-bg')
      if (bg) {
        gsap.set(bg, { scale: 1.1 })
        
        gsap.to(bg, {
          scale: 1,
          duration: 6,
          ease: 'none',
          scrollTrigger: {
            trigger: slide,
            scroller: '[data-scroll-container]',
            start: 'top bottom',
            end: 'bottom top',
            scrub: true
          }
        })
      }
    })
  }

  /**
   * Setup text reveal animations
   */
  setupTextReveals() {
    const heroEl = document.querySelector(this.heroElement)
    if (!heroEl) return

    // Title animation
    const title = heroEl.querySelector('.hero-title')
    if (title) {
      new TextReveal({
        element: title,
        type: 'chars',
        stagger: 0.05,
        duration: 1.2,
        ease: 'power3.out'
      })
    }

    // Subtitle animation
    const subtitle = heroEl.querySelector('.hero-subtitle')
    if (subtitle) {
      new TextReveal({
        element: subtitle,
        type: 'words',
        stagger: 0.1,
        duration: 1,
        ease: 'power2.out'
      })
    }

    // Button animation
    const button = heroEl.querySelector('.hero-button')
    if (button) {
      gsap.fromTo(button,
        {
          scale: 0.8,
          opacity: 0
        },
        {
          scale: 1,
          opacity: 1,
          duration: 1,
          delay: 1.5,
          ease: 'back.out(1.7)',
          scrollTrigger: {
            trigger: button,
            scroller: '[data-scroll-container]',
            start: 'top 80%',
            toggleActions: 'play none none reverse'
          }
        }
      )
    }
  }

  /**
   * Setup parallax effects
   */
  setupParallax() {
    const heroEl = document.querySelector(this.heroElement)
    if (!heroEl) return

    // Background parallax
    new ParallaxBg({
      element: '.hero-section .slide-bg',
      speed: -0.3,
      mobile: false
    })

    // Content parallax
    new ParallaxBg({
      element: '.hero-section .hero-content',
      speed: 0.2,
      mobile: false
    })
  }

  /**
   * Setup dot indicators
   */
  setupDotIndicators() {
    const heroEl = document.querySelector(this.heroElement)
    if (!heroEl) return

    const dots = heroEl.querySelectorAll('.dot-indicator')
    
    dots.forEach((dot, index) => {
      dot.addEventListener('click', () => {
        this.goToSlide(index)
      })
    })
  }

  /**
   * Start automatic carousel
   */
  startCarousel() {
    if (this.totalSlides <= 1) return

    this.slideInterval = setInterval(() => {
      this.nextSlide()
    }, this.slideDuration)
  }

  /**
   * Go to specific slide
   */
  goToSlide(index) {
    if (index < 0 || index >= this.totalSlides) return

    this.currentSlide = index
    this.updateSlidePosition()
    this.updateDotIndicators()
    
    // Restart carousel timer
    this.restartCarousel()
  }

  /**
   * Go to next slide
   */
  nextSlide() {
    this.currentSlide = (this.currentSlide + 1) % this.totalSlides
    this.updateSlidePosition()
    this.updateDotIndicators()
  }

  /**
   * Update slide position
   */
  updateSlidePosition() {
    if (!this.slidesWrapper) return

    const translateX = -this.currentSlide * 100
    
    gsap.to(this.slidesWrapper, {
      x: `${translateX}%`,
      duration: 1,
      ease: 'power2.inOut'
    })
  }

  /**
   * Update dot indicators
   */
  updateDotIndicators() {
    const heroEl = document.querySelector(this.heroElement)
    if (!heroEl) return

    const dots = heroEl.querySelectorAll('.dot-indicator')
    
    dots.forEach((dot, index) => {
      if (index === this.currentSlide) {
        dot.classList.add('active')
        gsap.to(dot, {
          scale: 1.2,
          duration: 0.3,
          ease: 'power2.out'
        })
      } else {
        dot.classList.remove('active')
        gsap.to(dot, {
          scale: 1,
          duration: 0.3,
          ease: 'power2.out'
        })
      }
    })
  }

  /**
   * Restart carousel timer
   */
  restartCarousel() {
    if (this.slideInterval) {
      clearInterval(this.slideInterval)
    }
    this.startCarousel()
  }

  /**
   * Pause carousel
   */
  pauseCarousel() {
    if (this.slideInterval) {
      clearInterval(this.slideInterval)
    }
  }

  /**
   * Resume carousel
   */
  resumeCarousel() {
    this.startCarousel()
  }

  /**
   * Destroy hero animations
   */
  destroy() {
    this.pauseCarousel()
    ScrollTrigger.killAll()
  }
}

export default HeroAnimations
