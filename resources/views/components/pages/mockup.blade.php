<style>
    /* Infinite scroll animation */
    @keyframes scroll {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%);
        }
    }

    .animate-scroll {
        animation: scroll 25s linear infinite;
    }

    /* Mobile responsive adjustments */
    @media (max-width: 768px) {
        .animate-scroll {
            animation: scroll 15s linear infinite;
        }
    }

    @media (max-width: 480px) {
        .animate-scroll {
            animation: scroll 10s linear infinite;
        }
    }

    /* Touch-friendly lightbox */
    .lightbox-touch {
        touch-action: pan-y;
    }

    /* Smooth transitions for mobile */
    @media (hover: none) {
        .hover-opacity:hover {
            opacity: 1;
        }
    }
</style>
<div class="text-white flex items-center justify-center px-4 sm:px-6 lg:px-8">

<div x-data="gallery()" x-init="init()" class="w-full max-w-6xl mx-auto overflow-hidden relative pt-8 sm:pt-12">
    <!-- Gallery Row -->
    <div class="flex gap-2 sm:gap-4 animate-scroll" x-ref="slider">
        <!-- Duplicate images twice for seamless looping -->
        <template x-for="(img, index) in images.concat(images)" :key="index">
            <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5 flex-shrink-0 cursor-pointer" @click="openLightbox(index % images.length)">
                <img :src="img" class="w-full h-32 sm:h-40 md:h-48 lg:h-56 object-cover rounded-lg shadow-lg hover:opacity-80 transition-all duration-300">
            </div>
        </template>
    </div>

    <!-- Lightbox Overlay -->
    <div x-show="lightboxOpen" x-transition
         class="fixed inset-0 bg-black/90 flex items-center justify-center z-50 lightbox-touch"
         @click="closeLightbox"
         @touchstart="handleTouchStart"
         @touchend="handleTouchEnd">
        <div class="relative w-full max-w-4xl mx-4" @click.stop>
            <!-- Navigation buttons - hidden on mobile, shown on desktop -->
            <button @click="prevImage"
                    class="hidden sm:block absolute left-2 sm:left-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 p-2 sm:p-3 rounded-full text-white text-lg sm:text-xl z-10">
                ◀
            </button>
            <button @click="nextImage"
                    class="hidden sm:block absolute right-2 sm:right-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 p-2 sm:p-3 rounded-full text-white text-lg sm:text-xl z-10">
                ▶
            </button>

            <!-- Main image -->
            <img :src="images[currentIndex]"
                 class="w-full max-h-[85vh] sm:max-h-[80vh] object-contain rounded-lg shadow-2xl">

            <!-- Close button -->
            <button @click="closeLightbox"
                    class="absolute top-2 sm:top-4 right-2 sm:right-4 bg-gray-100/40 hover:bg-gray-100 text-black p-2 sm:p-3 rounded-full text-lg sm:text-xl font-semibold z-10">
                ✕
            </button>

            <!-- Mobile navigation dots -->
            <div class="sm:hidden flex justify-center mt-4 space-x-2">
                <template x-for="(img, index) in images" :key="index">
                    <button @click="currentIndex = index"
                            :class="currentIndex === index ? 'bg-white' : 'bg-white/40'"
                            class="w-2 h-2 rounded-full transition-all duration-300"></button>
                </template>
            </div>

            <!-- Image counter for mobile -->
            <div class="sm:hidden absolute bottom-4 left-1/2 -translate-x-1/2 bg-black/50 text-white px-3 py-1 rounded-full text-sm">
                <span x-text="currentIndex + 1"></span> / <span x-text="images.length"></span>
            </div>
        </div>
    </div>
</div>

<script>
    function gallery() {
        return {
            images: [
                "https://picsum.photos/id/1015/600/400",
                "https://picsum.photos/id/1025/600/400",
                "https://picsum.photos/id/1035/600/400",
                "https://picsum.photos/id/1045/600/400",
                "https://picsum.photos/id/1055/600/400",
                "https://picsum.photos/id/1065/600/400",
            ],
            lightboxOpen: false,
            currentIndex: 0,
            touchStartX: 0,
            touchStartY: 0,
            touchEndX: 0,
            touchEndY: 0,

            openLightbox(index) {
                this.currentIndex = index;
                this.lightboxOpen = true;
                // Prevent body scroll when lightbox is open
                document.body.style.overflow = 'hidden';
            },

            closeLightbox() {
                this.lightboxOpen = false;
                // Restore body scroll
                document.body.style.overflow = 'auto';
            },

            nextImage() {
                this.currentIndex = (this.currentIndex + 1) % this.images.length;
            },

            prevImage() {
                this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
            },

            // Touch gesture handling for mobile navigation
            handleTouchStart(event) {
                this.touchStartX = event.touches[0].clientX;
                this.touchStartY = event.touches[0].clientY;
            },

            handleTouchEnd(event) {
                this.touchEndX = event.changedTouches[0].clientX;
                this.touchEndY = event.changedTouches[0].clientY;
                this.handleSwipe();
            },

            handleSwipe() {
                const deltaX = this.touchEndX - this.touchStartX;
                const deltaY = this.touchEndY - this.touchStartY;
                const minSwipeDistance = 50;

                // Only process horizontal swipes (ignore vertical scrolling)
                if (Math.abs(deltaX) > Math.abs(deltaY) && Math.abs(deltaX) > minSwipeDistance) {
                    if (deltaX > 0) {
                        // Swipe right - go to previous image
                        this.prevImage();
                    } else {
                        // Swipe left - go to next image
                        this.nextImage();
                    }
                }
            },

            // Keyboard navigation support
            init() {
                this.$nextTick(() => {
                    document.addEventListener('keydown', (e) => {
                        if (this.lightboxOpen) {
                            if (e.key === 'ArrowLeft') {
                                this.prevImage();
                            } else if (e.key === 'ArrowRight') {
                                this.nextImage();
                            } else if (e.key === 'Escape') {
                                this.closeLightbox();
                            }
                        }
                    });
                });
            }
        }
    }
</script>

</div>
