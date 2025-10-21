import { FadeReveal, SlideIn, ScaleReveal } from '../animations/components.js'

/**
 * Welcome Page Animations
 * Initialize page-specific animations for the welcome page
 */
export class WelcomePageAnimations {
  constructor() {
    this.init()
  }

  init() {
    // Wait for DOM to be ready
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', () => this.setupAnimations())
    } else {
      this.setupAnimations()
    }
  }

  setupAnimations() {
    // About section animations
    this.setupAboutAnimations()
    
    // Stats section animations
    this.setupStatsAnimations()
    
    // Contact section animations
    this.setupContactAnimations()
    
    // Products section animations
    this.setupProductsAnimations()
    
    // FAQ section animations
    this.setupFAQAnimations()
    
    // News section animations
    this.setupNewsAnimations()
    
    // Team section animations
    this.setupTeamAnimations()
  }

  setupAboutAnimations() {
    // Fade in about content
    new FadeReveal({
      element: '.about-section',
      direction: 'up',
      duration: 1.2,
      delay: 0.2
    })
  }

  setupStatsAnimations() {
    // Scale reveal for stats items
    new ScaleReveal({
      element: '.stats-item',
      scale: 0.8,
      duration: 1,
      stagger: 0.2
    })
  }

  setupContactAnimations() {
    // Slide in contact form
    new SlideIn({
      element: '.contact-section',
      direction: 'left',
      distance: 100,
      duration: 1.2
    })
  }

  setupProductsAnimations() {
    // Fade reveal for product cards
    new FadeReveal({
      element: '.product-card',
      direction: 'up',
      duration: 1,
      stagger: 0.15
    })
  }

  setupFAQAnimations() {
    // Slide in FAQ items
    new SlideIn({
      element: '.faq-item',
      direction: 'right',
      distance: 80,
      duration: 1,
      stagger: 0.1
    })
  }

  setupNewsAnimations() {
    // Scale reveal for news cards
    new ScaleReveal({
      element: '.news-card',
      scale: 0.9,
      duration: 1.2,
      stagger: 0.2
    })
  }

  setupTeamAnimations() {
    // Fade reveal for team members
    new FadeReveal({
      element: '.team-member',
      direction: 'up',
      duration: 1.2,
      stagger: 0.2
    })
  }
}

// Auto-initialize when imported
const welcomeAnimations = new WelcomePageAnimations()

export default welcomeAnimations
