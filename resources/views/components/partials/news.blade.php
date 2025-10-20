<div class="w-full py-12 xs:py-16 sm:py-18 md:py-20 border-t border-b border-gray-300" data-reveal-scope data-reveal>
    <div class="max-w-xs xs:max-w-sm sm:max-w-2xl md:max-w-4xl lg:max-w-6xl xl:max-w-7xl mx-auto flex flex-col md:flex-row justify-center items-center gap-y-4 xs:gap-y-5 sm:gap-y-6 md:gap-x-5 px-3 xs:px-4 sm:px-6">
        <div class="w-full md:w-1/5 flex flex-col gap-y-2 xs:gap-y-3 text-center md:text-left">
            <div data-reveal class="reveal-delay-0 text-lg xs:text-xl sm:text-2xl md:text-3xl font-semibold font-roboto-slab px-2">
                What's on and Latest News.
            </div>
            <div data-reveal class="reveal-delay-1 underline underline-offset-2 text-gray-400 text-xs xs:text-sm">All events</div>
        </div>

        <div class="relative w-full sm:w-4/5 mx-auto group " data-reveal class="reveal-delay-2">
            <!-- Alpine Slider Logic -->
            <div
                x-data="{
            slides: [
                {
                    title: 'Lorem ipsum dolor sit.',
                    text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam asperiores, atque aut debitis earum enim esse eveniet facilis fuga ipsa laboriosam laborum minima minus modi nesciunt nihil omnis optio praesentium ratione rem repellendus, saepe sunt unde vero voluptate voluptatem voluptatibus.',
                    link: '#'
                },
                {
                    title: 'Innovate and accelerate.',
                    text: 'We believe in blending modern design with seamless technology to deliver impact and efficiency. Experience a new level of innovation through automation and data-driven intelligence.',
                    link: '#'
                },
                {
                    title: 'Empowering your business.',
                    text: 'DestroSolutions provides scalable, secure, and tailored digital solutions for enterprises, startups, and innovators worldwide. From concept to code, we build with purpose.',
                    link: '#'
                }
            ],
            current: 0,
            interval: null,
            next() {
                this.current = (this.current + 1) % this.slides.length;
            },
            prev() {
                this.current = (this.current - 1 + this.slides.length) % this.slides.length;
            },
            startAutoSlide() {
                this.interval = setInterval(() => this.next(), 7000);
            },
            stopAutoSlide() {
                clearInterval(this.interval);
            }
        }"
                x-init="startAutoSlide()"
                class="relative"
            >
                <!-- Slider Container -->
                <div class="overflow-hidden relative">
                    <div
                        class="flex transition-transform duration-[1500ms] ease-in-out"
                        :style="`transform: translateX(-${current * 100}%);`"
                    >
                        <template x-for="(slide, index) in slides" :key="index">
                            <div class="flex-shrink-0 w-full px-3 xs:px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16">
                                <div class="flex flex-col items-start justify-start space-y-3 xs:space-y-4 sm:space-y-5 py-4 xs:py-5 sm:py-6 md:py-8 lg:py-10">
                                    <div class="text-sm xs:text-base sm:text-lg md:text-xl lg:text-2xl font-roboto-slab font-semibold" x-text="slide.title"></div>
                                    <div class="text-xs xs:text-sm text-gray-600 leading-relaxed" x-text="slide.text"></div>
                                    <div>
                                        <a :href="slide.link" class="text-xs xs:text-sm underline underline-offset-4 text-gray-700 hover:text-gray-900 transition">Enter now</a>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Navigation Arrows -->
                <div class="absolute top-1/2 left-0 right-0 -translate-y-1/2 flex items-center justify-between px-1 xs:px-2 sm:px-0">
                    <!-- Left -->
                    <button
                        @click="prev()"
                        @mouseenter="stopAutoSlide()"
                        @mouseleave="startAutoSlide()"
                        class="bg-white/80 hover:bg-white rounded-full p-1.5 xs:p-2 shadow-md transition-all duration-500 hidden sm:flex items-center justify-center
                       opacity-0 -translate-x-4 xs:-translate-x-5 group-hover:opacity-100 group-hover:translate-x-0"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 xs:w-5 h-4 xs:h-5 text-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </button>

                    <!-- Right -->
                    <button
                        @click="next()"
                        @mouseenter="stopAutoSlide()"
                        @mouseleave="startAutoSlide()"
                        class="bg-white/80 hover:bg-white rounded-full p-1.5 xs:p-2 shadow-md transition-all duration-500 hidden sm:flex items-center justify-center
                       opacity-0 translate-x-4 xs:translate-x-5 group-hover:opacity-100 group-hover:translate-x-0"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 xs:w-5 h-4 xs:h-5 text-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                </div>

                <!-- Mobile Navigation -->
                <div class="flex sm:hidden justify-center gap-3 xs:gap-4 mt-3 xs:mt-4">
                    <button @click="prev()" class="bg-gray-200 p-1.5 xs:p-2 rounded-full hover:bg-gray-300 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3 xs:w-4 h-3 xs:h-4 text-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </button>
                    <button @click="next()" class="bg-gray-200 p-1.5 xs:p-2 rounded-full hover:bg-gray-300 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3 xs:w-4 h-3 xs:h-4 text-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>
