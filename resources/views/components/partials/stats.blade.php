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
        duration: 2000, // 2 seconds
        start() {
            const startTime = performance.now();
            const animate = (currentTime) => {
                const progress = Math.min((currentTime - startTime) / this.duration, 1);
                this.count = Math.floor(progress * this.finalCount);
                if (progress < 1) requestAnimationFrame(animate);
            };
            requestAnimationFrame(animate);
        }
    }"
    x-init="start()"
    class="text-center w-full space-y-2 sm:space-y-3 md:space-y-4 {{ $border }}"
>
    <!-- Animated Count -->
    <div class="font-inter text-2xl sm:text-3xl md:text-4xl font-semibold">
        <span x-text="count"></span>+<span> {{ $text }}</span>
    </div>

    <!-- Tag -->
    <div class="w-4/5 sm:w-2/3 mx-auto text-gray-600 text-xs sm:text-sm">
        {{ $tag }}
    </div>
</div>
