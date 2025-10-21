<div
    class="relative flex items-center justify-center w-full h-auto pt-12 xs:pt-16 sm:pt-18 md:pt-20 overflow-hidden bg-gray-50">
    <!-- Background dots -->
    <div class="absolute inset-0 z-0 flex flex-wrap justify-start items-start opacity-30">
        @for($i = 0; $i < 50000; $i++)
            <div class="w-0.5 h-0.5 rounded-full bg-blue-300 m-1"></div>
        @endfor
    </div>

    <div class="w-full relative z-10">
        <div
            class="max-w-xs xs:max-w-sm sm:max-w-2xl md:max-w-4xl lg:max-w-6xl xl:max-w-7xl mx-auto px-3 xs:px-4 sm:px-6">
            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 xs:gap-10 sm:gap-12 md:gap-16 lg:gap-20">

                <!-- Left Content -->
                <div class="space-y-6 xs:space-y-8 sm:space-y-10">
                    <div class="flex justify-between flex-col sm:flex-row  sm:items-start items-start gap-6">
                        <!-- Contact Section -->
                        <div class="w/1/2 text-xs xs:text-sm text-gray-600 space-y-3 xs:space-y-4">
                            <h3 class="font-roboto-slab text-lg xs:text-xl sm:text-2xl md:text-3xl font-semibold text-black">
                                Contact</h3>
                            <div class="space-y-2 xs:space-y-3">
                                <a href="mailto:info@destrosolutions.com"
                                   class="block hover:text-blue-600 transition-colors duration-300">info@destrosolutions.com</a>
                                <a href="tel:+919398793452"
                                   class="block hover:text-blue-600 transition-colors duration-300">+91-93987 93452</a>
                                <a href="tel:+4915510142201"
                                   class="block hover:text-blue-600 transition-colors duration-300">+49-15510142201</a>
                            </div>
                        </div>

                        <!-- Quick Links Section -->
                        <div class="w/1/2 text-xs xs:text-sm text-gray-600 space-y-3 xs:space-y-4">
                            <h3 class="font-roboto-slab text-lg xs:text-xl sm:text-2xl md:text-3xl font-semibold text-black">
                                Quick Links</h3>
                            <div class="grid grid-cols-2 gap-4 xs:gap-6 sm:gap-8">
                                <div class="space-y-2 xs:space-y-3">
                                    <a href="/"
                                       class="block hover:text-blue-600 transition-colors duration-300">Home</a>
                                    <a href="/products"
                                       class="block hover:text-blue-600 transition-colors duration-300">Products</a>
                                    <a href="/services"
                                       class="block hover:text-blue-600 transition-colors duration-300">Services</a>
                                    <a href="/trainings"
                                       class="block hover:text-blue-600 transition-colors duration-300">Trainings</a>
                                </div>
                                <div class="space-y-2 xs:space-y-3">
                                    <a href="/sdv"
                                       class="block hover:text-blue-600 transition-colors duration-300">SDV</a>
                                    <a href="/blog" class="block hover:text-blue-600 transition-colors duration-300">Blog</a>
                                    <a href="/contact" class="block hover:text-blue-600 transition-colors duration-300">Contact
                                        US</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Locations Section -->
                    <div class="text-xs xs:text-sm text-gray-600 space-y-3 xs:space-y-4">
                        <h3 class="font-roboto-slab text-lg xs:text-xl sm:text-2xl md:text-3xl font-semibold text-black">
                            Our Locations</h3>
                        <div class="space-y-3 xs:space-y-4">
                            <div class="flex items-start space-x-2 xs:space-x-3">
                                <!-- India Flag -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 480"
                                     class="w-4 xs:w-5 h-4 xs:h-5 rounded-sm flex-shrink-0 mt-0.5">
                                    <path fill="#f93" d="M0 0h640v160H0z"/>
                                    <path fill="#fff" d="M0 160h640v160H0z"/>
                                    <path fill="#128807" d="M0 320h640v160H0z"/>
                                    <circle cx="320" cy="240" r="40" fill="#008"/>
                                    <circle cx="320" cy="240" r="37" fill="#fff"/>
                                    <circle cx="320" cy="240" r="4" fill="#008"/>
                                    <g id="wheel" fill="#008">
                                        <g id="spoke">
                                            <rect x="318" y="200" width="4" height="40"/>
                                            <rect x="318" y="240" width="4" height="40" transform="rotate(15 320 240)"/>
                                        </g>
                                        <use href="#spoke" transform="rotate(30 320 240)"/>
                                        <use href="#spoke" transform="rotate(60 320 240)"/>
                                        <use href="#spoke" transform="rotate(90 320 240)"/>
                                        <use href="#spoke" transform="rotate(120 320 240)"/>
                                        <use href="#spoke" transform="rotate(150 320 240)"/>
                                    </g>
                                </svg>
                                <span class="leading-relaxed">#649, Vasanth Nagar, KPHB, Hyderabad, Telangana, India 500082</span>
                            </div>

                            <div class="flex items-start space-x-2 xs:space-x-3">
                                <!-- Germany Flag -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 5 3"
                                     class="w-4 xs:w-5 h-4 xs:h-5 rounded-sm flex-shrink-0 mt-0.5">
                                    <path fill="#000" d="M0 0h5v1H0z"/>
                                    <path fill="#D00" d="M0 1h5v1H0z"/>
                                    <path fill="#FFCE00" d="M0 2h5v1H0z"/>
                                </svg>
                                <span class="leading-relaxed">Pfaffenwaldring, Stuttgart, Germany</span>
                            </div>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    {{--                    <div class="pt-2 xs:pt-4">--}}
                    {{--                        <a href="/contact" class="inline-flex items-center px-4 xs:px-6 py-2 xs:py-3 bg-black text-white text-xs xs:text-sm font-semibold hover:bg-gray-800 transition-colors duration-300 rounded-sm">--}}
                    {{--                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">--}}
                    {{--                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>--}}
                    {{--                            </svg>--}}
                    {{--                            Write us--}}
                    {{--                        </a>--}}
                    {{--                    </div>--}}
                </div>

                <!-- Map Section -->
                <div class="lg:mt-0">
                    <div class="h-48 xs:h-56 sm:h-64 md:h-72 lg:h-80 xl:h-96 rounded-lg overflow-hidden shadow-lg">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.451148211029!2d78.38610907509465!3d17.44991820206247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb93e3e98263cd%3A0x4a58efdfd95cfd7d!2sVasanth%20Nagar%2C%20KPHB%2C%20Hyderabad%2C%20Telangana%20500072!5e0!3m2!1sen!2sin!4v1697374914092!5m2!1sen!2sin"
                            width="100%"
                            height="100%"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            class="rounded-lg">
                        </iframe>
                    </div>
                </div>

            </div>
            <!-- Bottom Section -->
            <div class="border-t border-gray-200 mt-8 xs:mt-10 sm:mt-12 md:mt-16">
                <div
                    class="flex flex-col sm:flex-row justify-between items-center py-6 xs:py-8 sm:py-10 gap-4 xs:gap-6">
                    <!-- Copyright -->
                    <div class="text-xs xs:text-sm text-gray-500 text-center sm:text-left order-2 sm:order-1">
                        Copyright © 2025 All Right Reserved By Destro Solutions
                    </div>

                    <!-- Social Media Links -->
                    <div class="flex items-center gap-x-2 xs:gap-x-3 order-1 sm:order-2">
                        <!-- Facebook -->
                        <a href="https://facebook.com/destrosolutions" target="_blank" rel="noopener noreferrer"
                           class="p-2 xs:p-2.5 bg-blue-700 rounded-full transition-all duration-300 hover:bg-[#1877F2] hover:scale-110 group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24"
                                 class="w-3 xs:w-4 h-3 xs:h-4 group-hover:scale-110 transition-transform duration-300">
                                <path
                                    d="M22.675 0h-21.35C.6 0 0 .6 0 1.342v21.316C0 23.4.6 24 1.325 24H12.82v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.894-4.788 4.66-4.788 1.325 0 2.463.1 2.795.144v3.24l-1.919.001c-1.504 0-1.796.715-1.796 1.763v2.314h3.587l-.467 3.622h-3.12V24h6.116C23.4 24 24 23.4 24 22.658V1.342C24 .6 23.4 0 22.675 0z"/>
                            </svg>
                        </a>

                        <!-- Instagram -->
                        <a href="https://instagram.com/destrosolutions" target="_blank" rel="noopener noreferrer"
                           class="p-2 xs:p-2.5 bg-blue-700 rounded-full transition-all duration-300 hover:bg-gradient-to-tr hover:from-yellow-400 hover:via-pink-500 hover:to-purple-600 hover:scale-110 group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24"
                                 class="w-3 xs:w-4 h-3 xs:h-4 group-hover:scale-110 transition-transform duration-300">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.35 3.608 1.325.975.975 1.263 2.242 1.325 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.35 2.633-1.325 3.608-.975.975-2.242 1.263-3.608 1.325-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.35-3.608-1.325-.975-.975-1.263-2.242-1.325-3.608C2.175 15.747 2.163 15.367 2.163 12s.012-3.584.07-4.85c.062-1.366.35-2.633 1.325-3.608.975-.975 2.242-1.263 3.608-1.325C8.416 2.175 8.796 2.163 12 2.163zm0 1.838c-3.155 0-3.517.012-4.75.069-1.065.049-1.64.229-2.02.384-.507.196-.87.43-1.253.813-.383.383-.617.746-.813 1.253-.155.38-.335.955-.384 2.02-.057 1.233-.069 1.595-.069 4.75s.012 3.517.069 4.75c.049 1.065.229 1.64.384 2.02.196.507.43.87.813 1.253.383.383.746.617 1.253.813.38.155.955.335 2.02.384 1.233.057 1.595.069 4.75.069s3.517-.012 4.75-.069c1.065-.049 1.64-.229 2.02-.384.507-.196.87-.43 1.253-.813.383-.383.617-.746.813-1.253.155-.38.335-.955.384-2.02.057-1.233.069-1.595.069-4.75s-.012-3.517-.069-4.75c-.049-1.065-.229-1.64-.384-2.02a3.354 3.354 0 0 0-.813-1.253 3.354 3.354 0 0 0-1.253-.813c-.38-.155-.955-.335-2.02-.384-1.233-.057-1.595-.069-4.75-.069zM12 5.838a6.162 6.162 0 1 0 0 12.324A6.162 6.162 0 0 0 12 5.838zm0 10.162a3.999 3.999 0 1 1 0-7.998 3.999 3.999 0 0 1 0 7.998zm6.406-11.845a1.44 1.44 0 1 1-2.88 0 1.44 1.44 0 0 1 2.88 0z"/>
                            </svg>
                        </a>

                        <!-- LinkedIn -->
                        <a href="https://linkedin.com/company/destrosolutions" target="_blank" rel="noopener noreferrer"
                           class="p-2 xs:p-2.5 bg-blue-700 rounded-full transition-all duration-300 hover:bg-[#0A66C2] hover:scale-110 group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24"
                                 class="w-3 xs:w-4 h-3 xs:h-4 group-hover:scale-110 transition-transform duration-300">
                                <path
                                    d="M4.98 3.5C3.34 3.5 2 4.86 2 6.5s1.34 3 2.98 3 2.98-1.36 2.98-3S6.62 3.5 4.98 3.5zM2.4 8.99h5.16V21H2.4zM9.34 8.99h4.94v1.64h.07c.69-1.31 2.37-2.69 4.88-2.69 5.22 0 6.18 3.43 6.18 7.89V21h-5.15v-5.67c0-1.35-.02-3.09-1.89-3.09-1.89 0-2.18 1.48-2.18 3v5.76H9.34V8.99z"/>
                            </svg>
                        </a>

                        <!-- Twitter/X -->
                        <a href="https://twitter.com/destrosolutions" target="_blank" rel="noopener noreferrer"
                           class="p-2 xs:p-2.5 bg-blue-700 rounded-full transition-all duration-300 hover:bg-[#1DA1F2] hover:scale-110 group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24"
                                 class="w-3 xs:w-4 h-3 xs:h-4 group-hover:scale-110 transition-transform duration-300">
                                <path
                                    d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
