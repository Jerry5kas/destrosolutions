
<section class="hero-section relative w-full h-[24rem] sm:h-[35rem] md:h-[40rem] lg:h-[45rem] overflow-hidden border border-b border-gray-300">
  <!-- Slides Container -->
  <div class="slides-container relative w-full h-full">
    @foreach($slides as $index => $slide)
    <div class="slide absolute inset-0 w-full h-full flex items-center justify-center text-center transition-opacity duration-1000 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}" 
         data-slide="{{ $index }}">
      
      <!-- Background image with zoom effect -->
      <div class="slide-bg absolute inset-0 bg-center bg-cover bg-no-repeat transition-transform duration-1000 ease-out" 
           style="background-image: url('{{ $slide['bg'] }}');"></div>
      
      <!-- Background overlay -->
      <div class="absolute inset-0 bg-gray-900/50 z-0"></div>

      <!-- Grid lines -->
      <div class="absolute inset-0 z-10 hidden md:flex border-l border-r border-gray-600">
        <div class="basis-[10%] border-r border-gray-600"></div>
        <div class="basis-[25%] border-r border-gray-600"></div>
        <div class="basis-[30%] border-r border-gray-600"></div>
        <div class="basis-[25%] border-r border-gray-600"></div>
          <div class="basis-[10%]"></div>
        </div>

        <!-- Content -->
      <div class="hero-content relative z-20 max-w-sm sm:max-w-2xl md:max-w-3xl lg:max-w-4xl xl:max-w-5xl mx-auto px-4 sm:px-6 md:px-8 flex flex-col justify-center items-center gap-y-4 sm:gap-y-6 md:gap-y-8">
        
        <!-- Title with Block Letters -->
        <h1 class="hero-title text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold font-sans leading-tight text-center">
          <span class="title-text">{{ $slide['title'] }}</span>
        </h1>
        
        <!-- Subtitle -->
        <p class="hero-subtitle text-white text-sm sm:text-lg md:text-xl leading-relaxed max-w-sm sm:max-w-lg md:max-w-xl lg:max-w-2xl text-center px-2">{{ $slide['subtitle'] }}</p>
        
        <!-- Continuous Gradient Button -->
        <button class="hero-button gradient-button text-white font-semibold max-w-max py-3 px-6 sm:py-4 sm:px-8 md:py-4 md:px-10 text-sm sm:text-base rounded-full shadow-lg hover:shadow-xl group">
          <!-- Button Content -->
          <div class="button-content relative z-10 flex items-center gap-2">
            <!-- SVG Icon -->
            <svg class="button-icon w-4 h-4 sm:w-5 sm:h-5 transition-transform duration-300 group-hover:scale-110" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
            </svg>
            
            <!-- Button Text -->
            <span class="button-text">Get in Contact</span>
            
            <!-- Arrow Icon -->
            <svg class="arrow-icon w-4 h-4 sm:w-5 sm:h-5 transition-transform duration-300 group-hover:translate-x-1" fill="currentColor" viewBox="0 0 24 24">
              <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z"/>
            </svg>
          </div>
          </button>
        </div>
      </div>
    @endforeach
  </div>

  <!-- Dot Indicators -->
  <div class="dots-container absolute bottom-4 sm:bottom-6 left-1/2 transform -translate-x-1/2 z-30 flex space-x-3">
    @foreach($slides as $index => $slide)
    <div class="dot w-3 h-3 rounded-full transition-all duration-300 cursor-pointer {{ $index === 0 ? 'bg-blue-600' : 'bg-gray-600' }}" 
         data-slide="{{ $index }}"></div>
    @endforeach
  </div>

  <!-- Progress Bar -->
  <div class="progress-bar absolute bottom-0 left-0 w-full h-1 bg-gray-600 z-30">
    <div class="progress-fill h-full bg-blue-600"></div>
  </div>
</section>

