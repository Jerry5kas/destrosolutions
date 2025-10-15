<div class="relative flex items-center justify-center w-full h-[35rem] my-20 overflow-hidden">
    <!-- Background dots -->
    <div class="absolute inset-0 z-0 flex flex-wrap justify-start items-start opacity-60">
        @for($i = 0; $i < 100000; $i++)
            <div class="w-0.5 h-0.5 rounded-full bg-gray-300 m-1"></div>
        @endfor
    </div>

{{--    <div--}}
{{--        x-data="infiniteCarousel({--}}
{{--        images: [--}}
{{--            '{{ asset('/images/prodtest1.jpg') }}',--}}
{{--            '{{ asset('/images/prodtest1.jpg') }}',--}}
{{--            '{{ asset('/images/prodtest1.jpg') }}',--}}
{{--            '{{ asset('/images/prodtest1.jpg') }}'--}}
{{--        ]--}}
{{--    })"--}}
{{--        x-init="start()"--}}
{{--        @mouseenter="pause()"--}}
{{--        @mouseleave="play()"--}}
{{--        class="relative w-full flex justify-center items-center my-20 overflow-hidden group"--}}
{{--    >--}}
{{--        <!-- Carousel Container -->--}}
{{--        <div class="relative w-[80%] overflow-hidden">--}}
{{--            <div--}}
{{--                class="flex gap-8 items-center transition-transform ease-linear"--}}
{{--                :style="`transform: translateX(-${translateX}px)`"--}}
{{--            >--}}
{{--                <template x-for="(img, index) in doubledImages" :key="index">--}}
{{--                    <div class="flex-shrink-0 relative group overflow-hidden">--}}
{{--                        <!-- Image -->--}}
{{--                        <img--}}
{{--                            :src="img"--}}
{{--                            alt="Product"--}}
{{--                            class="w-64 h-[26rem] object-cover shadow-lg transform transition-transform duration-700 ease-out group-hover:scale-105"--}}
{{--                        >--}}

{{--                        <!-- Overlay fade -->--}}
{{--                        <div--}}
{{--                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700 ease-out z-10">--}}
{{--                        </div>--}}

{{--                        <!-- Bottom gradient text reveal -->--}}
{{--                        <div--}}
{{--                            class="absolute bottom-0 w-full h-20 bg-gradient-to-b from-transparent to-black/70 text-white text-xs font-semibold flex justify-center items-center text-center translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-700 ease-out z-20">--}}
{{--                            Lorem ipsum dolor sit amet, consectetur.--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </template>--}}


{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- Gradient Edges -->--}}
{{--        <div class="absolute left-0 top-0 bottom-0 w-20 bg-gradient-to-r from-white to-transparent z-10"></div>--}}
{{--        <div class="absolute right-0 top-0 bottom-0 w-20 bg-gradient-to-l from-white to-transparent z-10"></div>--}}

{{--        <!-- Navigation Arrows -->--}}
{{--        <div--}}
{{--            class="absolute inset-0 flex items-center justify-between px-8 z-20 pointer-events-none transition-all duration-700 ease-out group"--}}
{{--        >--}}
{{--            <!-- Left Arrow -->--}}
{{--            <button--}}
{{--                @click="slideLeft()"--}}
{{--                class="pointer-events-auto transform opacity-0 -translate-x-8 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-700 ease-out bg-white/70 backdrop-blur-md rounded-full p-3 shadow-md hover:bg-white hover:scale-110"--}}
{{--            >--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"--}}
{{--                     stroke-width="2" stroke="currentColor" class="w-6 h-6 text-gray-800">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                          d="M15.75 19.5 8.25 12l7.5-7.5"/>--}}
{{--                </svg>--}}
{{--            </button>--}}

{{--            <!-- Right Arrow -->--}}
{{--            <button--}}
{{--                @click="slideRight()"--}}
{{--                class="pointer-events-auto transform opacity-0 translate-x-8 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-700 ease-out bg-white/70 backdrop-blur-md rounded-full p-3 shadow-md hover:bg-white hover:scale-110"--}}
{{--            >--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"--}}
{{--                     stroke-width="2" stroke="currentColor" class="w-6 h-6 text-gray-800">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                          d="m8.25 4.5 7.5 7.5-7.5 7.5"/>--}}
{{--                </svg>--}}
{{--            </button>--}}
{{--        </div>--}}

    <div
        x-data="infiniteCarousel({
        images: [
            '{{ asset('/images/prodtest1.jpg') }}',
            '{{ asset('/images/prodtest1.jpg') }}',
            '{{ asset('/images/prodtest1.jpg') }}',
            '{{ asset('/images/prodtest1.jpg') }}'
        ]
    })"
        x-init="start()"
        @mouseenter="pause()"
        @mouseleave="play()"
        class="relative w-full flex justify-center items-center my-20 overflow-hidden group/outer"
    >
        <!-- Carousel Container -->
        <div class="relative w-[80%] overflow-hidden">
            <div
                class="flex gap-8 items-center transition-transform ease-linear"
                :style="`transform: translateX(-${translateX}px)`"
            >
                <template x-for="(img, index) in doubledImages" :key="index">
                    <!-- Individual Card Group -->
                    <div class="flex-shrink-0 relative group overflow-hidden rounded-lg">
                        <!-- Image -->
                        <img
                            :src="img"
                            alt="Product"
                            class="w-64 h-[26rem] object-cover shadow-lg transform transition-transform duration-700 ease-out group-hover:scale-105"
                        >

                        <!-- Overlay fade -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700 ease-out z-10">
                        </div>

                        <!-- Bottom gradient text reveal -->
                        <div
                            class="absolute bottom-0 w-full h-20 bg-gradient-to-b from-transparent to-black/70 text-white text-xs font-semibold flex justify-center items-center text-center translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-700 ease-out z-20">
                            Lorem ipsum dolor sit amet, consectetur.
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- Gradient Edges -->
        <div class="absolute left-0 top-0 bottom-0 w-20 bg-gradient-to-r from-white to-transparent z-10"></div>
        <div class="absolute right-0 top-0 bottom-0 w-20 bg-gradient-to-l from-white to-transparent z-10"></div>

        <!-- Navigation Arrows -->
        <div
            class="absolute inset-0 flex items-center justify-between px-8 z-20 pointer-events-none transition-all duration-700 ease-out group-hover/outer:px-16"
        >
            <!-- Left Arrow -->
            <button
                @click="slideLeft()"
                class="pointer-events-auto transform opacity-0 -translate-x-8 group-hover/outer:translate-x-0 group-hover/outer:opacity-100 transition-all duration-700 ease-out bg-white/70 backdrop-blur-md rounded-full p-3 shadow-md hover:bg-white hover:scale-110"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="2" stroke="currentColor" class="w-6 h-6 text-gray-800">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15.75 19.5 8.25 12l7.5-7.5"/>
                </svg>
            </button>

            <!-- Right Arrow -->
            <button
                @click="slideRight()"
                class="pointer-events-auto transform opacity-0 translate-x-8 group-hover/outer:translate-x-0 group-hover/outer:opacity-100 transition-all duration-700 ease-out bg-white/70 backdrop-blur-md rounded-full p-3 shadow-md hover:bg-white hover:scale-110"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="2" stroke="currentColor" class="w-6 h-6 text-gray-800">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                </svg>
            </button>
        </div>
    </div>



    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('infiniteCarousel', (config) => ({
                images: config.images || [],
                doubledImages: [],
                translateX: 0,
                step: 0.5,
                interval: null,

                start() {
                    this.doubledImages = [...this.images, ...this.images];
                    this.setSpeedByScreen();
                    this.run();
                    window.addEventListener('resize', () => this.setSpeedByScreen());
                },

                setSpeedByScreen() {
                    const width = window.innerWidth;
                    if (width < 640) this.step = 0.2;
                    else if (width < 1024) this.step = 0.4;
                    else this.step = 0.7;
                },

                run() {
                    this.interval = setInterval(() => {
                        this.translateX += this.step;

                        const imageWidth = 256 + 32; // w-64 (256px) + gap (32px total)
                        const totalWidth = imageWidth * this.images.length;

                        if (this.translateX >= totalWidth) {
                            this.translateX = 0;
                        }
                    }, 10);
                },

                pause() {
                    clearInterval(this.interval);
                    this.interval = null;
                },

                play() {
                    if (!this.interval) this.run();
                },

                slideLeft() {
                    this.pause();
                    const imageWidth = 256 + 32;
                    this.translateX -= imageWidth;
                    if (this.translateX < 0) {
                        const totalWidth = imageWidth * this.images.length;
                        this.translateX = totalWidth - imageWidth;
                    }
                    this.play();
                },

                slideRight() {
                    this.pause();
                    const imageWidth = 256 + 32;
                    const totalWidth = imageWidth * this.images.length;
                    this.translateX += imageWidth;
                    if (this.translateX >= totalWidth) {
                        this.translateX = 0;
                    }
                    this.play();
                },
            }));
        });
    </script>
</div>
