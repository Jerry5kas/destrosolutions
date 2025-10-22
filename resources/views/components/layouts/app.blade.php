<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100..900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <!-- Alpine.js removed to prevent conflicts with GSAP -->
</head>
        <body class="smooth-scroll overflow-x-hidden">

        <!-- Global Loading Overlay -->
        <div id="global-loading-overlay" class="loading-overlay fixed inset-0 z-[9999] bg-gray-900 flex items-center justify-center">
          <div class="loading-content text-center">
            <!-- Logo -->
            <div class="loading-logo mb-8 flex items-center justify-center">
              <img class="w-10 h-10" src="{{ asset('images/letter-d.png') }}" alt="Logo"/>
              <span class="text-xl font-bold text-white -ml-1">ESTROSOLUTIONS</span>
            </div>
            
            <!-- Running Car Animation -->
            <div class="car-container relative w-full h-16 mx-auto overflow-hidden">
              <div class="car-track absolute inset-0 flex items-center justify-center">
                <svg class="running-car w-full h-12 text-blue-600 animate-car-run" viewBox="0 0 1000 1000" fill="currentColor" style="transform: scaleX(-1);">
                  <path d="M284.353,608.065c7.629,0,13.858-5.995,14.228-13.532c0.013-0.236,0.019-0.474,0.019-0.712  c0-7.867-6.379-14.246-14.246-14.246c-7.867,0-14.246,6.379-14.246,14.246c0,0.238,0.007,0.476,0.019,0.712  C270.496,602.07,276.725,608.065,284.353,608.065z"/>
                  <path d="M729.354,579.575c-7.867,0-14.246,6.379-14.246,14.246c0,0.238,0.007,0.476,0.019,0.712  c0.37,7.537,6.599,13.532,14.228,13.532s13.858-5.995,14.228-13.532c0.013-0.236,0.018-0.474,0.018-0.712  C743.6,585.954,737.221,579.575,729.354,579.575z"/>
                  <path d="M172.624,597.235h43.569c1.77,36.11,31.61,64.83,68.16,64.83s66.391-28.72,68.16-64.83h308.68  c1.771,36.11,31.61,64.83,68.16,64.83s66.391-28.72,68.16-64.83h35.71c4.01,0,7.65-1.8,10.28-4.7c2.63-2.9,4.26-6.9,4.26-11.33  c0-3.81-1.229-7.5-3.479-10.4l-7.41-9.57c16.55-37.48,10.75-91.19,5.229-122.11c-3.17-17.81-12.899-33.38-26.93-42.87  c-16.811-11.38-45.44-26.93-92.63-43.51c-93.92-32.99-259.95-4.32-292.641,22.5c-26.05,21.36-77.59,72-142.92,79.5  c-33.949,3.89-63.02,13.82-83.12,22.47c-17.89,7.69-29.859,26.44-30.51,47.59l-0.71,22.93l-11.33,8.33  c-2.84,2.09-5.109,4.88-6.67,8.1c-1.56,3.21-2.41,6.85-2.41,10.6C152.233,587.175,161.363,597.235,172.624,597.235z   M772.464,597.235c-1.74,22.25-20.41,39.83-43.11,39.83s-41.37-17.58-43.109-39.83c-0.091-1.12-0.141-2.26-0.141-3.41  c0-23.85,19.4-43.25,43.25-43.25c23.851,0,43.25,19.4,43.25,43.25C772.604,594.975,772.554,596.115,772.464,597.235z   M827.711,487.775c3.336,0.69,5.771,3.549,5.956,6.95c0.821,15.131-1.424,30.716-2.923,39.046c-0.641,3.558-3.738,6.137-7.353,6.137  h-4.998c-4.402,0-7.851-3.787-7.439-8.17l3.002-32.026c0.15-1.604,0.815-3.116,1.895-4.311l4.802-5.316  C822.429,488.117,825.115,487.238,827.711,487.775z M681.14,418.279l5.027-23.402c2.199-10.237,10.731-17.901,21.145-18.993  l4.264-0.448c0.896,0.297,1.808,0.588,2.683,0.895c46.205,16.234,72.761,31.053,86.901,40.625  c8.388,5.674,14.338,15.349,16.331,26.549c0.243,1.362,0.478,2.718,0.703,4.069H704.81c-5.169,0-10.201-1.654-14.362-4.72  C682.782,437.207,679.14,427.589,681.14,418.279z M577.688,501.908h-25c-4.695,0-8.5-3.806-8.5-8.5s3.805-8.5,8.5-8.5h25  c4.694,0,8.5,3.806,8.5,8.5S582.382,501.908,577.688,501.908z M435.676,403.089c3.835-3.277,7.146-6.108,10.079-8.512  c4.355-3.573,22.641-12.418,60.703-20.347c31.671-6.597,66.803-10.498,100.046-11.177l-11.623,66.681  c-2.934,16.83-17.209,29.335-34.278,30.028l-173.586,7.045c-9.886,0.401-19.4-3.256-26.45-9.948  C392.087,440.323,417.549,418.579,435.676,403.089z M284.353,550.575c23.851,0,43.25,19.4,43.25,43.25c0,1.15-0.05,2.29-0.14,3.41  c-1.74,22.25-20.41,39.83-43.11,39.83c-22.7,0-41.37-17.58-43.109-39.83c-0.091-1.12-0.141-2.26-0.141-3.41  C241.104,569.975,260.504,550.575,284.353,550.575z M199.52,502.575c6.812,0,12.333,8.357,12.333,18.667  c0,10.309-5.521,18.667-12.333,18.667c-6.811,0-12.333-8.357-12.333-18.667C187.188,510.932,192.709,502.575,199.52,502.575z"/>
                </svg>
              </div>
            </div>
          </div>
        </div>

        <!-- Header -->


