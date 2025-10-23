@props([
    'border' => '',
    'count' => 0,
    'text' => '',
    'tag' => ''
])

<div
    class="text-center w-full space-y-1 xs:space-y-2 sm:space-y-3 md:space-y-4 {{ $border }}"
    data-reveal
    data-stats-counter
    data-final-count="{{ preg_replace('/[^0-9]/', '', $count) }}"
    data-suffix="{{ trim(preg_replace('/[0-9]/', '', $count)) }}"
>
    <!-- Animated Count -->
    <div class="font-inter text-lg xs:text-xl sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-semibold">
        <span class="text-white stats-count">0</span><span class="text-white stats-suffix">{{ trim(preg_replace('/[0-9]/', '', $count)) }}</span><span class="text-gray-200"> {{ $text }}</span>
    </div>

    <!-- Tag -->
    <div class="w-5/6 xs:w-4/5 sm:w-3/4 md:w-2/3 mx-auto text-gray-300 text-xs xs:text-sm sm:text-sm md:text-base leading-relaxed px-1">
        {{ $tag }}
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Clean counter animation implementation
    class CounterAnimation {
        constructor(element) {
            this.element = element;
            this.countElement = element.querySelector('.stats-count');
            this.suffixElement = element.querySelector('.stats-suffix');
            this.finalCount = parseInt(element.dataset.finalCount) || 0;
            this.suffix = element.dataset.suffix || '';
            this.duration = 3000; // 3 seconds
            this.hasAnimated = false;
            this.startTime = null;
            
            this.init();
        }

        init() {
            // Use Intersection Observer for better performance
            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting && !this.hasAnimated) {
                            this.start();
                            observer.disconnect();
                        }
                    });
                }, { 
                    threshold: 0.3,
                    rootMargin: '0px 0px -50px 0px'
                });
                
                observer.observe(this.element);
            } else {
                // Fallback for older browsers
                this.start();
            }
        }

        start() {
            if (this.hasAnimated) return;
            this.hasAnimated = true;
            this.startTime = performance.now();
            
            this.animate();
        }

        animate() {
            const currentTime = performance.now();
            const elapsed = currentTime - this.startTime;
            const progress = Math.min(elapsed / this.duration, 1);
            
            // Smooth easing function (ease-out cubic)
            const easedProgress = this.easeOutCubic(progress);
            const currentCount = Math.round(easedProgress * this.finalCount);
            
            // Update the display
            this.countElement.textContent = currentCount;
            
            // Continue animation if not complete
            if (progress < 1) {
                requestAnimationFrame(() => this.animate());
            } else {
                // Ensure final count is exact
                this.countElement.textContent = this.finalCount;
            }
        }

        easeOutCubic(t) {
            return 1 - Math.pow(1 - t, 3);
        }
    }

    // Initialize all counter animations
    const counterElements = document.querySelectorAll('[data-stats-counter]');
    counterElements.forEach(element => {
        new CounterAnimation(element);
    });
});
</script>
