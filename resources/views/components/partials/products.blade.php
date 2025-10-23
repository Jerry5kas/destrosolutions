@php
    // Get products from the controller or use empty collection as fallback
    $products = $products ?? collect();
    $products = $products->where('is_active', true)->take(8); // Limit to 8 products for carousel
@endphp

<div class="relative flex items-center justify-center w-full h-[25rem] xs:h-[28rem] sm:h-[32rem] md:h-[35rem] lg:h-[38rem] my-12 xs:my-16 sm:my-18 md:my-20 overflow-hidden" data-reveal-scope data-reveal>
    <!-- Background dots -->
    <div class="absolute inset-0 z-0 flex flex-wrap justify-start items-start opacity-60">
        @for($i = 0; $i < 100000; $i++)
            <div class="w-0.5 h-0.5 rounded-full bg-blue-700 m-1"></div>
        @endfor
    </div>

    @if($products->isNotEmpty())
    <div 
        class="products-carousel relative w-full flex justify-center items-center my-12 xs:my-16 sm:my-18 md:my-20 overflow-hidden group/outer"
        data-products='{{ $products->toJson() }}'
    >
        <!-- Carousel Container -->
        <div class="relative w-[85%] xs:w-[82%] sm:w-[80%] overflow-hidden" data-reveal class="reveal-delay-0">
            <div class="products-container flex gap-4 xs:gap-6 sm:gap-8 items-center transition-transform ease-linear">
                @foreach($products as $index => $product)
                    <!-- Individual Product Card -->
                    <div class="product-card flex-shrink-0 relative group overflow-hidden" data-reveal class="reveal-delay-{{ $index % 6 }}">
                        <!-- Product Image -->
                        <img
                            src="{{ $product->image ? Storage::url($product->image) : asset('images/car3.jpg') }}"
                            alt="{{ $product->title }}"
                            class="w-48 xs:w-56 sm:w-60 md:w-64 lg:w-72 h-[20rem] xs:h-[22rem] sm:h-[24rem] md:h-[26rem] lg:h-[28rem] object-cover shadow-lg transform transition-transform duration-700 ease-out group-hover:scale-105"
                            onerror="this.src='{{ asset('images/car3.jpg') }}'"
                        >

                        <!-- Overlay fade -->
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-700/70 via-blue-700/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700 ease-out z-10"></div>

                        <!-- Product Title -->
                        <div class="absolute bottom-0 w-full h-16 xs:h-18 sm:h-20 bg-gradient-to-b from-transparent to-blue-700/70 text-white text-xs xs:text-sm font-semibold flex justify-center items-center text-center translate-y-6 xs:translate-y-7 sm:translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-700 ease-out z-20 px-2">
                            {{ $product->title }}
                        </div>
                    </div>
                @endforeach
                
                <!-- Duplicate products for seamless loop -->
                @foreach($products as $index => $product)
                    <div class="product-card flex-shrink-0 relative group overflow-hidden" data-reveal class="reveal-delay-{{ $index % 6 }}">
                        <img
                            src="{{ $product->image ? Storage::url($product->image) : asset('images/car3.jpg') }}"
                            alt="{{ $product->title }}"
                            class="w-48 xs:w-56 sm:w-60 md:w-64 lg:w-72 h-[20rem] xs:h-[22rem] sm:h-[24rem] md:h-[26rem] lg:h-[28rem] object-cover shadow-lg transform transition-transform duration-700 ease-out group-hover:scale-105"
                            onerror="this.src='{{ asset('images/car3.jpg') }}'"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-700/70 via-blue-700/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700 ease-out z-10"></div>
                        <div class="absolute bottom-0 w-full h-16 xs:h-18 sm:h-20 bg-gradient-to-b from-transparent to-blue-700/70 text-white text-xs xs:text-sm font-semibold flex justify-center items-center text-center translate-y-6 xs:translate-y-7 sm:translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-700 ease-out z-20 px-2">
                            {{ $product->title }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Gradient Edges -->
        <div class="absolute left-0 top-0 bottom-0 w-12 xs:w-16 sm:w-20 bg-gradient-to-r from-white to-transparent z-10"></div>
        <div class="absolute right-0 top-0 bottom-0 w-12 xs:w-16 sm:w-20 bg-gradient-to-l from-white to-transparent z-10"></div>

        <!-- Navigation Arrows -->
        <div class="absolute inset-0 flex items-center justify-between px-4 xs:px-6 sm:px-8 z-20 pointer-events-none transition-all duration-700 ease-out group-hover/outer:px-8 xs:group-hover/outer:px-12 sm:group-hover/outer:px-16">
            <!-- Left Arrow -->
            <button
                class="carousel-left-btn pointer-events-auto transform opacity-0 -translate-x-6 xs:-translate-x-8 group-hover/outer:translate-x-0 group-hover/outer:opacity-100 transition-all duration-700 ease-out bg-white/70 backdrop-blur-md rounded-full p-2 xs:p-3 shadow-md hover:bg-white hover:scale-110"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 xs:w-5 sm:w-6 h-4 xs:h-5 sm:h-6 text-gray-800">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/>
                </svg>
            </button>

            <!-- Right Arrow -->
            <button
                class="carousel-right-btn pointer-events-auto transform opacity-0 translate-x-6 xs:translate-x-8 group-hover/outer:translate-x-0 group-hover/outer:opacity-100 transition-all duration-700 ease-out bg-white/70 backdrop-blur-md rounded-full p-2 xs:p-3 shadow-md hover:bg-white hover:scale-110"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 xs:w-5 sm:w-6 h-4 xs:h-5 sm:h-6 text-gray-800">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                </svg>
            </button>
        </div>
    </div>
    @else
    <div class="text-center py-8">
        <div class="text-gray-400 text-sm">
            <svg class="w-12 h-12 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 15c-2.34 0-4.29-1.009-5.824-2.709M15 6.291A7.962 7.962 0 0012 5c-2.34 0-4.29 1.009-5.824 2.709"></path>
            </svg>
            <p>No products available.</p>
        </div>
    </div>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Clean Products Carousel Implementation
    class ProductsCarousel {
        constructor(element) {
            this.element = element;
            this.container = element.querySelector('.products-container');
            this.leftBtn = element.querySelector('.carousel-left-btn');
            this.rightBtn = element.querySelector('.carousel-right-btn');
            this.products = JSON.parse(element.dataset.products || '[]');
            this.currentIndex = 0;
            this.isAnimating = false;
            this.autoPlayInterval = null;
            this.speed = 0.5;
            
            this.init();
        }

        init() {
            if (this.products.length === 0) return;
            
            this.setSpeedByScreen();
            this.bindEvents();
            this.startAutoPlay();
            
            // Handle window resize
            window.addEventListener('resize', () => {
                this.setSpeedByScreen();
            });
        }

        setSpeedByScreen() {
            const width = window.innerWidth;
            if (width < 640) this.speed = 0.2;
            else if (width < 1024) this.speed = 0.4;
            else this.speed = 0.7;
        }

        bindEvents() {
            // Navigation buttons
            this.leftBtn?.addEventListener('click', () => this.slideLeft());
            this.rightBtn?.addEventListener('click', () => this.slideRight());
            
            // Pause on hover
            this.element.addEventListener('mouseenter', () => this.pause());
            this.element.addEventListener('mouseleave', () => this.play());
            
            // Touch/swipe support
            this.addTouchSupport();
        }

        addTouchSupport() {
            let startX = 0;
            let startY = 0;
            let isScrolling = false;

            this.element.addEventListener('touchstart', (e) => {
                startX = e.touches[0].clientX;
                startY = e.touches[0].clientY;
                isScrolling = false;
            });

            this.element.addEventListener('touchmove', (e) => {
                if (!startX || !startY) return;
                
                const diffX = Math.abs(e.touches[0].clientX - startX);
                const diffY = Math.abs(e.touches[0].clientY - startY);
                
                if (diffY > diffX) {
                    isScrolling = true;
                    return;
                }
                
                if (diffX > 10) {
                    e.preventDefault();
                }
            });

            this.element.addEventListener('touchend', (e) => {
                if (!startX || !startY || isScrolling) return;
                
                const endX = e.changedTouches[0].clientX;
                const diffX = startX - endX;
                
                if (Math.abs(diffX) > 50) {
                    if (diffX > 0) {
                        this.slideRight();
                    } else {
                        this.slideLeft();
                    }
                }
                
                startX = 0;
                startY = 0;
            });
        }

        startAutoPlay() {
            this.autoPlayInterval = setInterval(() => {
                this.moveCarousel();
            }, 10);
        }

        moveCarousel() {
            if (!this.container) return;
            
            const currentTransform = this.container.style.transform;
            const currentTranslateX = currentTransform ? 
                parseFloat(currentTransform.match(/-?\d+\.?\d*/)[0]) || 0 : 0;
            
            const newTranslateX = currentTranslateX + this.speed;
            const cardWidth = this.getCardWidth();
            const totalWidth = cardWidth * this.products.length;
            
            if (newTranslateX >= totalWidth) {
                this.container.style.transform = 'translateX(0px)';
            } else {
                this.container.style.transform = `translateX(-${newTranslateX}px)`;
            }
        }

        getCardWidth() {
            const width = window.innerWidth;
            let cardWidth = 256; // Default w-64
            
            if (width < 640) cardWidth = 192; // w-48
            else if (width < 768) cardWidth = 224; // w-56
            else if (width < 1024) cardWidth = 240; // w-60
            else if (width < 1280) cardWidth = 256; // w-64
            else cardWidth = 288; // w-72
            
            // Add gap
            const gap = width < 640 ? 16 : width < 768 ? 24 : 32;
            return cardWidth + gap;
        }

        slideLeft() {
            if (this.isAnimating) return;
            this.isAnimating = true;
            
            this.pause();
            const cardWidth = this.getCardWidth();
            const currentTransform = this.container.style.transform;
            const currentTranslateX = currentTransform ? 
                parseFloat(currentTransform.match(/-?\d+\.?\d*/)[0]) || 0 : 0;
            
            const newTranslateX = currentTranslateX - cardWidth;
            const totalWidth = cardWidth * this.products.length;
            
            if (newTranslateX < 0) {
                this.container.style.transform = `translateX(-${totalWidth - cardWidth}px)`;
            } else {
                this.container.style.transform = `translateX(-${newTranslateX}px)`;
            }
            
            setTimeout(() => {
                this.isAnimating = false;
                this.play();
            }, 300);
        }

        slideRight() {
            if (this.isAnimating) return;
            this.isAnimating = true;
            
            this.pause();
            const cardWidth = this.getCardWidth();
            const currentTransform = this.container.style.transform;
            const currentTranslateX = currentTransform ? 
                parseFloat(currentTransform.match(/-?\d+\.?\d*/)[0]) || 0 : 0;
            
            const newTranslateX = currentTranslateX + cardWidth;
            const totalWidth = cardWidth * this.products.length;
            
            if (newTranslateX >= totalWidth) {
                this.container.style.transform = 'translateX(0px)';
            } else {
                this.container.style.transform = `translateX(-${newTranslateX}px)`;
            }
            
            setTimeout(() => {
                this.isAnimating = false;
                this.play();
            }, 300);
        }

        pause() {
            if (this.autoPlayInterval) {
                clearInterval(this.autoPlayInterval);
                this.autoPlayInterval = null;
            }
        }

        play() {
            if (!this.autoPlayInterval) {
                this.startAutoPlay();
            }
        }
    }

    // Initialize all product carousels
    const carouselElements = document.querySelectorAll('.products-carousel');
    carouselElements.forEach(element => {
        new ProductsCarousel(element);
    });
});
</script>
