import gsap from 'gsap'
import ScrollTrigger from 'gsap/ScrollTrigger'

// Register GSAP plugins
gsap.registerPlugin(ScrollTrigger)

/**
 * Simple GSAP Animation System
 * Works alongside Alpine.js without conflicts
 */
class SimpleGSAPAnimations {
  constructor() {
    this.isInitialized = false
    this.init()
  }

  init() {
    if (this.isInitialized) return
    
    // Wait for DOM to be ready
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', () => this.setupAnimations())
    } else {
      this.setupAnimations()
    }
    
    this.isInitialized = true
  }

  setupAnimations() {
    // Only add GSAP animations to elements that don't conflict with Alpine.js
    this.setupScrollReveals()
    this.setupParallaxEffects()
    this.setupTextAnimations()
  }

  setupScrollReveals() {
    // Add subtle scroll reveals to elements with data-gsap-reveal
    gsap.utils.toArray('[data-gsap-reveal]').forEach((element, index) => {
      const direction = element.dataset.gsapDirection || 'up'
      const delay = parseFloat(element.dataset.gsapDelay) || index * 0.1
      
      gsap.fromTo(element, 
        {
          opacity: 0,
          y: direction === 'up' ? 50 : direction === 'down' ? -50 : 0,
          x: direction === 'left' ? 50 : direction === 'right' ? -50 : 0
        },
        {
          opacity: 1,
          y: 0,
          x: 0,
          duration: 1,
          delay: delay,
          ease: 'power2.out',
          scrollTrigger: {
            trigger: element,
            start: 'top 80%',
            toggleActions: 'play none none reverse'
          }
        }
      )
    })
  }

  setupParallaxEffects() {
    // Add parallax to elements with data-gsap-parallax
    gsap.utils.toArray('[data-gsap-parallax]').forEach(element => {
      const speed = parseFloat(element.dataset.gsapSpeed) || -0.5
      
      gsap.to(element, {
        yPercent: speed * 100,
        ease: 'none',
        scrollTrigger: {
          trigger: element,
          start: 'top bottom',
          end: 'bottom top',
          scrub: true
        }
      })
    })
  }

  setupTextAnimations() {
    // Add text animations to elements with data-gsap-text
    gsap.utils.toArray('[data-gsap-text]').forEach(element => {
      const type = element.dataset.gsapTextType || 'chars'
      const stagger = parseFloat(element.dataset.gsapStagger) || 0.03
      
      // Simple character animation without SplitType for now
      const text = element.textContent
      element.innerHTML = text.split('').map(char => 
        char === ' ' ? ' ' : `<span class="char">${char}</span>`
      ).join('')
      
      const chars = element.querySelectorAll('.char')
      
      gsap.fromTo(chars,
        {
          opacity: 0,
          y: 20
        },
        {
          opacity: 1,
          y: 0,
          duration: 0.8,
          stagger: stagger,
          ease: 'power2.out',
          scrollTrigger: {
            trigger: element,
            start: 'top 80%',
            toggleActions: 'play none none reverse'
          }
        }
      )
    })
  }

  // Method to add animations to specific elements
  addFadeReveal(selector, options = {}) {
    const elements = document.querySelectorAll(selector)
    
    elements.forEach((element, index) => {
      const delay = options.delay || index * 0.1
      
      gsap.fromTo(element, 
        {
          opacity: 0,
          y: options.direction === 'up' ? 50 : options.direction === 'down' ? -50 : 0
        },
        {
          opacity: 1,
          y: 0,
          duration: options.duration || 1,
          delay: delay,
          ease: options.ease || 'power2.out',
          scrollTrigger: {
            trigger: element,
            start: 'top 80%',
            toggleActions: 'play none none reverse'
          }
        }
      )
    })
  }

  // Method to add parallax to specific elements
  addParallax(selector, speed = -0.5) {
    const elements = document.querySelectorAll(selector)
    
    elements.forEach(element => {
      gsap.to(element, {
        yPercent: speed * 100,
        ease: 'none',
        scrollTrigger: {
          trigger: element,
          start: 'top bottom',
          end: 'bottom top',
          scrub: true
        }
      })
    })
  }
}

// Initialize the simple GSAP system
const simpleGSAP = new SimpleGSAPAnimations()

// Make it globally available
window.simpleGSAP = simpleGSAP

export default simpleGSAP
