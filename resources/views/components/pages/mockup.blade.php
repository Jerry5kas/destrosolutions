@props(['galleries' => []])

{{--
    Gallery Mockup Component
    
    This component displays a dynamic image gallery with infinite scroll animation
    and lightbox functionality. It integrates with the Gallery model to fetch
    active galleries ordered by sort_order.
    
    Usage:
    <x-pages.mockup :galleries="$galleries" />
    
    The component expects $galleries variable to be passed from the controller:
    $galleries = Gallery::active()->ordered()->get();
    
    Features:
    - Infinite scroll animation
    - Lightbox with navigation
    - Touch/swipe support for mobile
    - Keyboard navigation
    - Error handling with fallback images
    - Responsive design
--}}
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

<div class="gallery-container w-full max-w-6xl mx-auto overflow-hidden relative pt-8 sm:pt-12">
    <!-- Gallery Row -->
    <div class="flex gap-2 sm:gap-4 animate-scroll" id="gallery-slider">
        <!-- Images will be populated by JavaScript -->
    </div>

    <!-- Lightbox Overlay -->
    <div id="lightbox-overlay" class="lightbox-overlay fixed inset-0 bg-black/90 flex items-center justify-center z-50 lightbox-touch hidden">
        <div class="relative w-full max-w-4xl mx-4">
            <!-- Navigation buttons - hidden on mobile, shown on desktop -->
            <button id="prev-btn" class="hidden sm:block absolute left-2 sm:left-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 p-2 sm:p-3 rounded-full text-white text-lg sm:text-xl z-10">
                ◀
            </button>
            <button id="next-btn" class="hidden sm:block absolute right-2 sm:right-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 p-2 sm:p-3 rounded-full text-white text-lg sm:text-xl z-10">
                ▶
            </button>

            <!-- Main image -->
            <img id="lightbox-image" src="" class="w-full max-h-[85vh] sm:max-h-[80vh] object-contain rounded-lg shadow-2xl">

            <!-- Close button -->
            <button id="close-lightbox" class="absolute top-2 sm:top-4 right-2 sm:right-4 bg-gray-100/40 hover:bg-gray-100 text-black p-2 sm:p-3 rounded-full text-lg sm:text-xl font-semibold z-10">
                ✕
            </button>

            <!-- Mobile navigation dots -->
            <div id="mobile-dots" class="sm:hidden flex justify-center mt-4 space-x-2">
                <!-- Dots will be populated by JavaScript -->
            </div>

            <!-- Image counter for mobile -->
            <div class="sm:hidden absolute bottom-4 left-1/2 -translate-x-1/2 bg-black/50 text-white px-3 py-1 rounded-full text-sm">
                <span id="current-index">1</span> / <span id="total-images">1</span>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Initializing Gallery System');
    
    // Gallery data from Laravel props
    const galleryData = @json($galleries);
    const images = [];
    
    // Process gallery data to extract images
    if (galleryData && galleryData.length > 0) {
        galleryData.forEach(gallery => {
            if (gallery.images && Array.isArray(gallery.images)) {
                gallery.images.forEach(image => {
                    if (image && typeof image === 'string') {
                        // Handle both relative and absolute URLs
                        let imageUrl = image;
                        if (!image.startsWith('http') && !image.startsWith('/')) {
                            imageUrl = '/storage/' + image;
                        } else if (image.startsWith('/')) {
                            imageUrl = window.location.origin + image;
                        }
                        images.push(imageUrl);
                    }
                });
            }
        });
    }
    
    // Fallback images if no gallery data
    if (images.length === 0) {
        images.push(
            "https://picsum.photos/id/1015/600/400",
            "https://picsum.photos/id/1025/600/400",
            "https://picsum.photos/id/1035/600/400",
            "https://picsum.photos/id/1045/600/400",
            "https://picsum.photos/id/1055/600/400",
            "https://picsum.photos/id/1065/600/400"
        );
    }
    
    let currentIndex = 0;
    let touchStartX = 0;
    let touchStartY = 0;
    let touchEndX = 0;
    let touchEndY = 0;
    
    // DOM elements
    const slider = document.getElementById('gallery-slider');
    const lightboxOverlay = document.getElementById('lightbox-overlay');
    const lightboxImage = document.getElementById('lightbox-image');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const closeBtn = document.getElementById('close-lightbox');
    const mobileDots = document.getElementById('mobile-dots');
    const currentIndexSpan = document.getElementById('current-index');
    const totalImagesSpan = document.getElementById('total-images');
    
    // Initialize gallery
    function initGallery() {
        console.log('Setting up gallery with', images.length, 'images');
        
        // Populate slider with images (duplicate for seamless loop)
        slider.innerHTML = '';
        [...images, ...images].forEach((img, index) => {
            const div = document.createElement('div');
            div.className = 'w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/5 flex-shrink-0 cursor-pointer';
            
            const imgElement = document.createElement('img');
            imgElement.className = 'w-full h-32 sm:h-40 md:h-48 lg:h-56 object-cover rounded-lg shadow-lg hover:opacity-80 transition-all duration-300';
            imgElement.src = img;
            imgElement.alt = `Gallery Image ${(index % images.length) + 1}`;
            
            // Add error handling for broken images
            imgElement.onerror = function() {
                console.warn('Failed to load image:', img);
                this.src = 'https://picsum.photos/600/400?random=' + (index % images.length + 1);
            };
            
            div.appendChild(imgElement);
            div.addEventListener('click', () => openLightbox(index % images.length));
            slider.appendChild(div);
        });
        
        // Populate mobile dots
        mobileDots.innerHTML = '';
        images.forEach((img, index) => {
            const dot = document.createElement('button');
            dot.className = 'w-2 h-2 rounded-full transition-all duration-300 bg-white/40';
            dot.addEventListener('click', () => setCurrentIndex(index));
            mobileDots.appendChild(dot);
        });
        
        // Update total images counter
        totalImagesSpan.textContent = images.length;
        
        // Add event listeners
        prevBtn.addEventListener('click', prevImage);
        nextBtn.addEventListener('click', nextImage);
        closeBtn.addEventListener('click', closeLightbox);
        
        // Close lightbox when clicking overlay
        lightboxOverlay.addEventListener('click', function(e) {
            if (e.target === lightboxOverlay) {
                closeLightbox();
            }
        });
        
        // Touch events
        lightboxOverlay.addEventListener('touchstart', handleTouchStart);
        lightboxOverlay.addEventListener('touchend', handleTouchEnd);
        
        // Keyboard navigation
        document.addEventListener('keydown', handleKeydown);
        
        console.log('Gallery initialized successfully');
    }
    
    // Open lightbox
    function openLightbox(index) {
        console.log('Opening lightbox for image', index);
        currentIndex = index;
        lightboxImage.src = images[currentIndex];
        lightboxImage.alt = `Gallery Image ${currentIndex + 1}`;
        
        // Add error handling for lightbox image
        lightboxImage.onerror = function() {
            console.warn('Failed to load lightbox image:', images[currentIndex]);
            this.src = 'https://picsum.photos/600/400?random=' + (currentIndex + 1);
        };
        
        lightboxOverlay.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        updateMobileDots();
        updateCounter();
    }
    
    // Close lightbox
    function closeLightbox() {
        console.log('Closing lightbox');
        lightboxOverlay.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
    
    // Next image
    function nextImage() {
        currentIndex = (currentIndex + 1) % images.length;
        lightboxImage.src = images[currentIndex];
        lightboxImage.alt = `Gallery Image ${currentIndex + 1}`;
        updateMobileDots();
        updateCounter();
    }
    
    // Previous image
    function prevImage() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        lightboxImage.src = images[currentIndex];
        lightboxImage.alt = `Gallery Image ${currentIndex + 1}`;
        updateMobileDots();
        updateCounter();
    }
    
    // Set current index
    function setCurrentIndex(index) {
        currentIndex = index;
        lightboxImage.src = images[currentIndex];
        lightboxImage.alt = `Gallery Image ${currentIndex + 1}`;
        updateMobileDots();
        updateCounter();
    }
    
    // Update mobile dots
    function updateMobileDots() {
        const dots = mobileDots.querySelectorAll('button');
        dots.forEach((dot, index) => {
            if (index === currentIndex) {
                dot.className = 'w-2 h-2 rounded-full transition-all duration-300 bg-white';
            } else {
                dot.className = 'w-2 h-2 rounded-full transition-all duration-300 bg-white/40';
            }
        });
    }
    
    // Update counter
    function updateCounter() {
        currentIndexSpan.textContent = currentIndex + 1;
    }
    
    // Touch handling
    function handleTouchStart(event) {
        touchStartX = event.touches[0].clientX;
        touchStartY = event.touches[0].clientY;
    }
    
    function handleTouchEnd(event) {
        touchEndX = event.changedTouches[0].clientX;
        touchEndY = event.changedTouches[0].clientY;
        handleSwipe();
    }
    
    function handleSwipe() {
        const deltaX = touchEndX - touchStartX;
        const deltaY = touchEndY - touchStartY;
        const minSwipeDistance = 50;
        
        // Only process horizontal swipes
        if (Math.abs(deltaX) > Math.abs(deltaY) && Math.abs(deltaX) > minSwipeDistance) {
            if (deltaX > 0) {
                prevImage();
            } else {
                nextImage();
            }
        }
    }
    
    // Keyboard handling
    function handleKeydown(e) {
        if (!lightboxOverlay.classList.contains('hidden')) {
            if (e.key === 'ArrowLeft') {
                prevImage();
            } else if (e.key === 'ArrowRight') {
                nextImage();
            } else if (e.key === 'Escape') {
                closeLightbox();
            }
        }
    }
    
    // Initialize the gallery
    initGallery();
});
</script>

</div>