<!-- Header -->
<nav class="fixed top-0 left-0 w-full z-50 px-4 py-3 border-b border-gray-300 font-exo-2 bg-white overflow-hidden">

    <div class="max-w-7xl mx-auto flex items-center justify-between px-4 py-2">
        <!-- Logo -->
        <div class="flex items-center space-x-2 relative">
            <img class="w-7 h-7" src="{{ asset('images/letter-d.png') }}" alt="Logo"/>
            <span class=" absolute left-6 text-lg font-semibold tracking-wide">
        ESTROSOLUTIONS
      </span>
        </div>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex space-x-8 items-center font-semibold relative">
            @foreach([
                ['label' => 'Home', 'url' => '/'],
                ['label' => 'Quantum', 'url' => url('/page')],
                ['label' => 'Services', 'url' => '/page'],
                ['label' => 'Products', 'url' => '/page'],
                ['label' => 'Training', 'url' => '/page'],
                ['label' => 'Blog', 'url' => '/page'],
                ['label' => 'Contact Us', 'url' => '/page']
            ] as $item)
                <div class="relative group">
                    <!-- Link -->
                    <a href="{{ $item['url'] }}"
                       class="text-sm text-gray-600 hover:text-black relative pb-2 transition-colors duration-300">
                        {{ $item['label'] }}
                        <!-- Underline animation -->
                        <span class="absolute left-0 bottom-0 w-0 h-[2px] bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </div>
            @endforeach
        </div>

    </div>
</nav>

<main class="mt-16 font-inter-light min-h-screen flex flex-col justify-between ">
    <div class="">
        {{ $slot }}
    </div>

    <div>
        <x-partials.footer/>
    </div>
</main>

<!-- WhatsApp Button -->
<a
    href="https://api.whatsapp.com/send/?phone=919398793452&text&type=phone_number&app_absent=0"
    target="_blank"
    class="fixed bottom-6 right-6 z-50 flex items-center justify-center w-14 h-14 rounded-full bg-blue-700 hover:bg-green-600 transition-colors duration-300 shadow-lg"
    title="Chat with us on WhatsApp"
