@php
    // Get FAQs from the controller or use default data as fallback
    $faqs = $faqs ?? collect();
    $faqs = $faqs->where('is_active', true)->take(8);
    
    // Default FAQs if no data available
    if ($faqs->isEmpty()) {
        $faqs = collect([
            (object)['question' => 'Can I ask for a full refund?', 'answer' => 'Yes, you can request a full refund within 14 days of purchase if you are not satisfied. Just contact our support team.'],
            (object)['question' => 'How long does shipping take?', 'answer' => 'Typically, shipping takes between 3–5 business days depending on your location and product availability.'],
            (object)['question' => 'Do you offer international delivery?', 'answer' => 'Yes! We ship worldwide. International shipping times may vary depending on customs and destination.'],
            (object)['question' => 'Is my payment information secure?', 'answer' => 'Absolutely. We use industry-standard SSL encryption to ensure all transactions are fully secure.'],
            (object)['question' => 'Do you provide technical consulting?', 'answer' => 'Yes, we offer expert consulting for vehicle platform engineering and cybersecurity.'],
            (object)['question' => 'Can you help with ASPICE compliance?', 'answer' => 'Yes, our team supports ASPICE assessments and process improvements for OEMs and Tier-1 suppliers.'],
            (object)['question' => 'Do you offer custom software integration?', 'answer' => 'We provide tailored integration and engineering services for automotive systems.'],
            (object)['question' => 'How can I contact support?', 'answer' => 'You can reach out via our contact form or email for any technical or project inquiries.']
        ]);
    }
@endphp

<div class="space-y-4 xs:space-y-5 sm:space-y-6 pb-12 xs:pb-14 sm:pb-16 px-3 xs:px-4 sm:px-6" data-reveal-scope data-reveal>
    <h1 data-reveal class="reveal-delay-0 w-full text-center font-roboto-slab text-lg xs:text-xl sm:text-2xl md:text-3xl font-semibold px-2 text-slate-600">
        Frequently Asked Questions.
    </h1>

    <div class="max-w-xs xs:max-w-sm sm:max-w-2xl md:max-w-4xl lg:max-w-6xl xl:max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 xs:gap-8 sm:gap-10 md:gap-12 text-xs xs:text-sm text-gray-600 py-4 xs:py-5 sm:py-6" data-reveal>
        <!-- Left Column -->
        <div class="flex flex-col justify-center items-center" data-reveal class="reveal-delay-1">
            <div class="w-full max-w-sm divide-y divide-gray-200 bg-white rounded-xl">
                @foreach($faqs->take(4) as $index => $faq)
                    <div class="py-3 xs:py-4 w-full">
                        <button
                            class="faq-button w-full flex items-center justify-between text-left gap-3 xs:gap-4 sm:gap-5 group px-2"
                            data-faq-index="{{ $index }}"
                        >
                            <div class="flex items-center gap-x-2 text-gray-800 font-medium w-full">
                                <span class="block truncate text-xs xs:text-sm">{{ $faq->question }}</span>
                            </div>

                            <!-- Arrow -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor"
                                 class="faq-arrow w-3 xs:w-4 h-3 xs:h-4 text-gray-600 transform transition-transform duration-300 flex-shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                            </svg>
                        </button>

                        <!-- Answer -->
                        <div class="faq-answer mt-2 xs:mt-3 text-gray-600 text-xs xs:text-sm leading-relaxed w-full px-2 hidden">
                            {{ $faq->answer }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Middle Column -->
        <div class="flex flex-col justify-center items-center" data-reveal class="reveal-delay-2">
            <div class="w-full max-w-sm divide-y divide-gray-200 bg-white rounded-xl">
                @foreach($faqs->slice(4, 4) as $index => $faq)
                    <div class="py-3 xs:py-4 w-full">
                        <button
                            class="faq-button w-full flex items-center justify-between text-left gap-3 xs:gap-4 sm:gap-5 group px-2"
                            data-faq-index="{{ $index + 4 }}"
                        >
                            <div class="flex items-center gap-x-2 text-gray-800 font-medium w-full">
                                <span class="block truncate text-xs xs:text-sm">{{ $faq->question }}</span>
                            </div>

                            <!-- Arrow -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor"
                                 class="faq-arrow w-3 xs:w-4 h-3 xs:h-4 text-gray-600 transform transition-transform duration-300 flex-shrink-0">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                            </svg>
                        </button>

                        <!-- Answer -->
                        <div class="faq-answer mt-2 xs:mt-3 text-gray-600 text-xs xs:text-sm leading-relaxed w-full px-2 hidden">
                            {{ $faq->answer }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Right Column -->
        <div class="text-xs xs:text-sm text-gray-600 leading-relaxed px-2" data-reveal class="reveal-delay-3">
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
        <button class="max-w-max mx-auto bg-blue-700 text-white px-3 xs:px-4 py-4 text-xs xs:text-smd hover:bg-blue-600 transition-colors duration-300 rounded-sm">More Information</button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Clean FAQ Implementation
    class FAQManager {
        constructor() {
            this.activeIndex = null;
            this.leaveDelayMs = 480;
            this.faqButtons = document.querySelectorAll('.faq-button');
            this.faqAnswers = document.querySelectorAll('.faq-answer');
            this.faqArrows = document.querySelectorAll('.faq-arrow');
            
            this.init();
        }

        init() {
            this.bindEvents();
        }

        bindEvents() {
            this.faqButtons.forEach((button, index) => {
                button.addEventListener('click', () => {
                    this.toggleFAQ(index);
                });
            });
        }

        toggleFAQ(index) {
            if (this.activeIndex === index) {
                this.closeFAQ(index);
                this.activeIndex = null;
                return;
            }

            if (this.activeIndex !== null) {
                this.closeFAQ(this.activeIndex);
                this.activeIndex = null;
                setTimeout(() => {
                    this.openFAQ(index);
                    this.activeIndex = index;
                }, this.leaveDelayMs);
            } else {
                this.openFAQ(index);
                this.activeIndex = index;
            }
        }

        openFAQ(index) {
            const answer = this.faqAnswers[index];
            const arrow = this.faqArrows[index];
            
            if (answer && arrow) {
                answer.classList.remove('hidden');
                answer.style.opacity = '0';
                answer.style.transform = 'translateY(-10px)';
                
                arrow.style.transform = 'rotate(180deg)';
                
                // Animate in
                requestAnimationFrame(() => {
                    answer.style.transition = 'opacity 0.5s ease-out, transform 0.5s ease-out';
                    answer.style.opacity = '1';
                    answer.style.transform = 'translateY(0)';
                });
            }
        }

        closeFAQ(index) {
            const answer = this.faqAnswers[index];
            const arrow = this.faqArrows[index];
            
            if (answer && arrow) {
                answer.style.transition = 'opacity 0.45s ease-in, transform 0.45s ease-in';
                answer.style.opacity = '0';
                answer.style.transform = 'translateY(-10px)';
                
                arrow.style.transform = 'rotate(0deg)';
                
                setTimeout(() => {
                    answer.classList.add('hidden');
                }, 450);
            }
        }
    }

    // Initialize FAQ manager
    new FAQManager();
});
</script>