<!-- Simple Hero System -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  console.log('Initializing simple hero system');
  
  const slides = document.querySelectorAll('.slide');
  const dots = document.querySelectorAll('.dot');
  const progressFill = document.querySelector('.progress-fill');
  
  let currentSlide = 0;
  let slideInterval = null;
  const slideDuration = 5000; // 5 seconds

  // Simple loading sequence
  function initHero() {
    console.log(`Initializing hero with ${slides.length} slides`);
    
    // Ensure all slides are properly positioned
    slides.forEach((slide, index) => {
      if (index === 0) {
        slide.classList.remove('opacity-0');
        slide.classList.add('opacity-100');
        // Trigger initial zoom effect
        triggerImageZoom(slide);
        // Only animate title on initial load, not subtitle/button
        animateTitleOnly(slide);
      } else {
        slide.classList.remove('opacity-100');
        slide.classList.add('opacity-0');
      }
    });
    
    setupDotControls();
    
    // Initialize progress bar for first slide
    resetProgress();
    setTimeout(() => {
      updateProgress();
    }, 100);
    
    startCarousel();
    
    // Hide loading overlay after a short delay
    setTimeout(() => {
      hideLoadingOverlay();
    }, 1000);
  }

  function hideLoadingOverlay() {
    console.log('Hiding loading overlay');
    if (loadingOverlay) {
      loadingOverlay.style.transition = 'opacity 0.5s ease-out';
      loadingOverlay.style.opacity = '0';
      
      setTimeout(() => {
        loadingOverlay.style.display = 'none';
        console.log('Loading overlay hidden');
      }, 500);
    }
  }

  // Animate title only (for initial page load)
  function animateTitleOnly(slide) {
    console.log('Animating title only for initial load');
    
    const title = slide.querySelector('.hero-title .title-text');
    const subtitle = slide.querySelector('.hero-subtitle');
    const button = slide.querySelector('.hero-button');

    // Make subtitle and button visible immediately (no animation)
    if (subtitle) {
      // For initial load, show subtitle immediately without any animation
      subtitle.style.opacity = '1';
      subtitle.style.transform = 'translateY(0)';
      subtitle.style.transition = 'none';
      subtitle.style.animation = 'none';
      subtitle.style.webkitAnimation = 'none';
      subtitle.style.mozAnimation = 'none';
      subtitle.style.msAnimation = 'none';
      subtitle.style.oAnimation = 'none';
      console.log('Subtitle visible immediately on initial load - no animations');
    }
    
    if (button) {
      button.style.opacity = '1';
      button.style.transform = 'translateY(0)';
      button.style.transition = 'none';
      console.log('Button visible immediately');
    }

    // Only animate title
    if (title) {
      animateTitle(title);
    }
  }

  // Animate slide content (for slide changes)
  function animateSlideContent(slide) {
    console.log('Animating slide content for slide:', slide);
    
    const title = slide.querySelector('.hero-title .title-text');
    const subtitle = slide.querySelector('.hero-subtitle');
    const button = slide.querySelector('.hero-button');

    console.log('Found elements:', { 
      title: !!title, 
      subtitle: !!subtitle, 
      button: !!button,
      subtitleText: subtitle ? subtitle.textContent : 'N/A'
    });

    // Reset subtitle and button to initial state
    if (subtitle) {
      subtitle.style.opacity = '0';
      subtitle.style.transform = 'translateY(20px)';
      subtitle.style.transition = 'none';
      console.log('Reset subtitle to initial state');
    }
    
    if (button) {
      button.style.opacity = '0';
      button.style.transform = 'translateY(30px)';
      button.style.transition = 'none';
      console.log('Reset button to initial state');
    }

    // Force reflow to ensure styles are applied
    slide.offsetHeight;

    // Animate title with block letters
    if (title) {
      animateTitle(title);
    }

    // Animate subtitle word-by-word
    if (subtitle) {
      setTimeout(() => {
        animateSubtitleWords(subtitle);
      }, 400); // Start after title begins
    }

    // Animate button after subtitle
    setTimeout(() => {
      console.log('Starting button animation');
      
      // Animate button
      if (button) {
        button.style.transition = 'all 0.8s ease';
        button.style.opacity = '1';
        button.style.transform = 'translateY(0)';
        console.log('Animating button - opacity:', button.style.opacity, 'transform:', button.style.transform);
      }
    }, 800); // Start after subtitle animation begins
  }

  // Word-by-word subtitle animation
  function animateSubtitleWords(subtitleElement) {
    if (!subtitleElement) return;
    
    const text = subtitleElement.textContent;
    if (!text) return;
    
    console.log('Starting word-by-word subtitle animation');
    
    // Clear any existing animations
    subtitleElement.style.animation = 'none';
    subtitleElement.style.webkitAnimation = 'none';
    subtitleElement.style.mozAnimation = 'none';
    subtitleElement.style.msAnimation = 'none';
    subtitleElement.style.oAnimation = 'none';
    
    // Split text into words
    const words = text.split(' ');
    
    // Create word spans
    subtitleElement.innerHTML = words.map(word => 
      `<span class="subtitle-word">${word}</span>`
    ).join(' ');

    const wordElements = subtitleElement.querySelectorAll('.subtitle-word');
    
    if (wordElements.length === 0) return;
    
    // Set initial state for all words
    wordElements.forEach((word, index) => {
      word.style.opacity = '0';
      word.style.transform = 'translateY(20px)';
      word.style.transition = 'all 0.6s ease';
      
      // Animate each word with stagger
      setTimeout(() => {
        word.style.opacity = '1';
        word.style.transform = 'translateY(0)';
        console.log(`Animating word ${index + 1}/${wordElements.length}: "${word.textContent}"`);
      }, index * 150 + 100); // 150ms stagger between words
    });
    
    // Make subtitle container visible
    subtitleElement.style.opacity = '1';
    subtitleElement.style.transform = 'translateY(0)';
    subtitleElement.style.transition = 'all 0.3s ease';
  }

  // Simple title animation
  function animateTitle(titleElement) {
    if (!titleElement) return;
    
    const text = titleElement.textContent;
    if (!text) return;
    
    // Split text into words first, then letters
    const words = text.split(' ');
    titleElement.innerHTML = words.map(word => 
      `<span class="word">${word.split('').map(char => 
        `<span class="letter-block">${char}</span>`
      ).join('')}</span>`
    ).join(' ');

    const letters = titleElement.querySelectorAll('.letter-block');
    
    if (letters.length === 0) return;
    
    // Set initial state
    letters.forEach((letter, index) => {
      letter.style.opacity = '0';
      letter.style.transform = 'translateY(30px)';
      letter.style.transition = 'all 0.6s ease';
      
      // Animate with stagger
      setTimeout(() => {
        letter.style.opacity = '1';
        letter.style.transform = 'translateY(0)';
      }, index * 50 + 100);
    });
  }

  // Setup dot controls
  function setupDotControls() {
    dots.forEach((dot, index) => {
      dot.addEventListener('click', () => goToSlide(index));
    });
  }

  // Go to specific slide
  function goToSlide(slideIndex) {
    if (slideIndex === currentSlide) return;
    
    console.log(`Going to slide ${slideIndex}`);
    
    // Stop current progress and reset
    stopProgress();
    resetProgress();
    
    // Hide current slide
    slides[currentSlide].classList.remove('opacity-100');
    slides[currentSlide].classList.add('opacity-0');
    
    // Show new slide
    currentSlide = slideIndex;
    slides[currentSlide].classList.remove('opacity-0');
    slides[currentSlide].classList.add('opacity-100');
    
    console.log(`Now showing slide ${currentSlide}`);
    
    // Trigger background image zoom-out effect
    triggerImageZoom(slides[currentSlide]);
    
    // Animate new slide content
    setTimeout(() => {
      console.log(`Starting content animation for slide ${currentSlide}`);
      animateSlideContent(slides[currentSlide]);
    }, 200);
    
    // Update dots
    updateDots();
    
    // Start fresh progress for new slide
    setTimeout(() => {
      updateProgress();
    }, 100);
  }

  // Background image zoom-out effect
  function triggerImageZoom(slide) {
    const slideBg = slide.querySelector('.slide-bg');
    if (!slideBg) {
      console.log('No slide-bg found');
      return;
    }
    
    console.log('Triggering image zoom effect');
    
    // Reset zoom and transition
    slideBg.style.transition = 'none';
    slideBg.style.transform = 'scale(1.1)';
    
    // Force reflow
    slideBg.offsetHeight;
    
    // Trigger zoom-out animation
    setTimeout(() => {
      slideBg.style.transition = 'transform 8s ease-out';
      slideBg.style.transform = 'scale(1)';
      console.log('Zoom animation started');
    }, 100);
  }

  // Update dots
  function updateDots() {
    dots.forEach((dot, index) => {
      if (index === currentSlide) {
        dot.classList.remove('bg-gray-600');
        dot.classList.add('bg-blue-600');
      } else {
        dot.classList.remove('bg-blue-600');
        dot.classList.add('bg-gray-600');
      }
    });
  }

  // Progress bar animation
  function updateProgress() {
    console.log('Starting progress bar animation');
    stopProgress();
    progressFill.style.width = '0%';
    progressFill.style.transition = `width ${slideDuration}ms linear`;
    setTimeout(() => {
      progressFill.style.width = '100%';
      console.log('Progress bar animation started');
    }, 50);
  }

  function stopProgress() {
    progressFill.style.transition = 'none';
  }

  function resetProgress() {
    console.log('Resetting progress bar to 0%');
    progressFill.style.transition = 'none';
    progressFill.style.width = '0%';
  }

  // Next slide
  function nextSlide() {
    const nextIndex = (currentSlide + 1) % slides.length;
    console.log(`Auto-advancing from slide ${currentSlide} to slide ${nextIndex}`);
    goToSlide(nextIndex);
  }

  // Start carousel
  function startCarousel() {
    console.log('Starting carousel with interval:', slideDuration);
    slideInterval = setInterval(() => {
      nextSlide();
    }, slideDuration);
    updateProgress();
  }

  // Stop carousel
  function stopCarousel() {
    if (slideInterval) {
      clearInterval(slideInterval);
      slideInterval = null;
    }
    stopProgress();
  }

  // Pause on hover
  const heroSection = document.querySelector('.hero-section');
  heroSection.addEventListener('mouseenter', stopCarousel);
  heroSection.addEventListener('mouseleave', startCarousel);

  // Initialize hero immediately
  initHero();

  // Make it globally available
  window.heroCarousel = {
    goToSlide,
    nextSlide,
    stopCarousel,
    startCarousel
  };
  });
