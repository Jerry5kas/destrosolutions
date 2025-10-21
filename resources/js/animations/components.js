import gsap from 'gsap'
import ScrollTrigger from 'gsap/ScrollTrigger'
import SplitType from 'split-type'

/**
 * FadeReveal - Fade in animation with directional movement
 */
export class FadeReveal {
  constructor(options = {}) {
    this.element = options.element
    this.direction = options.direction || 'up'
    this.duration = options.duration || 1
    this.delay = options.delay || 0
    this.ease = options.ease || 'power2.out'
    this.stagger = options.stagger || 0.1
    
    this.init()
  }

  init() {
    if (!this.element) return

    const elements = document.querySelectorAll(this.element)
    
    elements.forEach((el, index) => {
      const delay = this.delay + (index * this.stagger)
      
      gsap.fromTo(el, 
        {
          opacity: 0,
          y: this.direction === 'up' ? 50 : this.direction === 'down' ? -50 : 0,
          x: this.direction === 'left' ? 50 : this.direction === 'right' ? -50 : 0
        },
        {
          opacity: 1,
          y: 0,
          x: 0,
          duration: this.duration,
          delay: delay,
          ease: this.ease,
          scrollTrigger: {
            trigger: el,
            scroller: '[data-scroll-container]',
            start: 'top 80%',
            toggleActions: 'play none none reverse'
          }
        }
      )
    })
  }
}

/**
 * SlideIn - Slide animation with directional movement
 */
export class SlideIn {
  constructor(options = {}) {
    this.element = options.element
    this.direction = options.direction || 'left'
    this.distance = options.distance || 100
    this.duration = options.duration || 1
    this.stagger = options.stagger || 0.1
    this.ease = options.ease || 'power2.out'
    
    this.init()
  }

  init() {
    if (!this.element) return

    const elements = document.querySelectorAll(this.element)
    
    elements.forEach((el, index) => {
      const delay = index * this.stagger
      
      gsap.fromTo(el,
        {
          x: this.direction === 'left' ? -this.distance : this.direction === 'right' ? this.distance : 0,
          y: this.direction === 'up' ? -this.distance : this.direction === 'down' ? this.distance : 0,
          opacity: 0
        },
        {
          x: 0,
          y: 0,
          opacity: 1,
          duration: this.duration,
          delay: delay,
          ease: this.ease,
          scrollTrigger: {
            trigger: el,
            scroller: '[data-scroll-container]',
            start: 'top 85%',
            toggleActions: 'play none none reverse'
          }
        }
      )
    })
  }
}

/**
 * ParallaxBg - Parallax background animation
 */
export class ParallaxBg {
  constructor(options = {}) {
    this.element = options.element
    this.speed = options.speed || -0.5
    this.direction = options.direction || 'vertical'
    this.mobile = options.mobile !== undefined ? options.mobile : false
    
    this.init()
  }

  init() {
    if (!this.element) return

    const elements = document.querySelectorAll(this.element)
    
    elements.forEach(el => {
      // Skip on mobile if disabled
      if (this.isMobile() && !this.mobile) return
      
      gsap.to(el, {
        yPercent: this.speed * 100,
        ease: 'none',
        scrollTrigger: {
          trigger: el,
          scroller: '[data-scroll-container]',
          start: 'top bottom',
          end: 'bottom top',
          scrub: true
        }
      })
    })
  }

  isMobile() {
    return window.innerWidth <= 768
  }
}

/**
 * TextReveal - Character/word/line reveal animation
 */
export class TextReveal {
  constructor(options = {}) {
    this.element = options.element
    this.type = options.type || 'chars' // 'chars', 'words', 'lines'
    this.direction = options.direction || 'up'
    this.stagger = options.stagger || 0.03
    this.duration = options.duration || 0.8
    this.ease = options.ease || 'power2.out'
    
    this.init()
  }

