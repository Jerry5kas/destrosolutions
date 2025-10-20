<div data-reveal-scope>
    <div
        class="py-6 xs:py-8 sm:pt-10 md:pt-12 lg:pt-16 flex flex-col justify-center items-center gap-y-3 xs:gap-y-4 sm:gap-y-5 md:gap-y-6 px-3 xs:px-4 sm:px-6"
        data-reveal>
        <h1 class="reveal-delay-0 font-roboto-slab font-semibold text-xl xs:text-2xl sm:text-3xl md:text-4xl text-center text-slate-700"
            data-reveal>About Us</h1>
        <span class="reveal-delay-1 w-8 xs:w-10 border border-b border-blue-700" data-reveal></span>
        <span
            class="reveal-delay-2 max-w-xs xs:max-w-sm sm:max-w-2xl md:max-w-4xl lg:max-w-5xl xl:max-w-6xl text-xs xs:text-sm sm:text-base md:text-md mx-auto text-justify sm:text-center text-gray-400 leading-relaxed px-2"
            data-reveal>
                At DestroSolutions, we enable the future of mobility by driving the transition to Software-Defined
                Vehicles (SDVs). Our expertise spans end-to-end automotive cybersecurity, software update management,
                functional safety, and E/E architecture transformation. Our commitment to Safety & security standards,
                expert training positions us as a trusted partner in delivering tomorrow's mobility—today.
            </span>
    </div>


    <div x-data="{ activeTab: 'automotive' }"
         class="text-xs xs:text-sm text-center max-w-xs xs:max-w-sm sm:max-w-2xl md:max-w-4xl lg:max-w-6xl xl:max-w-7xl mx-auto px-3 xs:px-4 sm:px-6">
        {{-- tab-header --}}
        <div
            class="flex flex-row justify-center items-center space-x-2 xs:space-x-3 sm:space-x-4 md:space-x-6 lg:space-x-8 xl:space-x-12 py-4 xs:py-5 sm:py-6 overflow-x-auto scrollbar-hide">
            <!-- Automotive -->
            <div
                @click="activeTab = 'automotive'"
                class="flex flex-col items-center space-y-1 sm:space-y-2 cursor-pointer transition group flex-shrink-0"
            >
                <!-- Icon -->
                <svg
                    viewBox="0 0 20 20"
                    class="h-6 w-6 sm:h-7 sm:w-7 md:h-8 md:w-8 transition-all duration-300"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    :class="activeTab === 'automotive' ? 'text-blue-700' : 'text-gray-300 group-hover:text-slate-500'"
                >
                    <path fill-rule="evenodd"
                          d="M8.03774 0.858582C8.10805 0.365936 8.52993 0 9.02749 0H11.2931C11.7907 0 12.2125 0.365936 12.2829 0.858582L12.6542 3.45728C13.3566 3.72517 14.0048 4.10292 14.5778 4.56953L17.0155 3.591C17.4774 3.40564 18.0053 3.58806 18.254 4.01904L19.3869 5.98094C19.6356 6.41193 19.5297 6.96028 19.1383 7.26755L17.0727 8.88898C17.1115 9.13266 17.1378 9.38052 17.1508 9.6319C17.1571 9.7538 17.1603 9.87653 17.1603 10C17.1603 10.3781 17.1303 10.7492 17.0727 11.111L19.1383 12.7324C19.5297 13.0397 19.6356 13.5881 19.3869 14.019L18.254 15.9809C18.0053 16.4119 17.4774 16.5943 17.0155 16.409L14.5778 15.4305C14.0048 15.8971 13.3566 16.2748 12.6542 16.5427L12.2829 19.1414C12.2125 19.6341 11.7907 20 11.2931 20H9.02749C8.52993 20 8.10805 19.6341 8.03774 19.1414L7.6664 16.5427C6.96401 16.2748 6.31582 15.897 5.74282 15.4304L3.30483 16.409C2.84292 16.5943 2.31509 16.4119 2.06631 15.9809L0.933738 14.019C0.684714 13.5881 0.790671 13.0397 1.18227 12.7324L3.24795 11.1109C3.19033 10.7491 3.1603 10.3781 3.1603 10C3.1603 9.62193 3.19033 9.25085 3.24795 8.88904L1.18227 7.26755C0.790671 6.96028 0.684714 6.41193 0.933738 5.98094L2.06631 4.01904C2.31509 3.58806 2.84292 3.40564 3.30483 3.591L5.74282 4.5696C6.31582 4.10295 6.96401 3.72517 7.6664 3.45728L8.03774 0.858582ZM8.77735 6.51823L13.376 9.58397C13.6728 9.78189 13.6728 10.2181 13.376 10.416L8.77735 13.4818C8.44507 13.7033 8 13.4651 8 13.0657V10V6.93426C8 6.53491 8.44507 6.29672 8.77735 6.51823Z"/>
                </svg>

                <!-- Label -->
                <div
                    class="relative text-xs sm:text-sm font-medium whitespace-nowrap"
                    :class="activeTab === 'automotive' ? 'text-blue-700' : 'text-gray-300 group-hover:text-slate-500'"
                >
                    Automotive

                    <!-- Animated underline -->
                    <span
                        class="absolute left-0 -bottom-1 h-0.5 bg-blue-700 transition-all duration-300 ease-out origin-left"
                        :class="activeTab === 'automotive'
                ? 'w-full scale-x-100'
                : 'w-full scale-x-0 group-hover:scale-x-100'"
                    ></span>
                </div>
            </div>


            <!-- SDV -->
            <div
                @click="activeTab = 'sdv'"
                class="flex flex-col items-center space-y-1 sm:space-y-2 cursor-pointer transition group flex-shrink-0"
            >
                <!-- Icon -->
                <svg viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg"
                     class="h-6 w-6 sm:h-7 sm:w-7 md:h-8 md:w-8 transition-all duration-300"
                     fill="currentColor"
                     :class="activeTab === 'sdv' ? 'text-blue-700' : 'text-gray-300 group-hover:text-slate-500'">
                    <rect width="24" height="24" fill="white"></rect>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M16 11.968V12.032C16 12.4706 16 12.8491 15.9787 13.1624C15.9561 13.4922 15.9066 13.8221 15.7716 14.1481C15.4672 14.8831 14.8831 15.4672 14.148 15.7716C13.8221 15.9066 13.4922 15.9561 13.1624 15.9787C12.8491 16 12.4706 16 12.032 16H11.968C11.5294 16 11.1509 16 10.8376 15.9787C10.5078 15.9561 10.1779 15.9066 9.85195 15.7716C9.11687 15.4672 8.53284 14.8831 8.22836 14.1481C8.09336 13.8221 8.04385 13.4922 8.02135 13.1624C7.99998 12.8491 7.99999 12.4706 8 12.032V11.968C7.99999 11.5294 7.99998 11.1509 8.02135 10.8376C8.04385 10.5078 8.09336 10.1779 8.22836 9.85195C8.53284 9.11687 9.11687 8.53284 9.85195 8.22836C10.1779 8.09336 10.5078 8.04385 10.8376 8.02135C11.1509 7.99998 11.5294 7.99999 11.968 8H12.032C12.4706 7.99999 12.8491 7.99998 13.1624 8.02135C13.4922 8.04385 13.8221 8.09336 14.1481 8.22836C14.8831 8.53284 15.4672 9.11687 15.7716 9.85195C15.9066 10.1779 15.9561 10.5078 15.9787 10.8376C16 11.1509 16 11.5294 16 11.968ZM4 9L4 15H3C2.44772 15 2 15.4477 2 16C2 16.5523 2.44772 17 3 17H4.01233C4.01481 17.0559 4.01778 17.1101 4.02135 17.1624C4.04385 17.4922 4.09336 17.8221 4.22836 18.1481C4.53284 18.8831 5.11687 19.4672 5.85195 19.7716C6.17788 19.9066 6.50779 19.9561 6.83762 19.9787C6.88993 19.9822 6.94407 19.9852 7 19.9877V21C7 21.5523 7.44772 22 8 22C8.55228 22 9 21.5523 9 21V20H15V21C15 21.5523 15.4477 22 16 22C16.5523 22 17 21.5523 17 21V19.9877C17.0559 19.9852 17.1101 19.9822 17.1624 19.9787C17.4922 19.9561 17.8221 19.9066 18.1481 19.7716C18.8831 19.4672 19.4672 18.8831 19.7716 18.1481C19.9066 17.8221 19.9561 17.4922 19.9787 17.1624C19.9822 17.1101 19.9852 17.0559 19.9877 17H21C21.5523 17 22 16.5523 22 16C22 15.4477 21.5523 15 21 15H20V9H21C21.5523 9 22 8.55228 22 8C22 7.44772 21.5523 7 21 7H19.9877C19.9852 6.94407 19.9822 6.88993 19.9787 6.83762C19.9561 6.50779 19.9066 6.17788 19.7716 5.85195C19.4672 5.11687 18.8831 4.53284 18.1481 4.22836C17.8221 4.09336 17.4922 4.04385 17.1624 4.02135C17.1101 4.01778 17.0559 4.01481 17 4.01233V3C17 2.44772 16.5523 2 16 2C15.4477 2 15 2.44772 15 3V4L9 4V3C9 2.44772 8.55228 2 8 2C7.44772 2 7 2.44772 7 3V4.01233C6.94407 4.01481 6.88993 4.01778 6.83762 4.02135C6.50779 4.04385 6.17788 4.09336 5.85195 4.22836C5.11687 4.53284 4.53284 5.11686 4.22836 5.85195C4.09336 6.17788 4.04385 6.50779 4.02135 6.83762C4.01778 6.88993 4.01481 6.94407 4.01233 7H3C2.44772 7 2 7.44772 2 8C2 8.55229 2.44772 9 3 9H4Z"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M13.9833 10.9738C13.9677 10.7458 13.9411 10.6589 13.9239 10.6173C13.8224 10.3723 13.6277 10.1776 13.3827 10.0761C13.3411 10.0589 13.2542 10.0323 13.0262 10.0167C12.7893 10.0005 12.4796 10 12 10C11.5204 10 11.2107 10.0005 10.9738 10.0167C10.7458 10.0323 10.6589 10.0589 10.6173 10.0761C10.3723 10.1776 10.1776 10.3723 10.0761 10.6173C10.0589 10.6589 10.0323 10.7458 10.0167 10.9738C10.0005 11.2107 10 11.5204 10 12C10 12.4796 10.0005 12.7893 10.0167 13.0262C10.0323 13.2542 10.0589 13.3411 10.0761 13.3827C10.1776 13.6277 10.3723 13.8224 10.6173 13.9239C10.6589 13.9411 10.7458 13.9677 10.9738 13.9833C11.2107 13.9995 11.5204 14 12 14C12.4796 14 12.7893 13.9995 13.0262 13.9833C13.2542 13.9677 13.3411 13.9411 13.3827 13.9239C13.6277 13.8224 13.8224 13.6277 13.9239 13.3827C13.9411 13.3411 13.9677 13.2542 13.9833 13.0262C13.9995 12.7893 14 12.4796 14 12C14 11.5204 13.9995 11.2107 13.9833 10.9738Z"></path>
                </svg>

                <!-- Text + underline animation -->
                <div
                    class="relative text-xs sm:text-sm font-medium whitespace-nowrap"
                    :class="activeTab === 'sdv' ? 'text-blue-700' : 'text-gray-300 group-hover:text-slate-500'">
                    SDV
                    <span
                        class="absolute left-0 -bottom-1 h-0.5 bg-blue-700 transition-all duration-300 ease-out origin-left"
                        :class="activeTab === 'sdv'
                ? 'w-full scale-x-100'
                : 'w-full scale-x-0 group-hover:scale-x-100'">
        </span>
                </div>
            </div>


            <!-- Avionics -->

            <div
                @click="activeTab = 'avionics'"
                class="flex flex-col items-center space-y-1 sm:space-y-2 cursor-pointer transition group flex-shrink-0">
                <!-- Icon -->
                <svg viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg"
                     class="h-6 w-6 sm:h-7 sm:w-7 md:h-8 md:w-8 transition-all duration-300"
                     fill="currentColor"
                     :class="activeTab === 'avionics' ? 'text-blue-700' : 'text-gray-300 group-hover:text-slate-500'">
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M8.4,22l1.2-2.3c0.5-1,1.5-1.7,2.7-1.7h3.5c0.1,0,0.2,0,0.2,0c1.8-2.4,4.7-4,8-4c1.2,0,2.3,0.2,3.4,0.6 C27,14,26.5,13.4,26,13h1c0.6,0,1-0.4,1-1s-0.4-1-1-1h-2.8L23,8c-0.8-1.8-2.6-3-4.6-3H9.6C7.6,5,5.8,6.2,5,8l-1.3,3H1 c-0.6,0-1,0.4-1,1s0.4,1,1,1h1c-1.2,0.9-2,2.4-2,4v4c0,0.9,0.4,1.7,1,2.2V25c0,1.7,1.3,3,3,3h2c1.7,0,3-1.3,3-3v-1h5 c0-0.7,0.1-1.4,0.2-2H8.4z M7,19H4c-0.6,0-1-0.4-1-1s0.4-1,1-1h3c0.6,0,1,0.4,1,1S7.6,19,7,19z M5.5,12l1.4-3.2C7.4,7.7,8.4,7,9.6,7 h8.7c1.2,0,2.3,0.7,2.8,1.8l1.4,3.2H5.5z"></path>
                        <path
                            d="M31.7,21.9c-0.1-0.5-0.7-0.8-1.2-0.7c-0.7,0.2-1.2,0-1.3-0.2c-0.1-0.2,0-0.7,0.5-1.3c0.4-0.4,0.4-1,0-1.4 c-1-1-2.2-1.7-3.6-2.1c-0.5-0.1-1.1,0.2-1.2,0.7c-0.2,0.7-0.6,1-0.9,1s-0.6-0.4-0.9-1c-0.2-0.5-0.7-0.8-1.2-0.7 c-1.4,0.4-2.6,1.1-3.6,2.1c-0.4,0.4-0.4,1,0,1.4c0.5,0.5,0.6,1,0.5,1.3c-0.1,0.2-0.6,0.4-1.3,0.2c-0.5-0.1-1.1,0.2-1.2,0.7 C16.1,22.6,16,23.3,16,24s0.1,1.4,0.3,2.1c0.1,0.5,0.7,0.8,1.2,0.7c0.7-0.2,1.2,0,1.3,0.2c0.1,0.2,0,0.7-0.5,1.3 c-0.4,0.4-0.4,1,0,1.4c1,1,2.2,1.7,3.6,2.1c0.5,0.1,1.1-0.2,1.2-0.7c0.2-0.7,0.6-1,0.9-1s0.6,0.4,0.9,1c0.1,0.4,0.5,0.7,1,0.7 c0.1,0,0.2,0,0.3,0c1.4-0.4,2.6-1.1,3.6-2.1c0.4-0.4,0.4-1,0-1.4c-0.5-0.5-0.6-1-0.5-1.3c0.1-0.2,0.6-0.4,1.3-0.2 c0.5,0.1,1.1-0.2,1.2-0.7c0.2-0.7,0.3-1.4,0.3-2.1S31.9,22.6,31.7,21.9z M24,27c-1.7,0-3-1.3-3-3s1.3-3,3-3s3,1.3,3,3S25.7,27,24,27 z"></path>
                    </g>
                </svg>

                <!-- Text + underline animation -->
                <div
                    class="relative text-xs sm:text-sm font-medium whitespace-nowrap"
                    :class="activeTab === 'avionics' ? 'text-blue-700' : 'text-gray-300 group-hover:text-slate-500'">
                    Avionics
                    <span
                        class="absolute left-0 -bottom-1 h-0.5 bg-blue-700 transition-all duration-300 ease-out origin-left"
                        :class="activeTab === 'avionics'
                            ? 'w-full scale-x-100'
                            : 'w-full scale-x-0 group-hover:scale-x-100'">
                        </span>
                </div>
            </div>

            <!-- Railways -->
            <div
                @click="activeTab = 'railways'"
                class="flex flex-col items-center space-y-1 sm:space-y-2 cursor-pointer transition group flex-shrink-0">
                <!-- Icon -->
                <svg fill="" version="1.1" id="Capa_1"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     viewBox="0 0 612 612"
                     xml:space="preserve"
                     class="h-6 w-6 sm:h-7 sm:w-7 md:h-8 md:w-8 transition-all duration-300"
                     :class="activeTab === 'railways' ? 'fill-blue-700' : 'fill-gray-300 group-hover:fill-slate-500'">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g>
                            <path
                                d="M470.263,488.679h35.368c10.831,0,19.61-8.779,19.61-19.61V91.226c0-27.077-21.95-49.027-49.026-49.027h-107.65V14.21 H243.436v27.989h-107.65c-27.077,0-49.027,21.95-49.027,49.027v377.842c0,10.831,8.78,19.61,19.611,19.61h35.368L0,597.79h91.111 l111.046-109.111h207.686L520.889,597.79H612L470.263,488.679z M409.843,426.848c0-16.593,13.451-30.045,30.045-30.045 c16.593,0,30.044,13.451,30.044,30.045c0,16.593-13.451,30.045-30.044,30.045C423.294,456.893,409.843,443.44,409.843,426.848z M174.209,456.893c-16.593,0-30.044-13.452-30.044-30.045s13.451-30.045,30.044-30.045c16.593,0,30.045,13.451,30.045,30.045 C204.254,443.44,190.802,456.893,174.209,456.893z M145.356,301.543c-5.415,0-9.805-4.39-9.805-9.805V101.864 c0-5.415,4.39-9.805,9.805-9.805h321.289c5.415,0,9.805,4.39,9.805,9.805v189.874c0,5.415-4.39,9.805-9.805,9.805H145.356 L145.356,301.543z"></path>
                        </g>
                    </g>
                    </svg>

                <!-- Text + underline animation -->
                <div
                    class="relative text-xs sm:text-sm font-medium whitespace-nowrap"
                    :class="activeTab === 'railways' ? 'text-blue-700' : 'text-gray-300 group-hover:text-slate-500'">
                    Railways
                    <span
                        class="absolute left-0 -bottom-1 h-0.5 bg-blue-700 transition-all duration-300 ease-out origin-left"
                        :class="activeTab === 'railways'
                            ? 'w-full scale-x-100'
                            : 'w-full scale-x-0 group-hover:scale-x-100'">
                        </span>
                </div>
            </div>

            <!-- Health Care -->
            <div
                @click="activeTab = 'healthcare'"
                class="flex flex-col items-center space-y-1 sm:space-y-2 cursor-pointer transition group flex-shrink-0">
                <!-- Medical Icon -->
                <svg class="h-6 w-6 sm:h-7 sm:w-7 md:h-8 md:w-8 transition-all duration-300" fill="currentColor"
                     version="1.1" id="Layer_1"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     viewBox="0 0 256 190"
                     enable-background="new 0 0 256 190" xml:space="preserve"
                     :class="activeTab === 'healthcare' ? 'text-blue-700' : 'text-gray-300 group-hover:text-slate-500'">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M48.12,27.903C48.12,13.564,59.592,2,74.023,2c14.339,0,25.903,11.564,25.903,25.903 C99.834,42.335,88.27,53.806,74.023,53.806C59.684,53.806,48.12,42.242,48.12,27.903z M191,139h-47V97c0-20.461-17.881-37-38-37H43 C20.912,60,1.99,79.14,2,98v77c-0.026,8.533,6.001,12.989,12,13c6.014,0.011,12-4.445,12-13v-75h8v88h78v-88h8l0.081,50.37 c-0.053,8.729,5.342,12.446,10.919,12.63h60C207.363,163,207.363,139,191,139z M251.652,56.921 c-2.101-4.842-5.299-8.861-9.684-11.876c-3.837-2.741-8.222-4.476-12.972-5.116c-3.837-0.548-7.856-0.183-12.059,1.005 c-5.207,1.553-9.409,4.294-12.333,8.313c-2.923-4.02-6.943-6.852-12.333-8.313c-4.202-1.188-8.13-1.553-12.059-1.005 c-4.75,0.639-9.135,2.284-12.972,5.116c-4.294,3.015-7.582,7.126-9.684,11.876c-2.467,5.755-3.106,12.059-1.644,18.728 c1.462,7.217,4.75,14.068,10.323,21.377c4.659,6.212,10.323,11.785,17.083,17.083c3.745,3.015,7.765,5.755,11.602,8.496l1.188,0.914 c2.01,1.462,6.029,3.837,7.856,4.842c0.091,0.091,0.365,0.091,0.548,0.183c0.183-0.091,0.457-0.091,0.548-0.183 c1.736-1.096,5.755-3.471,7.856-4.842l1.188-0.914c3.837-2.741,7.765-5.573,11.602-8.496c6.76-5.299,12.333-10.871,17.083-17.083 c5.573-7.308,8.861-14.068,10.323-21.377C254.758,68.98,254.027,62.676,251.652,56.921z M246.81,74.278 c-1.188,6.212-4.111,12.15-9.135,18.636c-4.294,5.755-9.501,10.871-15.896,15.896c-3.654,2.923-7.582,5.664-11.419,8.313 l-1.188,0.914c-1.005,0.731-2.923,1.918-4.568,2.923c-1.644-1.005-3.563-2.192-4.568-2.923l-1.188-0.914 c-3.746-2.649-7.674-5.39-11.419-8.313c-6.303-4.842-11.511-10.049-15.896-15.896c-1.736-2.467-3.289-4.75-4.659-6.943h10.962 l4.111,10.688l8.313-22.016l11.785,31.06l8.496-22.29l1.005,2.741h10.78c0.731,1.644,2.467,2.741,4.476,2.741 c2.741,0,5.024-2.192,5.024-5.024c0-2.741-2.192-5.024-5.024-5.024c-2.01,0-3.654,1.096-4.476,2.741h-7.582l-4.111-10.871 l-8.496,22.29l-11.785-31.06l-8.405,22.199l-1.005-2.649h-16.261c-1.005-2.284-1.736-4.75-2.192-7.126 c-1.096-5.39-0.639-10.232,1.37-14.708c1.644-3.746,4.02-6.76,7.308-9.135c3.015-2.101,6.303-3.471,10.049-4.02 c3.015-0.457,6.029-0.091,9.227,0.731c4.02,1.188,6.852,3.197,8.953,6.121c0.548,0.731,1.005,1.553,1.553,2.284 c0.183,0.457,0.548,0.914,0.731,1.37l2.923,4.568l2.923-4.568c0.365-0.457,0.548-0.914,0.731-1.37 c0.548-0.914,1.005-1.644,1.553-2.284c2.101-3.015,5.024-5.024,8.953-6.121c3.197-1.005,6.212-1.188,9.227-0.731 c3.746,0.548,6.943,1.736,10.049,4.02c3.289,2.284,5.755,5.299,7.308,9.135C247.541,64.047,247.997,68.98,246.81,74.278z"></path>
                    </g>
                    </svg>

                <!-- Text + underline animation -->
                <div
                    class="relative text-xs sm:text-sm font-medium whitespace-nowrap"
                    :class="activeTab === 'healthcare' ? 'text-blue-700' : 'text-gray-300 group-hover:text-slate-500'">
                    Health Care
                    <span
                        class="absolute left-0 -bottom-1 h-0.5 bg-blue-700 transition-all duration-300 ease-out origin-left"
                        :class="activeTab === 'healthcare'
                            ? 'w-full scale-x-100'
                            : 'w-full scale-x-0 group-hover:scale-x-100'">
                        </span>
                </div>
            </div>
        </div>

        {{-- tab-content --}}
        <div class="mt-4 xs:mt-5 sm:mt-6">
            <div x-show="activeTab === 'automotive'" x-cloak x-transition
                 class="max-w-xs xs:max-w-sm sm:max-w-2xl md:max-w-4xl lg:max-w-6xl xl:max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 xs:gap-4 sm:gap-5 md:gap-6 lg:gap-8 xl:gap-10 2xl:gap-16 px-2 xs:px-3 sm:px-4">
                <x-partials.card1/>
                <x-partials.card1/>
                <x-partials.card1/>
                <x-partials.card1/>
                <x-partials.card1/>
                <x-partials.card1/>
            </div>
            <div x-show="activeTab === 'sdv'" x-cloak x-transition
                 class="max-w-xs xs:max-w-sm sm:max-w-2xl md:max-w-4xl lg:max-w-6xl xl:max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 xs:gap-4 sm:gap-5 md:gap-6 lg:gap-8 xl:gap-10 2xl:gap-16 px-2 xs:px-3 sm:px-4">
                <x-partials.card1/>
                <x-partials.card1/>
                <x-partials.card1/>
                <x-partials.card1/>
                <x-partials.card1/>
            </div>
            <div x-show="activeTab === 'avionics'" x-cloak x-transition
                 class="max-w-xs xs:max-w-sm sm:max-w-2xl md:max-w-4xl lg:max-w-6xl xl:max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 xs:gap-4 sm:gap-5 md:gap-6 lg:gap-8 xl:gap-10 2xl:gap-16 px-2 xs:px-3 sm:px-4">
                <x-partials.card1/>
                <x-partials.card1/>
                <x-partials.card1/>
                <x-partials.card1/>
                <x-partials.card1/>
                <x-partials.card1/>
            </div>
            <div x-show="activeTab === 'railways'" x-cloak x-transition
                 class="max-w-xs xs:max-w-sm sm:max-w-2xl md:max-w-4xl lg:max-w-6xl xl:max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 xs:gap-4 sm:gap-5 md:gap-6 lg:gap-8 xl:gap-10 2xl:gap-16 px-2 xs:px-3 sm:px-4">
                <x-partials.card1/>
                <x-partials.card1/>
                <x-partials.card1/>
                <x-partials.card1/>
                <x-partials.card1/>
            </div>
            <div x-show="activeTab === 'healthcare'" x-cloak x-transition
                 class="max-w-xs xs:max-w-sm sm:max-w-2xl md:max-w-4xl lg:max-w-6xl xl:max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 xs:gap-4 sm:gap-5 md:gap-6 lg:gap-8 xl:gap-10 2xl:gap-16 px-2 xs:px-3 sm:px-4">
                <x-partials.card1/>
                <x-partials.card1/>
                <x-partials.card1/>
                <x-partials.card1/>
                <x-partials.card1/>
                <x-partials.card1/>
            </div>
        </div>
    </div>
</div>