</script>

<style>
/* Simple Loading Overlay Styles */
.loading-overlay {
  background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
}

.loading-content {
  animation: fadeInUp 0.5s ease-out;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Car Running Animation */
@keyframes carRun {
  0% {
    transform: translateX(-100%) translateY(-20px) scaleX(-1);
    opacity: 0.8;
  }
  10% {
    transform: translateX(-80%) translateY(-15px) scaleX(-1);
    opacity: 0.9;
  }
  20% {
    transform: translateX(-60%) translateY(-10px) scaleX(-1);
    opacity: 1;
  }
  30% {
    transform: translateX(-40%) translateY(-5px) scaleX(-1);
    opacity: 1;
  }
  100% {
    transform: translateX(100%) translateY(0) scaleX(-1);
    opacity: 1;
  }
}

.animate-car-run {
  animation: carRun 3s ease-out infinite;
}

.car-container {
  position: relative;
  max-width: 300px; /* Match logo width */
}

.car-track {
  position: relative;
  overflow: hidden;
}

/* Simple Reliable Hero Section Styles */
.hero-section {
  overflow: hidden;
}

.hero-section .slide {
  transition: opacity 1s ease-in-out;
}

.hero-section .slide-bg {
  transform-origin: center center;
  will-change: transform;
  transform: scale(1.1);
}

/* Initial states handled by JavaScript */

.hero-section .hero-title {
  font-family: 'Inter', sans-serif;
  font-weight: 700;
}

.hero-section .hero-title .letter-block {
  display: inline-block;
  background: white;
  color: black;
  border-radius: 4px;
  padding: 2px 4px;
  margin: 1px;
  font-weight: bold;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.hero-section .hero-title .word {
  display: inline-block;
  margin-right: 0.3em;
}

.hero-section .hero-subtitle {
  font-weight: 400;
  text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
  /* Initial state - no animations by default */
  opacity: 1;
  transform: translateY(0);
  transition: none;
  animation: none;
  -webkit-animation: none;
  -moz-animation: none;
  -ms-animation: none;
  -o-animation: none;
}

.hero-section .hero-subtitle .subtitle-word {
  display: inline-block;
  margin-right: 0.25em;
  opacity: 0;
  transform: translateY(20px);
  transition: all 0.6s ease;
}

/* Beautiful Continuous Gradient Button */
.hero-section .gradient-button {
  -webkit-appearance: none;
  background: linear-gradient(to right, #3b82f6 0%, #2563eb 25%, #1d4ed8 50%, #1e40af 75%, #1e3a8a 100%);
  background-size: 500%;
  border: none;
  border-radius: 5rem;
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
  color: white;
  cursor: pointer;
  font-family: 'Inter', sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  letter-spacing: 0.05em;
  outline: none;
  -webkit-tap-highlight-color: transparent;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  transition: all 0.3s ease;
  animation: gradientFlow 3s ease infinite;
}

.hero-section .gradient-button:hover {
  transform: translateY(-2px);
  box-shadow: 0 0.8rem 1.5rem rgba(0, 0, 0, 0.2);
}

.hero-section .gradient-button:active {
  transform: translateY(0);
}

/* Button Content */
.hero-section .button-content {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  position: relative;
  z-index: 10;
}

/* Icon Animations */
.hero-section .button-icon {
  transition: all 0.3s ease;
}

.hero-section .arrow-icon {
  transition: all 0.3s ease;
}

/* Continuous Gradient Animation */
@keyframes gradientFlow {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}

/* Responsive Button */
@media (max-width: 768px) {
  .hero-section .gradient-button {
    padding: 10px 20px;
    font-size: 0.9em;
  }
  
  .hero-section .button-content {
    gap: 0.25rem;
  }
}

.hero-section .dot {
  transition: all 0.3s ease;
  border: none;
}

.hero-section .dot:hover {
  transform: scale(1.1);
}

.hero-section .progress-bar {
  border-radius: 0;
  overflow: hidden;
}

.hero-section .progress-fill {
  border-radius: 0;
  transition: width 0.1s ease;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .hero-section .hero-title .letter-block {
    padding: 1px 3px;
    margin: 0.5px;
    font-size: 0.9em;
  }
  
  .hero-section .hero-button {
    padding: 10px 20px;
    font-size: 0.9em;
  }
}

@media (max-width: 480px) {
  .hero-section .hero-title .letter-block {
    padding: 1px 2px;
    margin: 0.5px;
    font-size: 0.8em;
  }
}

/* Ensure proper text rendering */
.hero-section .hero-title .title-text {
  display: block;
  line-height: 1.1;
}

/* Professional spacing */
.hero-section .hero-content {
  text-align: center;
}

.hero-section .hero-content > * {
  margin-bottom: 1rem;
}

.hero-section .hero-content > *:last-child {
  margin-bottom: 0;
}
</style>

