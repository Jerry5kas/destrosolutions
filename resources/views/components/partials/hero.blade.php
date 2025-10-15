
<section
  x-data="carousel"
  x-init="start()"
  class="relative w-full h-[28rem] sm:h-[35rem] md:h-[40rem] overflow-hidden border border-b border-gray-300"
>
  <!-- Slides Wrapper -->
  <div
    class="absolute inset-0 flex transition-transform duration-[1000ms] ease-in-out border border-b border-gray-300"
    :style="`transform: translateX(-${currentIndex * 100}%);`"
  >
    <!-- Slides Loop -->
    <template x-for="(slide, index) in slides" :key="index">
      <div
        class="w-full flex-shrink-0 h-full flex items-center justify-center relative text-center bg-center bg-cover bg-no-repeat transition-all duration-[6000ms]"
        :class="{ 'scale-110': currentIndex === index }"
        :style="`background-image: url(${slide.bg});`"
      >
        <!-- White overlay -->
        <div class="absolute inset-0 bg-white/75 backdrop-blur-[1px] z-0"></div>

        <!-- Grid lines - Hidden on mobile, visible on md+ -->
        <div class="absolute inset-0 z-10 hidden md:flex border-l border-r border-gray-300">
          <div class="basis-[10%] border-r border-gray-300"></div>
          <div class="basis-[25%] border-r border-gray-300"></div>
          <div class="basis-[30%] border-r border-gray-300"></div>
          <div class="basis-[25%] border-r border-gray-300"></div>
          <div class="basis-[10%]"></div>
        </div>

        <!-- Content -->
        <div class="relative z-20 max-w-3xl mx-auto px-4 sm:px-6 text-black flex flex-col justify-center items-center gap-y-4 sm:gap-y-6 md:gap-y-8">
          <h1 x-text="slide.title" class="text-4xl sm:text-5xl md:text-7xl lg:text-8xl font-extrabold font-sans"></h1>
          <p x-text="slide.subtitle" class="text-gray-700 text-xs sm:text-sm md:text-base leading-relaxed max-w-2xl"></p>
          <button class="bg-black text-white font-semibold max-w-max py-2 px-5 sm:py-3 sm:px-6 hover:bg-gray-800 transition text-sm sm:text-base">
            Become elite
          </button>
        </div>
      </div>
    </template>
  </div>

  <!-- Dot Indicators -->
  <div class="absolute bottom-4 sm:bottom-6 left-1/2 transform -translate-x-1/2 z-30 flex space-x-2">
    <template x-for="(slide, i) in slides" :key="i">
      <div
        :class="{
          'bg-black/70': currentIndex === i,
          'bg-gray-400': currentIndex !== i
        }"
        class="w-2 h-2 rounded-full transition-all duration-300"
      ></div>
    </template>
  </div>
</section>

<!-- Alpine Logic -->
<script>
  document.addEventListener('alpine:init', () => {
    Alpine.data('carousel', () => ({
      currentIndex: 0,
      slides: [
        {
          title: 'Structura',
          subtitle: 'Lorem ipsum dolor sit amet consectetur adipiscing elit...',
          bg: '{{ asset("images/carbgw1.jpg") }}'
        },
        {
          title: 'Innovation',
          subtitle: 'Technology meets design with smart architecture...',
          bg: '{{ asset("images/carbgw2.jpg") }}'
        },
        {
          title: 'Efficiency',
          subtitle: 'Maximizing productivity through structural excellence...',
          bg: '{{ asset("images/carbfw3.jpg") }}'
        }
      ],
      interval: null,
      start() {
        this.interval = setInterval(() => {
          this.currentIndex = (this.currentIndex + 1) % this.slides.length;
        }, 6000); // 6 seconds
      }
    }))
  });
</script>
