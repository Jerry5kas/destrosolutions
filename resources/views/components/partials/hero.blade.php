
<section class="hero-section relative w-full h-[24rem] sm:h-[35rem] md:h-[40rem] lg:h-[45rem] overflow-hidden border border-b border-gray-300">
  <!-- Slides Container -->
  <div class="slides-container relative w-full h-full">
    @foreach($slides as $index => $slide)
    <div class="slide absolute inset-0 w-full h-full flex items-center justify-center text-center bg-center bg-cover bg-no-repeat transition-opacity duration-1000 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}" 
         style="background-image: url('{{ $slide['bg'] }}');" 
         data-slide="{{ $index }}">
      
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
        <p class="hero-subtitle text-white text-sm sm:text-base md:text-lg leading-relaxed max-w-sm sm:max-w-lg md:max-w-xl lg:max-w-2xl text-center px-2">{{ $slide['subtitle'] }}</p>
        
        <!-- Button -->
        <button class="hero-button bg-blue-600 hover:bg-blue-700 text-white font-semibold max-w-max py-3 px-6 sm:py-4 sm:px-8 md:py-4 md:px-10 transition-colors duration-300 text-sm sm:text-base rounded-lg shadow-lg hover:shadow-xl">
          Get in Contact
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

<!-- Simple Bulletproof Hero System -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  console.log('Initializing simple hero system');
  
  const slides = document.querySelectorAll('.slide');
  const dots = document.querySelectorAll('.dot');
  const progressFill = document.querySelector('.progress-fill');
  
  let currentSlide = 0;
  let slideInterval = null;
  const slideDuration = 5000; // 5 seconds

  // Initialize hero
  function initHero() {
    console.log(`Initializing hero with ${slides.length} slides`);
    
    // Ensure all slides are properly positioned
    slides.forEach((slide, index) => {
      if (index === 0) {
        slide.classList.remove('opacity-0');
        slide.classList.add('opacity-100');
        animateSlideContent(slide);
      } else {
        slide.classList.remove('opacity-100');
        slide.classList.add('opacity-0');
      }
    });
    
    setupDotControls();
    startCarousel();
  }

  // Animate slide content
  function animateSlideContent(slide) {
    const title = slide.querySelector('.hero-title .title-text');
    const subtitle = slide.querySelector('.hero-subtitle');
    const button = slide.querySelector('.hero-button');

    // Animate title with block letters
    if (title) {
      animateTitle(title);
    }

    // Animate subtitle
    if (subtitle) {
      subtitle.style.opacity = '0';
      subtitle.style.transform = 'translateX(-50px)';
      setTimeout(() => {
        subtitle.style.transition = 'all 0.8s ease';
        subtitle.style.opacity = '1';
        subtitle.style.transform = 'translateX(0)';
      }, 300);
    }

    // Animate button
    if (button) {
      button.style.opacity = '0';
      button.style.transform = 'translateX(50px)';
      setTimeout(() => {
        button.style.transition = 'all 0.8s ease';
        button.style.opacity = '1';
        button.style.transform = 'translateX(0)';
      }, 500);
    }
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
    
    // Stop current progress
    stopProgress();
    
    // Hide current slide
    slides[currentSlide].classList.remove('opacity-100');
    slides[currentSlide].classList.add('opacity-0');
    
    // Show new slide
    currentSlide = slideIndex;
    slides[currentSlide].classList.remove('opacity-0');
    slides[currentSlide].classList.add('opacity-100');
    
    // Animate new slide content
    setTimeout(() => {
      animateSlideContent(slides[currentSlide]);
    }, 100);
    
    // Update dots
    updateDots();
    
    // Start progress
    updateProgress();
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
    stopProgress();
    progressFill.style.width = '0%';
    progressFill.style.transition = `width ${slideDuration}ms linear`;
    setTimeout(() => {
      progressFill.style.width = '100%';
    }, 50);
  }

  function stopProgress() {
    progressFill.style.transition = 'none';
  }

  // Next slide
  function nextSlide() {
    const nextIndex = (currentSlide + 1) % slides.length;
    goToSlide(nextIndex);
  }

  // Start carousel
  function startCarousel() {
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

  // Initialize
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
/* Simple Reliable Hero Section Styles */
.hero-section {
  overflow: hidden;
}

.hero-section .slide {
  transition: opacity 1s ease-in-out;
}

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
}

.hero-section .hero-button {
  transition: all 0.3s ease;
  border: none;
  outline: none;
}

.hero-section .hero-button:hover {
  transform: translateY(-1px);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
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

