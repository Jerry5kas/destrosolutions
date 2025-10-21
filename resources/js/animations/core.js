import gsap from 'gsap'
import ScrollTrigger from 'gsap/ScrollTrigger'
import LocomotiveScroll from 'locomotive-scroll'

// Register GSAP plugins
gsap.registerPlugin(ScrollTrigger)

/**
 * AnimationCore - Main animation system for SDV SaaS
 * Handles smooth scrolling, scroll triggers, and animation management
 */
class AnimationCore {
  constructor(options = {}) {
    this.config = {
      smooth: true,
      multiplier: 1.2,
      mobile: {
        smooth: false,
        breakpoint: 768
      },
      reducedMotion: false,
      ...options
    }
    
    this.locoScroll = null
    this.isInitialized = false
    this.isMobile = window.innerWidth <= this.config.mobile.breakpoint
    this.animations = new Map()
    
    // Bind methods
    this.init = this.init.bind(this)
    this.destroy = this.destroy.bind(this)
    this.handleResize = this.handleResize.bind(this)
  }

  /**
   * Initialize the animation system
   */
  init() {
    if (this.isInitialized) return
    
    // Check for reduced motion preference
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      this.config.reducedMotion = true
    }
    
    // Skip animations if reduced motion is preferred
    if (this.config.reducedMotion) {
      console.log('GSAP: Reduced motion detected, skipping animations')
      return
    }
    
    this.setupLocomotive()
    this.setupScrollTrigger()
    this.setupEventListeners()
    
    this.isInitialized = true
    console.log('GSAP Animation Core initialized')
  }

  /**
   * Setup Locomotive Scroll for smooth scrolling
   */
  setupLocomotive() {
    const scrollContainer = document.querySelector('[data-scroll-container]')
    
    if (!scrollContainer) {
      console.warn('GSAP: No scroll container found')
      return
    }

    this.locoScroll = new LocomotiveScroll({
      el: scrollContainer,
      smooth: this.isMobile ? this.config.mobile.smooth : this.config.smooth,
      multiplier: this.config.multiplier,
      mobile: this.config.mobile,
      tablet: {
        smooth: false,
        breakpoint: 1024
      }
    })

    // Update ScrollTrigger when Locomotive scrolls
    this.locoScroll.on('scroll', ScrollTrigger.update)
  }

  /**
   * Setup ScrollTrigger with Locomotive Scroll integration
   */
  setupScrollTrigger() {
    if (!this.locoScroll) return

    ScrollTrigger.scrollerProxy('[data-scroll-container]', {
      scrollTop(value) {
        return arguments.length
          ? this.locoScroll.scrollTo(value, 0, 0)
          : this.locoScroll.scroll.instance.scroll.y
      },
      getBoundingClientRect() {
        return { 
          top: 0, 
          left: 0, 
          width: window.innerWidth, 
          height: window.innerHeight 
        }
      }
    })

    // Refresh ScrollTrigger when Locomotive updates
    ScrollTrigger.addEventListener('refresh', () => this.locoScroll.update())
    ScrollTrigger.refresh()
  }

  /**
   * Setup event listeners
   */
  setupEventListeners() {
    window.addEventListener('resize', this.handleResize)
    
    // Handle page visibility changes
    document.addEventListener('visibilitychange', () => {
      if (document.hidden) {
        this.pauseAnimations()
      } else {
        this.resumeAnimations()
      }
    })
  }

  /**
   * Handle window resize
   */
  handleResize() {
    const wasMobile = this.isMobile
    this.isMobile = window.innerWidth <= this.config.mobile.breakpoint
    
    if (wasMobile !== this.isMobile) {
      this.destroy()
      this.init()
    } else {
      ScrollTrigger.refresh()
    }
  }

  /**
   * Pause all animations
   */
  pauseAnimations() {
    gsap.globalTimeline.pause()
    this.animations.forEach(animation => {
      if (animation.pause) animation.pause()
    })
  }

  /**
   * Resume all animations
   */
  resumeAnimations() {
    gsap.globalTimeline.resume()
    this.animations.forEach(animation => {
      if (animation.resume) animation.resume()
    })
  }

  /**
   * Register an animation for management
   */
  registerAnimation(name, animation) {
    this.animations.set(name, animation)
  }

  /**
   * Unregister an animation
   */
  unregisterAnimation(name) {
    this.animations.delete(name)
  }

  /**
   * Enable reduced motion mode
   */
  enableReducedMotion() {
    this.config.reducedMotion = true
    this.destroy()
  }

  /**
   * Disable reduced motion mode
   */
  disableReducedMotion() {
    this.config.reducedMotion = false
    this.init()
  }

  /**
   * Update configuration
   */
  updateConfig(newConfig) {
    this.config = { ...this.config, ...newConfig }
    if (this.isInitialized) {
      this.destroy()
      this.init()
    }
  }

  /**
   * Destroy the animation system
   */
  destroy() {
    if (this.locoScroll) {
      this.locoScroll.destroy()
      this.locoScroll = null
    }
    
    ScrollTrigger.killAll()
    this.animations.clear()
    
    window.removeEventListener('resize', this.handleResize)
    
    this.isInitialized = false
    console.log('GSAP Animation Core destroyed')
  }

  /**
   * Get ScrollTrigger instance
   */
  getScrollTrigger() {
    return ScrollTrigger
  }

  /**
   * Get Locomotive Scroll instance
   */
  getLocomotiveScroll() {
    return this.locoScroll
  }

  /**
   * Get GSAP instance
   */
  getGSAP() {
    return gsap
  }
}

// Create global instance
const animationCore = new AnimationCore()

// Export for use in other modules
export default animationCore
export { AnimationCore }
