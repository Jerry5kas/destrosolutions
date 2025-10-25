<div class="border-b border-b-gray-300 mb-12 xs:mb-16 sm:mb-18 md:mb-20 pb-12 xs:pb-16 sm:pb-18 md:pb-20" data-reveal-scope>
    <div
        class="max-w-xs xs:max-w-sm sm:max-w-2xl md:max-w-4xl lg:max-w-6xl xl:max-w-7xl mx-auto w-full flex flex-col md:flex-row justify-between items-center gap-6 xs:gap-8 sm:gap-10 md:gap-12 lg:gap-16 px-3 xs:px-4 sm:px-6 md:px-8 lg:px-12 xl:px-16 py-6 xs:py-8 sm:py-10">
        <!-- Left Content -->
        <div class="flex-1 py-4 xs:py-6 sm:py-8 flex flex-col justify-center items-center gap-y-3 xs:gap-y-4 sm:gap-y-5 md:gap-y-6 text-center md:text-left" data-reveal>
            <h1 class="reveal-delay-0 font-roboto-slab font-semibold text-xl xs:text-2xl sm:text-3xl md:text-4xl text-gray-800" data-reveal>Connect with Us</h1>
            <span class="reveal-delay-1 w-8 xs:w-10 border-b-2  border-blue-700" data-reveal></span>
            <span
                class="reveal-delay-2 max-w-xs xs:max-w-sm sm:max-w-lg md:max-w-xl lg:max-w-2xl xl:max-w-3xl text-xs xs:text-sm sm:text-base md:text-lg lg:text-xl mx-auto md:mx-0 text-justify sm:text-center text-gray-400 leading-relaxed px-2" data-reveal>
                Ready to redefine your automotive and cybersecurity journey? We're here to help. Reach out to us for consultations, product inquiries, or partnership opportunities.
            </span>
        </div>

        <!-- Right Form -->
        <form id="contactForm" class="flex-1 flex flex-col gap-4 xs:gap-5 sm:gap-6 text-xs xs:text-sm" data-reveal>
            @csrf
            
            <div class="w-full flex flex-col md:flex-row items-center gap-4 xs:gap-5 sm:gap-6">
                <!-- Name -->
                <div class="relative w-full" data-reveal class="reveal-delay-0">
                    <input type="text" id="name" name="name" placeholder=" " required
                           class="peer w-full bg-white text-gray-800 p-2 xs:p-3 border-b border-gray-300 focus:outline-none focus:border-gray-600 transition-colors duration-300 text-xs xs:text-sm"/>
                    <label for="name"
                           class="absolute left-2 xs:left-3 top-2 xs:top-3 text-gray-400 text-xs xs:text-sm transition-all duration-300 peer-placeholder-shown:top-2 xs:peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-xs xs:peer-placeholder-shown:text-sm peer-focus:-top-2 xs:peer-focus:-top-3 peer-focus:text-gray-600 peer-focus:text-xs">Name</label>
                </div>

                <!-- Phone -->
                <div class="relative w-full" data-reveal class="reveal-delay-1">
                    <input type="tel" id="phone" name="phone" placeholder=" " required
                           class="peer w-full bg-white text-gray-800 p-2 xs:p-3 border-b border-gray-300 focus:outline-none focus:border-gray-600 transition-colors duration-300 text-xs xs:text-sm"/>
                    <label for="phone"
                           class="absolute left-2 xs:left-3 top-2 xs:top-3 text-gray-400 text-xs xs:text-sm transition-all duration-300 peer-placeholder-shown:top-2 xs:peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-xs xs:peer-placeholder-shown:text-sm peer-focus:-top-2 xs:peer-focus:-top-3 peer-focus:text-gray-600 peer-focus:text-xs">Phone</label>
                </div>
            </div>
            
            <!-- Email -->
            <div class="relative w-full" data-reveal class="reveal-delay-2">
                <input type="email" id="email" name="email" placeholder=" " required
                       class="peer w-full bg-white text-gray-800 p-2 xs:p-3 border-b border-gray-300 focus:outline-none focus:border-gray-600 transition-colors duration-300 text-xs xs:text-sm"/>
                <label for="email"
                       class="absolute left-2 xs:left-3 top-2 xs:top-3 text-gray-400 text-xs xs:text-sm transition-all duration-300 peer-placeholder-shown:top-2 xs:peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-xs xs:peer-placeholder-shown:text-sm peer-focus:-top-2 xs:peer-focus:-top-3 peer-focus:text-gray-600 peer-focus:text-xs">Email</label>
            </div>

            <!-- Message -->
            <div class="relative w-full" data-reveal class="reveal-delay-3">
                <textarea id="message" name="message" placeholder=" " rows="2" required
                          class="peer w-full bg-white text-gray-800 p-2 xs:p-3 border-b border-gray-300 focus:outline-none focus:border-gray-600 transition-colors duration-300 resize-none text-xs xs:text-sm"></textarea>
                <label for="message"
                       class="absolute left-2 xs:left-3 top-2 xs:top-3 text-gray-400 text-xs xs:text-sm transition-all duration-300 peer-placeholder-shown:top-2 xs:peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-xs xs:peer-placeholder-shown:text-sm peer-focus:-top-2 xs:peer-focus:-top-3 peer-focus:text-gray-600 peer-focus:text-xs">Message</label>
            </div>

            <!-- Button -->
            <button type="submit" id="submitBtn" data-reveal class="reveal-delay-4 bg-blue-700 py-2 xs:py-3 px-4 xs:px-5 sm:px-6 hover:bg-blue-500 text-white font-semibold rounded-md transition-colors duration-300 flex items-center justify-center gap-2 text-xs xs:text-sm disabled:opacity-50 disabled:cursor-not-allowed">
                <!-- Loading Spinner (hidden by default) -->
                <svg id="loadingSpinner" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                
                <!-- Paper Plane Icon -->
                <svg id="sendIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="icon icon-tabler icons-tabler-outline icon-tabler-brand-telegram xs:w-5 xs:h-5 sm:w-6 sm:h-6">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4"/>
                </svg>
                <span id="buttonText">Send</span>
            </button>
            
            <!-- Inline Message (hidden by default) -->
            <div id="inlineMessage" class="hidden text-xs text-blue-700 text-center mt-2 opacity-0 transform scale-95 transition-all duration-300 ease-out">
                <span id="messageText"></span>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    const submitBtn = document.getElementById('submitBtn');
    const loadingSpinner = document.getElementById('loadingSpinner');
    const sendIcon = document.getElementById('sendIcon');
    const buttonText = document.getElementById('buttonText');
    const inlineMessage = document.getElementById('inlineMessage');
    const messageText = document.getElementById('messageText');

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = new FormData(form);
        
        // Basic validation
        const name = form.querySelector('#name').value.trim();
        const phone = form.querySelector('#phone').value.trim();
        const email = form.querySelector('#email').value.trim();
        const message = form.querySelector('#message').value.trim();

        if (!name || !phone || !email || !message) {
            showMessage('Please fill in all required fields.', 'error');
            return;
        }

        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showMessage('Please enter a valid email address.', 'error');
            return;
        }

        // Phone validation
        const phoneRegex = /^\d{10,}$/;
        if (!phoneRegex.test(phone.replace(/\D/g, ''))) {
            showMessage('Please enter a valid phone number.', 'error');
            return;
        }

        // Set loading state
        setLoadingState(true);

        try {
            const response = await fetch('/contact', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                                   document.querySelector('input[name="_token"]')?.value
                }
            });

            const result = await response.json();

            if (result.success) {
                showMessage('Message sent successfully! Please wait, we will reach out to you within 24 hours.', 'success');
                form.reset();
            } else {
                showMessage(result.message || 'Something went wrong. Please try again.', 'error');
            }
        } catch (error) {
            console.error('Form submission error:', error);
            showMessage('Network error. Please check your connection and try again.', 'error');
        } finally {
            setLoadingState(false);
        }
    });

    function setLoadingState(isLoading) {
        if (isLoading) {
            submitBtn.disabled = true;
            loadingSpinner.classList.remove('hidden');
            sendIcon.classList.add('hidden');
            buttonText.textContent = 'Sending...';
        } else {
            submitBtn.disabled = false;
            loadingSpinner.classList.add('hidden');
            sendIcon.classList.remove('hidden');
            buttonText.textContent = 'Send';
        }
    }

    function showMessage(text, type) {
        messageText.textContent = text;
        inlineMessage.classList.remove('hidden');
        inlineMessage.classList.remove('opacity-0', 'scale-95');
        inlineMessage.classList.add('opacity-100', 'scale-100');
        
        // Auto-hide after 3 seconds
        setTimeout(() => {
            hideMessage();
        }, 3000);
    }

    function hideMessage() {
        inlineMessage.classList.remove('opacity-100', 'scale-100');
        inlineMessage.classList.add('opacity-0', 'scale-95');
        
        setTimeout(() => {
            inlineMessage.classList.add('hidden');
        }, 300);
    }
});
</script>