<div class="space-y-4 xs:space-y-5 sm:space-y-6 pb-12 xs:pb-14 sm:pb-16 px-3 xs:px-4 sm:px-6" x-data="faqSection">
    <h1 class="w-full text-center font-roboto-slab text-lg xs:text-xl sm:text-2xl md:text-3xl font-semibold px-2">
        Frequently Asked Questions.
    </h1>

    <div class="max-w-xs xs:max-w-sm sm:max-w-2xl md:max-w-4xl lg:max-w-6xl xl:max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 xs:gap-8 sm:gap-10 md:gap-12 text-xs xs:text-sm text-gray-600 py-4 xs:py-5 sm:py-6">
        <!-- Left Column -->
        <div class="flex flex-col justify-center items-center">
            <div class="w-full max-w-sm divide-y divide-gray-200 bg-white rounded-xl">
                <template x-for="(item, index) in faqs.slice(0, 4)" :key="index">
                    <div class="py-3 xs:py-4 w-full">
                        <button
                            @click="toggle(index)"
                            class="w-full flex items-center justify-between text-left gap-3 xs:gap-4 sm:gap-5 group px-2"
                        >
                            <div class="flex items-center gap-x-2 text-gray-800 font-medium w-full">
                                <span x-text="item.q" class="block truncate text-xs xs:text-sm"></span>
                            </div>

                            <!-- Arrow -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor"
                                 class="w-3 xs:w-4 h-3 xs:h-4 text-gray-600 transform transition-transform duration-300 flex-shrink-0"
                                 :class="{ 'rotate-180': active === index }">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                            </svg>
                        </button>

                        <!-- Answer -->
                        <div
                            x-show="active === index"
                            x-transition:enter="transition ease-out duration-400"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-2"
                            class="mt-2 xs:mt-3 text-gray-600 text-xs xs:text-sm leading-relaxed w-full px-2"
                            x-text="item.a">
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- Middle Column -->
        <div class="flex flex-col justify-center items-center">
            <div class="w-full max-w-sm divide-y divide-gray-200 bg-white rounded-xl">
                <template x-for="(item, index) in faqs.slice(4, 8)" :key="index">
                    <div class="py-3 xs:py-4 w-full">
                        <button
                            @click="toggle(index + 4)"
                            class="w-full flex items-center justify-between text-left gap-3 xs:gap-4 sm:gap-5 group px-2"
                        >
                            <div class="flex items-center gap-x-2 text-gray-800 font-medium w-full">
                                <span x-text="item.q" class="block truncate text-xs xs:text-sm"></span>
                            </div>

                            <!-- Arrow -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor"
                                 class="w-3 xs:w-4 h-3 xs:h-4 text-gray-600 transform transition-transform duration-300 flex-shrink-0"
                                 :class="{ 'rotate-180': active === index + 4 }">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                            </svg>
                        </button>

                        <!-- Answer -->
                        <div
                            x-show="active === index + 4"
                            x-transition:enter="transition ease-out duration-400"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-2"
                            class="mt-2 xs:mt-3 text-gray-600 text-xs xs:text-sm leading-relaxed w-full px-2"
                            x-text="item.a">
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- Right Column -->
        <div class="text-xs xs:text-sm text-gray-600 leading-relaxed px-2">
            <p class="mb-2 xs:mb-3">
                At DestroSolutions, we provide expert consulting and engineering services to support OEMs and Tier-1 suppliers in delivering secure, compliant, and future-ready vehicle platforms.
            </p>

            <ul class="space-y-1 xs:space-y-2">
                <li class="flex items-start gap-1 xs:gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 xs:w-4 h-3 xs:h-4 mt-0.5 text-gray-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75" />
                    </svg>
                    <span class="text-xs xs:text-sm">Cybersecurity Management Systems</span>
                </li>

                <li class="flex items-start gap-1 xs:gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 xs:w-4 h-3 xs:h-4 mt-0.5 text-gray-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75" />
                    </svg>
                    <span class="text-xs xs:text-sm">Functional Safety</span>
                </li>

                <li class="flex items-start gap-1 xs:gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 xs:w-4 h-3 xs:h-4 mt-0.5 text-gray-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75" />
                    </svg>
                    <span class="text-xs xs:text-sm">Software Update Management Systems</span>
                </li>

                <li class="flex items-start gap-1 xs:gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 xs:w-4 h-3 xs:h-4 mt-0.5 text-gray-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75" />
                    </svg>
                    <span class="text-xs xs:text-sm">ASPICE (Automotive SPICE)</span>
                </li>

                <li class="flex items-start gap-1 xs:gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 xs:w-4 h-3 xs:h-4 mt-0.5 text-gray-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75" />
                    </svg>
                    <span class="text-xs xs:text-sm">Autosar</span>
                </li>
            </ul>
        </div>

    </div>
    <div class="w-full text-center mt-6 xs:mt-8">
        <button class="max-w-max mx-auto bg-black text-white px-3 xs:px-4 py-2 text-xs xs:text-sm hover:bg-gray-800 transition-colors duration-300 rounded-sm">More Information</button>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('faqSection', () => ({
            active: null,
            faqs: [
                { q: 'Can I ask for a full refund?', a: 'Yes, you can request a full refund within 14 days of purchase if you are not satisfied. Just contact our support team.' },
                { q: 'How long does shipping take?', a: 'Typically, shipping takes between 3–5 business days depending on your location and product availability.' },
                { q: 'Do you offer international delivery?', a: 'Yes! We ship worldwide. International shipping times may vary depending on customs and destination.' },
                { q: 'Is my payment information secure?', a: 'Absolutely. We use industry-standard SSL encryption to ensure all transactions are fully secure.' },
                { q: 'Do you provide technical consulting?', a: 'Yes, we offer expert consulting for vehicle platform engineering and cybersecurity.' },
                { q: 'Can you help with ASPICE compliance?', a: 'Yes, our team supports ASPICE assessments and process improvements for OEMs and Tier-1 suppliers.' },
                { q: 'Do you offer custom software integration?', a: 'We provide tailored integration and engineering services for automotive systems.' },
                { q: 'How can I contact support?', a: 'You can reach out via our contact form or email for any technical or project inquiries.' },
            ],
            toggle(index) {
                this.active = this.active === index ? null : index;
            }
        }));
    });
</script>