  init() {
    if (!this.element) return

    const elements = document.querySelectorAll(this.element)
    
    elements.forEach(el => {
      const splitText = new SplitType(el, { types: this.type })
      const chars = splitText[this.type]
      
      gsap.fromTo(chars,
        {
          opacity: 0,
          y: this.direction === 'up' ? 50 : this.direction === 'down' ? -50 : 0,
          x: this.direction === 'left' ? 50 : this.direction === 'right' ? -50 : 0
        },
        {
          opacity: 1,
          y: 0,
          x: 0,
          duration: this.duration,
          stagger: this.stagger,
          ease: this.ease,
          scrollTrigger: {
            trigger: el,
            scroller: '[data-scroll-container]',
            start: 'top 80%',
            toggleActions: 'play none none reverse'
          }
        }
      )
    })
  }
}

/**
 * PinSection - Pin section with timeline animations
 */
export class PinSection {
  constructor(options = {}) {
    this.element = options.element
    this.duration = options.duration || '100%'
    this.animations = options.animations || []
    
    this.init()
  }

  init() {
    if (!this.element) return

    const element = document.querySelector(this.element)
    if (!element) return

    const timeline = gsap.timeline({
      scrollTrigger: {
        trigger: element,
        scroller: '[data-scroll-container]',
        start: 'top top',
        end: this.duration,
        pin: true,
        scrub: true
      }
    })

    // Add animations to timeline
    this.animations.forEach(anim => {
      timeline.to(anim.target, anim.animation)
    })
  }
}

/**
 * ScaleReveal - Scale animation with fade
 */
export class ScaleReveal {
  constructor(options = {}) {
    this.element = options.element
    this.scale = options.scale || 0.8
    this.duration = options.duration || 1
    this.ease = options.ease || 'back.out(1.7)'
    
    this.init()
  }

  init() {
    if (!this.element) return

    const elements = document.querySelectorAll(this.element)
    
    elements.forEach(el => {
      gsap.fromTo(el,
        {
          scale: this.scale,
          opacity: 0
        },
        {
          scale: 1,
          opacity: 1,
          duration: this.duration,
          ease: this.ease,
          scrollTrigger: {
            trigger: el,
            scroller: '[data-scroll-container]',
            start: 'top 80%',
            toggleActions: 'play none none reverse'
          }
        }
      )
    })
  }
}

/**
 * RotationReveal - Rotation animation
 */
export class RotationReveal {
  constructor(options = {}) {
    this.element = options.element
    this.rotation = options.rotation || 180
    this.duration = options.duration || 1
    this.ease = options.ease || 'power2.out'
    
    this.init()
  }

  init() {
    if (!this.element) return

    const elements = document.querySelectorAll(this.element)
    
    elements.forEach(el => {
      gsap.fromTo(el,
        {
          rotation: this.rotation,
          opacity: 0
        },
        {
          rotation: 0,
          opacity: 1,
          duration: this.duration,
          ease: this.ease,
          scrollTrigger: {
            trigger: el,
            scroller: '[data-scroll-container]',
            start: 'top 80%',
            toggleActions: 'play none none reverse'
          }
        }
      )
    })
  }
}

/**
 * ProgressBar - Animated progress bar
 */
export class ProgressBar {
  constructor(options = {}) {
    this.element = options.element
    this.duration = options.duration || 2
    this.ease = options.ease || 'power2.out'
    this.delay = options.delay || 0
    
    this.init()
  }

  init() {
    if (!this.element) return

    const elements = document.querySelectorAll(this.element)
    
    elements.forEach(el => {
      const progressBar = el.querySelector('.progress-fill') || el
      
      gsap.fromTo(progressBar,
        {
          scaleX: 0,
          transformOrigin: 'left center'
        },
        {
          scaleX: 1,
          duration: this.duration,
          delay: this.delay,
          ease: this.ease,
          scrollTrigger: {
            trigger: el,
            scroller: '[data-scroll-container]',
            start: 'top 80%',
            toggleActions: 'play none none reverse'
          }
        }
      )
    })
  }
}

// Export all animation classes
export {
  FadeReveal,
  SlideIn,
  ParallaxBg,
  TextReveal,
  PinSection,
  ScaleReveal,
  RotationReveal,
  ProgressBar
}
