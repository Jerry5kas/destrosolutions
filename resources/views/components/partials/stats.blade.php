@props([
    'border' => '',
    'count' => 0,
    'text' => '',
    'tag' => ''
])

<div
    x-data="{
        count: 0,
        finalCount: {{ preg_replace('/[^0-9]/', '', $count) }}, // extract only digits
        suffix: '{{ trim(preg_replace('/[0-9]/', '', $count)) }}',
        duration: 4500, // slower: 4.5 seconds
        easing(t) { // ease-out cubic for smooth deceleration
            t = Math.min(Math.max(t, 0), 1);
            return 1 - Math.pow(1 - t, 3);
        },
        hasAnimated: false,
        start() {
            if (this.hasAnimated) return;
            this.hasAnimated = true;
            const startTime = performance.now();
            const animate = (currentTime) => {
                const linear = Math.min((currentTime - startTime) / this.duration, 1);
                const eased = this.easing(linear);
                this.count = Math.round(eased * this.finalCount);
                if (linear < 1) requestAnimationFrame(animate);
            };
            requestAnimationFrame(animate);
        },
        init() {
            // Trigger animation when visible
            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            this.start();
                            observer.disconnect();
                        }
                    });
                }, { threshold: 0.3 });
                observer.observe(this.$el);
            } else {
                this.start();
            }
        }
    }"
    x-init="init()"
    class="text-center w-full space-y-1 xs:space-y-2 sm:space-y-3 md:space-y-4 {{ $border }}"
    data-reveal
>
    <!-- Animated Count -->
    <div class="font-inter text-lg xs:text-xl sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-semibold">
        <span class="text-white" x-text="count"></span><span  class="text-white" x-text="suffix"></span><span class="text-gray-200"> {{ $text }}</span>
    </div>

    <!-- Tag -->
    <div class="w-5/6 xs:w-4/5 sm:w-3/4 md:w-2/3 mx-auto text-gray-300 text-xs xs:text-sm sm:text-sm md:text-base leading-relaxed px-1">
        {{ $tag }}
    </div>
</div>