>
    <!-- WhatsApp Icon -->
    <svg class="w-7 h-7 text-white hover:text-gray-100 transition-colors duration-300"
         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
        <path
            d="M20.52 3.48A11.94 11.94 0 0 0 12 0C5.37 0 0 5.37 0 12c0 2.12.56 4.1 1.53 5.84L0 24l6.41-1.67A11.94 11.94 0 0 0 12 24c6.63 0 12-5.37 12-12 0-3.2-1.24-6.18-3.48-8.52zm-8.52 18.96a10.02 10.02 0 0 1-5.33-1.53l-.38-.23-3.8.99.99-3.78-.25-.39A10 10 0 1 1 12 22.44zm5.05-7.78c-.28-.14-1.64-.81-1.89-.91-.25-.1-.43-.14-.61.14s-.7.91-.86 1.1c-.16.18-.32.21-.6.07-.28-.14-1.18-.44-2.25-1.38-.83-.74-1.39-1.66-1.55-1.92-.16-.25-.02-.38.12-.52.12-.12.28-.32.42-.48.14-.16.18-.28.28-.46.1-.18.05-.34-.02-.48-.07-.14-.61-1.48-.84-2.02-.22-.53-.44-.46-.61-.46-.16 0-.35 0-.53 0s-.48.07-.73.35c-.25.28-.96.94-.96 2.29s.99 2.65 1.13 2.83c.14.18 1.95 2.97 4.73 4.17.66.28 1.17.45 1.57.57.66.2 1.26.17 1.74.1.53-.08 1.64-.67 1.87-1.32.23-.66.23-1.22.16-1.32-.07-.1-.25-.16-.53-.3z"/>
    </svg>
        </a>

        <!-- Global Loading System -->
        <script>
        // Global Loading System with Rules
        document.addEventListener('DOMContentLoaded', function() {
          console.log('Initializing global loading system with rules');
          
          const loadingOverlay = document.getElementById('global-loading-overlay');
          let isDataReady = false;
          let minLoadingTime = 2000; // Compulsory 2 seconds
          let loadingStartTime = Date.now();
          let loadingInterval = null;
          
          // Show loading initially
          function showLoading() {
            if (loadingOverlay) {
              loadingOverlay.style.display = 'flex';
              loadingOverlay.style.opacity = '1';
              loadingOverlay.style.transform = 'scale(1)';
              console.log('Global loading shown');
            }
          }
          
          // Hide loading with zoom-out fade effect
          function hideLoading() {
            if (loadingOverlay) {
              console.log('Hiding global loading with zoom-out effect');
              loadingOverlay.style.transition = 'opacity 1s ease-out, transform 1s ease-out';
              loadingOverlay.style.opacity = '0';
              loadingOverlay.style.transform = 'scale(1.1)'; // Zoom out effect
              
              setTimeout(() => {
                loadingOverlay.style.display = 'none';
                console.log('Global loading hidden');
              }, 1000);
            }
          }
          
          // Check if data is ready
          function checkDataReady() {
            console.log('Checking if data is ready');
            
            // Check for key elements that indicate page is loaded
            const hasHeroSection = document.querySelector('.hero-section');
            const hasNavigation = document.querySelector('nav');
            const hasMainContent = document.querySelector('main');
            
            const isReady = hasHeroSection && hasNavigation && hasMainContent;
            
            if (isReady) {
              console.log('Data is ready');
              isDataReady = true;
            } else {
              console.log('Data not ready, continuing to check...');
            }
            
            return isReady;
          }
          
          // Continuous loading loop
          function startLoadingLoop() {
            console.log('Starting continuous loading loop');
            
            loadingInterval = setInterval(() => {
              const elapsedTime = Date.now() - loadingStartTime;
              const hasMinTimePassed = elapsedTime >= minLoadingTime;
              
              console.log(`Loading check - Elapsed: ${elapsedTime}ms, Min time: ${minLoadingTime}ms, Data ready: ${isDataReady}`);
              
              // Only hide if both conditions are met:
              // 1. Minimum 2 seconds have passed
              // 2. Data is ready
              if (hasMinTimePassed && isDataReady) {
                console.log('Both conditions met - hiding loading');
                clearInterval(loadingInterval);
                hideLoading();
              } else if (hasMinTimePassed && !isDataReady) {
                console.log('Min time passed but data not ready - continuing to check');
                checkDataReady();
              } else {
                console.log('Still within minimum loading time');
              }
            }, 100); // Check every 100ms
          }
          
          // Show loading initially
          showLoading();
          
          // Start the loading loop
          startLoadingLoop();
          
          // Make functions globally available
          window.globalLoading = {
            show: showLoading,
            hide: hideLoading,
            checkData: checkDataReady,
            setDataReady: function() {
              isDataReady = true;
              console.log('Data marked as ready externally');
            }
          };
        });
        </script>

        <!-- Global Loading Styles -->
        <style>
        /* Global Loading Overlay Styles */
        .loading-overlay {
          background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
          backdrop-filter: blur(10px);
          -webkit-backdrop-filter: blur(10px);
          transition: opacity 1s ease-out, transform 1s ease-out;
          transform-origin: center center;
        }

        .loading-content {
          animation: fadeInUp 0.8s ease-out;
        }

        .loading-logo img {
          filter: drop-shadow(0 0 10px rgba(59, 130, 246, 0.3));
        }

        @keyframes fadeInUp {
          from {
            opacity: 0;
            transform: translateY(30px);
          }
          to {
            opacity: 1;
            transform: translateY(0);
          }
        }

        /* Car Running Animation */
        @keyframes carRun {
          0% {
            transform: translateX(-100%) translateY(-20px) scaleX(-1);
            opacity: 0.8;
          }
          10% {
            transform: translateX(-80%) translateY(-15px) scaleX(-1);
            opacity: 0.9;
          }
          20% {
            transform: translateX(-60%) translateY(-10px) scaleX(-1);
            opacity: 1;
          }
          30% {
            transform: translateX(-40%) translateY(-5px) scaleX(-1);
            opacity: 1;
          }
          100% {
            transform: translateX(100%) translateY(0) scaleX(-1);
            opacity: 1;
          }
        }

        .animate-car-run {
          animation: carRun 3s ease-out infinite;
        }

        .car-container {
          position: relative;
          max-width: 300px; /* Match logo width */
        }

        .car-track {
          position: relative;
          overflow: hidden;
        }
        </style>

        </body>
        </html>
