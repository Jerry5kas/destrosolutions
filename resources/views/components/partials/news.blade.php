@php
    // Get blog posts from the controller or use default data as fallback
    $blogPosts = $blogPosts ?? collect();
    $blogPosts = $blogPosts->where('is_active', true)->take(3);
    
    // Default blog posts if no data available
    if ($blogPosts->isEmpty()) {
        $blogPosts = collect([
            (object)[
                'title' => 'Lorem ipsum dolor sit.',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam asperiores, atque aut debitis earum enim esse eveniet facilis fuga ipsa laboriosam laborum minima minus modi nesciunt nihil omnis optio praesentium ratione rem repellendus, saepe sunt unde vero voluptate voluptatem voluptatibus.',
                'image' => null
            ],
            (object)[
                'title' => 'Innovate and accelerate.',
                'description' => 'We believe in blending modern design with seamless technology to deliver impact and efficiency. Experience a new level of innovation through automation and data-driven intelligence.',
                'image' => null
            ],
            (object)[
                'title' => 'Empowering your business.',
                'description' => 'DestroSolutions provides scalable, secure, and tailored digital solutions for enterprises, startups, and innovators worldwide. From concept to code, we build with purpose.',
                'image' => null
            ]
        ]);
    }
@endphp

<div class="w-full py-12 xs:py-16 sm:py-18 md:py-20 border-t border-b border-gray-300 bg-blue-700" data-reveal-scope data-reveal>
    <div class="max-w-xs xs:max-w-sm sm:max-w-2xl md:max-w-4xl lg:max-w-6xl xl:max-w-7xl mx-auto flex flex-col md:flex-row justify-center items-center gap-y-4 xs:gap-y-5 sm:gap-y-6 md:gap-x-5 px-3 xs:px-4 sm:px-6">
        <div class="w-full md:w-1/5 flex flex-col gap-y-2 xs:gap-y-3 text-center md:text-left">
            <div data-reveal class="reveal-delay-0 text-lg xs:text-xl sm:text-2xl md:text-3xl font-semibold font-roboto-slab px-2 text-white">
                What's on and Latest News.
            </div>
            <div data-reveal class="reveal-delay-1 underline underline-offset-2 text-gray-200 text-xs xs:text-sm">All events</div>
        </div>

        <div class="relative w-full sm:w-4/5 mx-auto group news-slider" data-reveal class="reveal-delay-2" data-posts='{{ $blogPosts->toJson() }}'>
            <!-- Slider Container -->
            <div class="overflow-hidden relative">
                <div class="news-container flex transition-transform duration-[1500ms] ease-in-out">
                    @foreach($blogPosts as $index => $post)
                        <div class="news-slide flex-shrink-0 w-full px-3 xs:px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16">
                            <div class="flex flex-col items-start justify-start space-y-3 xs:space-y-4 sm:space-y-5 py-4 xs:py-5 sm:py-6 md:py-8 lg:py-10 text-white">
                                <div class="text-sm xs:text-base sm:text-lg md:text-xl lg:text-2xl font-roboto-slab font-semibold">{{ $post->title }}</div>
                                <div class="text-xs xs:text-sm text-gray-200 leading-relaxed">{{ $post->description }}</div>
                                <div>
                                    <a href="#" class="text-xs xs:text-sm underline underline-offset-4 text-slate-100 hover:text-gray-900 transition">Enter now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Navigation Arrows -->
            <div class="absolute top-1/2 left-0 right-0 -translate-y-1/2 flex items-center justify-between px-1 xs:px-2 sm:px-0">
                <!-- Left -->
                <button
                    class="news-prev-btn bg-white/80 hover:bg-white rounded-full p-1.5 xs:p-2 shadow-md transition-all duration-500 hidden sm:flex items-center justify-center opacity-0 -translate-x-4 xs:-translate-x-5 group-hover:opacity-100 group-hover:translate-x-0"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 xs:w-5 h-4 xs:h-5 text-gray-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </button>

                <!-- Right -->
                <button
                    class="news-next-btn bg-white/80 hover:bg-white rounded-full p-1.5 xs:p-2 shadow-md transition-all duration-500 hidden sm:flex items-center justify-center opacity-0 translate-x-4 xs:translate-x-5 group-hover:opacity-100 group-hover:translate-x-0"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 xs:w-5 h-4 xs:h-5 text-gray-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div class="flex sm:hidden justify-center gap-3 xs:gap-4 mt-3 xs:mt-4">
                <button class="news-prev-btn-mobile bg-gray-200 p-1.5 xs:p-2 rounded-full hover:bg-gray-300 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3 xs:w-4 h-3 xs:h-4 text-gray-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </button>
                <button class="news-next-btn-mobile bg-gray-200 p-1.5 xs:p-2 rounded-full hover:bg-gray-300 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3 xs:w-4 h-3 xs:h-4 text-gray-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Clean News Slider Implementation
    class NewsSlider {
        constructor(element) {
            this.element = element;
            this.container = element.querySelector('.news-container');
            this.slides = element.querySelectorAll('.news-slide');
            this.prevBtn = element.querySelector('.news-prev-btn');
            this.nextBtn = element.querySelector('.news-next-btn');
            this.prevBtnMobile = element.querySelector('.news-prev-btn-mobile');
            this.nextBtnMobile = element.querySelector('.news-next-btn-mobile');
            this.posts = JSON.parse(element.dataset.posts || '[]');
            this.currentIndex = 0;
            this.autoSlideInterval = null;
            this.slideDuration = 7000; // 7 seconds
            
            this.init();
        }

        init() {
            if (this.posts.length === 0) return;
            
            this.bindEvents();
            this.startAutoSlide();
        }

        bindEvents() {
            // Desktop navigation
            this.prevBtn?.addEventListener('click', () => this.previousSlide());
            this.nextBtn?.addEventListener('click', () => this.nextSlide());
            
            // Mobile navigation
            this.prevBtnMobile?.addEventListener('click', () => this.previousSlide());
            this.nextBtnMobile?.addEventListener('click', () => this.nextSlide());
            
            // Pause on hover
            this.element.addEventListener('mouseenter', () => this.stopAutoSlide());
            this.element.addEventListener('mouseleave', () => this.startAutoSlide());
        }

        startAutoSlide() {
            this.autoSlideInterval = setInterval(() => {
                this.nextSlide();
            }, this.slideDuration);
        }

        stopAutoSlide() {
            if (this.autoSlideInterval) {
                clearInterval(this.autoSlideInterval);
                this.autoSlideInterval = null;
            }
        }

        nextSlide() {
            this.currentIndex = (this.currentIndex + 1) % this.posts.length;
            this.updateSlidePosition();
        }

        previousSlide() {
            this.currentIndex = (this.currentIndex - 1 + this.posts.length) % this.posts.length;
            this.updateSlidePosition();
        }

        updateSlidePosition() {
            if (this.container) {
                const translateX = -this.currentIndex * 100;
                this.container.style.transform = `translateX(${translateX}%)`;
            }
        }
    }

    // Initialize all news sliders
    const sliderElements = document.querySelectorAll('.news-slider');
    sliderElements.forEach(element => {
        new NewsSlider(element);
    });
});
</script>