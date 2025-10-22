# 📚 API Reference - Scroll Animation System

*Complete API documentation for all animation components and utilities*

---

## 📋 Table of Contents

1. [AnimationCore Class](#animationcore-class)
2. [Animation Components](#animation-components)
3. [Utility Functions](#utility-functions)
4. [Configuration Options](#configuration-options)
5. [Event System](#event-system)
6. [Blade Components](#blade-components)
7. [JavaScript API](#javascript-api)
8. [CSS Classes](#css-classes)

---

## 🎯 AnimationCore Class

### Constructor
```javascript
new AnimationCore(options)
```

#### Parameters
| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `options` | `Object` | `{}` | Configuration options |

#### Options
```javascript
{
  // Locomotive Scroll options
  smooth: true,                    // Enable smooth scrolling
  multiplier: 1.2,                // Scroll speed multiplier
  mobile: {
    smooth: false,                // Disable smooth scroll on mobile
    breakpoint: 768               // Mobile breakpoint in pixels
  },
  
  // Performance options
  performance: {
    enableMonitoring: true,       // Enable performance monitoring
    frameRateTarget: 60,          // Target frame rate
    memoryLimit: 10               // Memory limit in MB
  },
  
  // Accessibility options
  accessibility: {
    respectReducedMotion: true,   // Respect prefers-reduced-motion
    enableKeyboardNavigation: true, // Enable keyboard controls
    announceChanges: true         // Announce animation changes
  }
}
```

### Methods

#### `init()`
Initialize the animation system.
```javascript
animationCore.init()
```
**Returns:** `Promise<void>`

#### `destroy()`
Destroy the animation system and clean up resources.
```javascript
animationCore.destroy()
```
**Returns:** `void`

#### `updateConfig(config)`
Update animation configuration.
```javascript
animationCore.updateConfig({
  smooth: false,
  multiplier: 1.0
})
```
**Parameters:**
- `config` (Object): New configuration options

#### `enableReducedMotion()`
Enable accessibility mode with reduced motion.
```javascript
animationCore.enableReducedMotion()
```

#### `disableReducedMotion()`
Disable accessibility mode.
```javascript
animationCore.disableReducedMotion()
```

#### `getPerformanceMetrics()`
Get current performance metrics.
```javascript
const metrics = animationCore.getPerformanceMetrics()
```
**Returns:** `Object`
```javascript
{
  frameRate: 60,
  memoryUsage: 5.2,
  animationCount: 12,
  lastUpdate: 1640995200000
}
```

---

## 🎨 Animation Components

### FadeReveal

#### Constructor
```javascript
new FadeReveal(options)
```

#### Options
| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `element` | `String|NodeList` | Required | CSS selector or DOM elements |
| `direction` | `String` | `'up'` | Animation direction: 'up', 'down', 'left', 'right' |
| `duration` | `Number` | `1` | Animation duration in seconds |
| `delay` | `Number` | `0` | Initial delay in seconds |
| `stagger` | `Number` | `0.1` | Delay between multiple elements |
| `ease` | `String` | `'power2.out'` | GSAP easing function |
| `trigger` | `String` | `'top 80%'` | ScrollTrigger start position |

#### Methods
```javascript
const fadeReveal = new FadeReveal({
  element: '.fade-element',
  direction: 'up',
  duration: 1.2
})

// Pause animation
fadeReveal.pause()

// Resume animation
fadeReveal.resume()

// Kill animation
fadeReveal.kill()
```

### SlideIn

#### Constructor
```javascript
new SlideIn(options)
```

#### Options
| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `element` | `String|NodeList` | Required | CSS selector or DOM elements |
| `direction` | `String` | `'left'` | Slide direction: 'left', 'right', 'up', 'down' |
| `distance` | `Number` | `100` | Slide distance in pixels |
| `duration` | `Number` | `1` | Animation duration in seconds |
| `stagger` | `Number` | `0.1` | Delay between multiple elements |
| `ease` | `String` | `'power2.out'` | GSAP easing function |

#### Methods
```javascript
const slideIn = new SlideIn({
  element: '.slide-element',
  direction: 'left',
  distance: 150,
  duration: 1.5
})

// Update distance
slideIn.updateDistance(200)

// Change direction
slideIn.updateDirection('right')
```

### ParallaxBg

#### Constructor
```javascript
new ParallaxBg(options)
```

#### Options
| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `element` | `String|NodeList` | Required | CSS selector or DOM elements |
| `speed` | `Number` | `-0.5` | Parallax speed (negative = slower) |
| `direction` | `String` | `'vertical'` | Parallax direction: 'vertical', 'horizontal' |
| `mobile` | `Boolean` | `false` | Enable on mobile devices |
| `breakpoint` | `Number` | `768` | Mobile breakpoint in pixels |

#### Methods
```javascript
const parallax = new ParallaxBg({
  element: '.parallax-bg',
  speed: -0.3,
  direction: 'vertical'
})

// Update speed
parallax.updateSpeed(-0.7)

// Enable/disable mobile
parallax.setMobile(true)
```

### TextReveal

#### Constructor
```javascript
new TextReveal(options)
```

#### Options
| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `element` | `String|NodeList` | Required | CSS selector or DOM elements |
| `type` | `String` | `'chars'` | Split type: 'chars', 'words', 'lines' |
| `direction` | `String` | `'up'` | Reveal direction: 'up', 'down', 'left', 'right' |
| `stagger` | `Number` | `0.03` | Delay between characters/words |
| `duration` | `Number` | `0.8` | Animation duration in seconds |
| `ease` | `String` | `'power2.out'` | GSAP easing function |

#### Methods
```javascript
const textReveal = new TextReveal({
  element: '.text-reveal',
  type: 'chars',
  direction: 'up',
  stagger: 0.05
})

// Re-split text (useful for dynamic content)
textReveal.resplit()

// Change split type
textReveal.updateType('words')
```

### PinSection

#### Constructor
```javascript
new PinSection(options)
```

#### Options
| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `element` | `String|NodeList` | Required | CSS selector or DOM elements |
| `duration` | `String|Number` | `'100%'` | Pin duration (percentage or pixels) |
| `animations` | `Array` | `[]` | Array of animation objects |
| `scrub` | `Boolean|Number` | `true` | Enable scrub animation |
| `onUpdate` | `Function` | `null` | Callback on scroll update |

#### Animation Object Structure
```javascript
{
  target: '.animation-target',    // CSS selector
  animation: {                    // GSAP animation properties
    opacity: 1,
    y: 0,
    scale: 1
  },
  start: '0%',                   // Animation start point
  end: '100%'                    // Animation end point
}
```

#### Methods
```javascript
const pinSection = new PinSection({
  element: '.pin-section',
  duration: '200%',
  animations: [
    {
      target: '.pin-content',
      animation: { opacity: 1, y: 0 },
      start: '0%',
      end: '50%'
    }
  ]
})

// Add new animation
pinSection.addAnimation({
  target: '.new-element',
  animation: { scale: 1.2 },
  start: '50%',
  end: '100%'
})

// Update duration
pinSection.updateDuration('300%')
```

### ProgressAnim

#### Constructor
```javascript
new ProgressAnim(options)
```

#### Options
| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `element` | `String|NodeList` | Required | CSS selector or DOM elements |
| `type` | `String` | `'width'` | Progress type: 'width', 'height', 'opacity', 'scale' |
| `from` | `Number` | `0` | Starting value |
| `to` | `Number` | `100` | Ending value |
| `unit` | `String` | `'%'` | Value unit |
| `ease` | `String` | `'none'` | GSAP easing function |

#### Methods
```javascript
const progress = new ProgressAnim({
  element: '.progress-bar',
  type: 'width',
  from: 0,
  to: 100,
  unit: '%'
})

// Update progress value
progress.updateProgress(75)

// Change animation type
progress.updateType('opacity')
```

---

## 🛠️ Utility Functions

### Animation Utils

#### `createTimeline(options)`
Create a GSAP timeline with ScrollTrigger.
```javascript
import { createTimeline } from './utils'

const tl = createTimeline({
  trigger: '.trigger-element',
  start: 'top center',
  end: 'bottom center',
  scrub: true
})
```

#### `detectReducedMotion()`
Detect if user prefers reduced motion.
```javascript
import { detectReducedMotion } from './utils'

if (detectReducedMotion()) {
  // Use reduced motion animations
}
```

#### `getScrollPosition()`
Get current scroll position.
```javascript
import { getScrollPosition } from './utils'

const position = getScrollPosition()
console.log(position) // { x: 0, y: 1200 }
```

#### `throttle(callback, delay)`
Throttle function execution.
```javascript
import { throttle } from './utils'

const throttledFunction = throttle(() => {
  console.log('Throttled execution')
}, 100)
```

#### `debounce(callback, delay)`
Debounce function execution.
```javascript
import { debounce } from './utils'

const debouncedFunction = debounce(() => {
  console.log('Debounced execution')
}, 300)
```

### Performance Utils

#### `measurePerformance(name, callback)`
Measure function performance.
```javascript
import { measurePerformance } from './utils'

const result = await measurePerformance('animation', () => {
  // Animation code here
})
console.log(`Animation took ${result.duration}ms`)
```

#### `getMemoryUsage()`
Get current memory usage.
```javascript
import { getMemoryUsage } from './utils'

const memory = getMemoryUsage()
console.log(`Memory usage: ${memory.usedJSHeapSize}MB`)
```

#### `checkFrameRate()`
Check current frame rate.
```javascript
import { checkFrameRate } from './utils'

const fps = await checkFrameRate()
console.log(`Current FPS: ${fps}`)
```

---

## ⚙️ Configuration Options

### Global Configuration
```javascript
// resources/js/animations/config.js
export const animationConfig = {
  // Core settings
  core: {
    smooth: true,
    multiplier: 1.2,
    mobile: {
      smooth: false,
      breakpoint: 768
    }
  },
  
  // Performance settings
  performance: {
    enableMonitoring: true,
    frameRateTarget: 60,
    memoryLimit: 10,
    cleanupInterval: 30000
  },
  
  // Accessibility settings
  accessibility: {
    respectReducedMotion: true,
    enableKeyboardNavigation: true,
    announceChanges: true,
    focusManagement: true
  },
  
  // Theme settings
  themes: {
    default: {
      duration: 1,
      ease: 'power2.out',
      stagger: 0.1
    },
    fast: {
      duration: 0.5,
      ease: 'power2.inOut',
      stagger: 0.05
    },
    slow: {
      duration: 2,
      ease: 'power2.out',
      stagger: 0.2
    }
  }
}
```

### Component Defaults
```javascript
export const componentDefaults = {
  fadeReveal: {
    direction: 'up',
    duration: 1,
    delay: 0,
    stagger: 0.1,
    ease: 'power2.out',
    trigger: 'top 80%'
  },
  
  slideIn: {
    direction: 'left',
    distance: 100,
    duration: 1,
    stagger: 0.1,
    ease: 'power2.out'
  },
  
  parallaxBg: {
    speed: -0.5,
    direction: 'vertical',
    mobile: false,
    breakpoint: 768
  },
  
  textReveal: {
    type: 'chars',
    direction: 'up',
    stagger: 0.03,
    duration: 0.8,
    ease: 'power2.out'
  },
  
  pinSection: {
    duration: '100%',
    animations: [],
    scrub: true,
    onUpdate: null
  },
  
  progressAnim: {
    type: 'width',
    from: 0,
    to: 100,
    unit: '%',
    ease: 'none'
  }
}
```

---

## 📡 Event System

### Event Types
```javascript
const eventTypes = {
  // Core events
  INIT: 'animation:init',
  DESTROY: 'animation:destroy',
  CONFIG_UPDATE: 'animation:config:update',
  
  // Component events
  COMPONENT_CREATE: 'animation:component:create',
  COMPONENT_DESTROY: 'animation:component:destroy',
  
  // Performance events
  PERFORMANCE_WARNING: 'animation:performance:warning',
  MEMORY_LIMIT: 'animation:memory:limit',
  
  // Accessibility events
  REDUCED_MOTION_ENABLE: 'animation:accessibility:reducedMotion:enable',
  REDUCED_MOTION_DISABLE: 'animation:accessibility:reducedMotion:disable'
}
```

### Event Listeners
```javascript
import { AnimationCore } from './core'

const animationCore = new AnimationCore()

// Listen for initialization
animationCore.on('animation:init', () => {
  console.log('Animation system initialized')
})

// Listen for performance warnings
animationCore.on('animation:performance:warning', (data) => {
  console.warn('Performance warning:', data)
})

// Listen for memory limit
animationCore.on('animation:memory:limit', (data) => {
  console.warn('Memory limit reached:', data)
})
```

### Custom Events
```javascript
// Dispatch custom events
animationCore.emit('animation:custom:event', {
  type: 'custom',
  data: { message: 'Custom event data' }
})

// Listen for custom events
animationCore.on('animation:custom:event', (data) => {
  console.log('Custom event received:', data)
})
```

---

## 🧩 Blade Components

### FadeReveal Component
```php
{{-- resources/views/components/animations/fade-reveal.blade.php --}}
@props([
    'direction' => 'up',
    'duration' => 1,
    'delay' => 0,
    'stagger' => 0.1,
    'ease' => 'power2.out',
    'trigger' => 'top 80%',
    'class' => ''
])

<div 
    class="fade-reveal {{ $class }}" 
    data-animation="fade-reveal"
    data-direction="{{ $direction }}"
    data-duration="{{ $duration }}"
    data-delay="{{ $delay }}"
    data-stagger="{{ $stagger }}"
    data-ease="{{ $ease }}"
    data-trigger="{{ $trigger }}"
>
    {{ $slot }}
</div>
```

### SlideIn Component
```php
{{-- resources/views/components/animations/slide-in.blade.php --}}
@props([
    'direction' => 'left',
    'distance' => 100,
    'duration' => 1,
    'stagger' => 0.1,
    'ease' => 'power2.out',
    'class' => ''
])

<div 
    class="slide-in {{ $class }}" 
    data-animation="slide-in"
    data-direction="{{ $direction }}"
    data-distance="{{ $distance }}"
    data-duration="{{ $duration }}"
    data-stagger="{{ $stagger }}"
    data-ease="{{ $ease }}"
>
    {{ $slot }}
</div>
```

### ParallaxBg Component
```php
{{-- resources/views/components/animations/parallax-bg.blade.php --}}
@props([
    'speed' => -0.5,
    'direction' => 'vertical',
    'mobile' => false,
    'breakpoint' => 768,
    'class' => ''
])

<div 
    class="parallax-bg {{ $class }}" 
    data-animation="parallax-bg"
    data-speed="{{ $speed }}"
    data-direction="{{ $direction }}"
    data-mobile="{{ $mobile ? 'true' : 'false' }}"
    data-breakpoint="{{ $breakpoint }}"
>
    {{ $slot }}
</div>
```

### TextReveal Component
```php
{{-- resources/views/components/animations/text-reveal.blade.php --}}
@props([
    'type' => 'chars',
    'direction' => 'up',
    'stagger' => 0.03,
    'duration' => 0.8,
    'ease' => 'power2.out',
    'class' => ''
])

<div 
    class="text-reveal {{ $class }}" 
    data-animation="text-reveal"
    data-type="{{ $type }}"
    data-direction="{{ $direction }}"
    data-stagger="{{ $stagger }}"
    data-duration="{{ $duration }}"
    data-ease="{{ $ease }}"
>
    {{ $slot }}
</div>
```

### PinSection Component
```php
{{-- resources/views/components/animations/pin-section.blade.php --}}
@props([
    'duration' => '100%',
    'scrub' => true,
    'class' => ''
])

<div 
    class="pin-section {{ $class }}" 
    data-animation="pin-section"
    data-duration="{{ $duration }}"
    data-scrub="{{ $scrub ? 'true' : 'false' }}"
>
    {{ $slot }}
</div>
```

---

## 🎮 JavaScript API

### Global Animation Instance
```javascript
// Access global animation instance
window.animations = new AnimationCore()

// Initialize
window.animations.init()

// Access from anywhere
const animations = window.animations
```

### Component Registration
```javascript
// Register custom components
window.animations.registerComponent('custom-animation', CustomAnimationClass)

// Use registered component
window.animations.create('custom-animation', {
  element: '.custom-element',
  // options...
})
```

### Batch Operations
```javascript
// Create multiple animations at once
window.animations.batch([
  {
    type: 'fade-reveal',
    element: '.fade-element',
    options: { direction: 'up' }
  },
  {
    type: 'slide-in',
    element: '.slide-element',
    options: { direction: 'left' }
  }
])
```

### Animation Control
```javascript
// Pause all animations
window.animations.pauseAll()

// Resume all animations
window.animations.resumeAll()

// Kill all animations
window.animations.killAll()

// Update all animations
window.animations.updateAll()
```

---

## 🎨 CSS Classes

### Animation Base Classes
```css
/* Base animation classes */
.animate-fade-in {
  opacity: 0;
  animation: fadeIn 0.6s ease-out forwards;
}

.animate-slide-up {
  opacity: 0;
  transform: translateY(30px);
  animation: slideUp 0.8s ease-out forwards;
}

.animate-slide-left {
  opacity: 0;
  transform: translateX(30px);
  animation: slideLeft 0.8s ease-out forwards;
}

.animate-slide-right {
  opacity: 0;
  transform: translateX(-30px);
  animation: slideRight 0.8s ease-out forwards;
}
```

### Performance Classes
```css
/* Performance optimization classes */
.animate-optimized {
  will-change: transform, opacity;
  transform: translateZ(0);
  backface-visibility: hidden;
  perspective: 1000px;
}

.animate-gpu {
  transform: translateZ(0);
  will-change: transform;
}

.animate-smooth {
  scroll-behavior: smooth;
}
```

### Accessibility Classes
```css
/* Accessibility classes */
@media (prefers-reduced-motion: reduce) {
  .animate-fade-in,
  .animate-slide-up,
  .animate-slide-left,
  .animate-slide-right {
    animation: none;
    opacity: 1;
    transform: none;
  }
}

.animate-focus-visible:focus-visible {
  outline: 2px solid #0066cc;
  outline-offset: 2px;
}
```

### Theme Classes
```css
/* Theme variations */
.animate-fast {
  animation-duration: 0.3s;
}

.animate-slow {
  animation-duration: 1.5s;
}

.animate-bounce {
  animation-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
}
```

---

*This API reference provides complete documentation for all animation components, utilities, and configuration options. Use this as a reference guide during development and implementation.*


