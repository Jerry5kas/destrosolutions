<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Admin' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Roboto+Slab:wght@600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <!-- Alpine.js for admin functionality -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        .dark-glass-bg {
            background:
                linear-gradient(135deg, #0f0f23 0%, #1a1a2e 25%, #16213e 50%, #0f3460 75%, #533483 100%),
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.2) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.08) 0%, transparent 50%);
            background-size: 400% 400%, 800px 800px, 600px 600px, 400px 400px;
            animation: gradientShift 30s ease-in-out infinite;
        }

        @keyframes gradientShift {
            0%, 100% {
                background-position: 0% 50%, 0 0, 0 0, 0 0;
            }
            25% {
                background-position: 100% 50%, 200px 200px, 150px 150px, 100px 100px;
            }
            50% {
                background-position: 50% 100%, 400px 400px, 300px 300px, 200px 200px;
            }
            75% {
                background-position: 50% 0%, 600px 600px, 450px 450px, 300px 300px;
            }
        }

        .glass-sidebar {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow:
                0 8px 32px rgba(0, 0, 0, 0.1),
                inset -1px 0 0 rgba(255, 255, 255, 0.05);
        }

        .glass-header {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow:
                0 8px 32px rgba(0, 0, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.05);
        }

        .glass-table {
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .glass-input {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #ffffff;
        }

        .glass-input:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(59, 130, 246, 0.5);
            box-shadow:
                0 0 0 3px rgba(59, 130, 246, 0.1),
                0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .glass-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .glass-button {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #ffffff;
        }

        .glass-button:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.3);
        }

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
            max-width: 300px;
        }

        .car-track {
            position: relative;
            overflow: hidden;
        }
    </style>
</head>
<body class="dark-glass-bg min-h-screen text-white">
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
    <div x-data="{
        open: window.innerWidth > 1024,
        mobileMenuOpen: false,
        init() {
            // Handle window resize
            window.addEventListener('resize', () => {
                if (window.innerWidth <= 1024) {
                    this.open = false;
                    this.mobileMenuOpen = false;
                } else {
                    this.open = true;
                }
            });
        }
    }" class="flex min-h-screen">

        <!-- Mobile Overlay -->
        <div x-show="mobileMenuOpen && window.innerWidth <= 1024"
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-gray-900 bg-opacity-50 z-40"
             @click="mobileMenuOpen = false"></div>

        <!-- Sidebar -->
        <aside :class="[
            'transition-all duration-300 ease-in-out glass-sidebar',
            window.innerWidth <= 1024 ?
                (mobileMenuOpen ? 'fixed inset-y-0 left-0 z-50 w-72' : '-translate-x-full fixed inset-y-0 left-0 z-50 w-72') :
                (open ? 'w-72' : 'w-16')
        ]"
        class="lg:relative lg:z-auto lg:translate-x-0">
            <!-- Sidebar Header -->
            <div class="h-16 flex items-center px-4 border-b border-white/10 bg-white/5">
                <button class="mr-3 text-white/70 hover:text-white transition-colors"
                        @click="open = !open; if (window.innerWidth <= 1024) mobileMenuOpen = false"
                        title="Toggle sidebar">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                    <span class="text-white font-semibold tracking-wide">Admin Console</span>
                </div>
                <!-- Mobile Close Button -->
                <button class="lg:hidden ml-auto p-2 text-white/70 hover:text-white hover:bg-white/10 rounded-lg transition-colors"
                        @click="mobileMenuOpen = false"
                        title="Close menu">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <!-- Navigation -->
            <nav class="p-4 space-y-4 overflow-y-auto h-full">
                <!-- Dashboard -->
                <div>
                    <div class="px-3 text-xs font-semibold text-white/50 uppercase tracking-wider mb-2" x-show="open">Overview</div>
                    <a href="{{ route('admin.dashboard') }}"
                       class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-white shadow-sm' : 'text-white/70 hover:bg-white/5 hover:text-white' }}"
                       @click="if (window.innerWidth <= 1024) mobileMenuOpen = false">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
                        </svg>
                        <span x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-x-2" x-transition:enter-end="opacity-100 transform translate-x-0">Dashboard</span>
                    </a>
                </div>

                <!-- Content Management -->
                <div x-data="{ contentOpen: true }">
                    <div class="px-3 text-xs font-semibold text-white/50 uppercase tracking-wider mb-2" x-show="open">Content</div>
                    <button @click="contentOpen = !contentOpen"
                            class="w-full flex items-center justify-between px-3 py-2.5 text-sm font-medium text-white/70 hover:bg-white/5 hover:text-white rounded-lg transition-all duration-200">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                            <span x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-x-2" x-transition:enter-end="opacity-100 transform translate-x-0">Content Management</span>
                        </div>
                        <svg class="w-4 h-4 transition-transform duration-200 flex-shrink-0" :class="contentOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="open">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div x-show="contentOpen"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         :class="window.innerWidth <= 1024 ? 'mt-2 space-y-1' : (open ? 'ml-6 mt-2 space-y-1' : 'mt-2 space-y-1')">
                        <a href="{{ route('admin.banners.index') }}"
                           class="flex items-center gap-3 px-3 py-2 text-sm text-white/60 hover:bg-white/5 hover:text-white rounded-md transition-all duration-200 {{ request()->routeIs('admin.banners.*') ? 'bg-white/10 text-white' : '' }}"
                           @click="if (window.innerWidth <= 1024) mobileMenuOpen = false">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="font-medium" x-show="open">Banners</span>
                        </a>
                        <a href="{{ route('admin.quantum.index') }}"
                           class="flex items-center gap-3 px-3 py-2 text-sm text-white/60 hover:bg-white/5 hover:text-white rounded-md transition-all duration-200 {{ request()->routeIs('admin.quantum.*') ? 'bg-white/10 text-white' : '' }}"
                           @click="if (window.innerWidth <= 1024) mobileMenuOpen = false">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                            <span class="font-medium" x-show="open">Quantum</span>
                        </a>
                        <a href="{{ route('admin.services.index') }}"
                           class="flex items-center gap-3 px-3 py-2 text-sm text-white/60 hover:bg-white/5 hover:text-white rounded-md transition-all duration-200 {{ request()->routeIs('admin.services.*') ? 'bg-white/10 text-white' : '' }}"
                           @click="if (window.innerWidth <= 1024) mobileMenuOpen = false">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                            <span class="font-medium" x-show="open">Services</span>
                        </a>
                        <a href="{{ route('admin.products.index') }}"
                           class="flex items-center gap-3 px-3 py-2 text-sm text-white/60 hover:bg-white/5 hover:text-white rounded-md transition-all duration-200 {{ request()->routeIs('admin.products.*') ? 'bg-white/10 text-white' : '' }}"
                           @click="if (window.innerWidth <= 1024) mobileMenuOpen = false">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            <span class="font-medium" x-show="open">Products</span>
                        </a>
                        <a href="{{ route('admin.training.index') }}"
                           class="flex items-center gap-3 px-3 py-2 text-sm text-white/60 hover:bg-white/5 hover:text-white rounded-md transition-all duration-200 {{ request()->routeIs('admin.training.*') ? 'bg-white/10 text-white' : '' }}"
                           @click="if (window.innerWidth <= 1024) mobileMenuOpen = false">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <span class="font-medium" x-show="open">Training</span>
                        </a>
                        <a href="{{ route('admin.galleries.index') }}"
                           class="flex items-center gap-3 px-3 py-2 text-sm text-white/60 hover:bg-white/5 hover:text-white rounded-md transition-all duration-200 {{ request()->routeIs('admin.galleries.*') ? 'bg-white/10 text-white' : '' }}"
                           @click="if (window.innerWidth <= 1024) mobileMenuOpen = false">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="font-medium" x-show="open">Galleries</span>
                        </a>
                        <a href="{{ route('admin.faqs.index') }}"
                           class="flex items-center gap-3 px-3 py-2 text-sm text-white/60 hover:bg-white/5 hover:text-white rounded-md transition-all duration-200 {{ request()->routeIs('admin.faqs.*') ? 'bg-white/10 text-white' : '' }}"
                           @click="if (window.innerWidth <= 1024) mobileMenuOpen = false">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="font-medium" x-show="open">FAQs</span>
                        </a>
                        <a href="{{ route('admin.teams.index') }}"
                           class="flex items-center gap-3 px-3 py-2 text-sm text-white/60 hover:bg-white/5 hover:text-white rounded-md transition-all duration-200 {{ request()->routeIs('admin.teams.*') ? 'bg-white/10 text-white' : '' }}"
                           @click="if (window.innerWidth <= 1024) mobileMenuOpen = false">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span class="font-medium" x-show="open">Team</span>
                        </a>
                    </div>
                </div>

                <!-- Blog Management -->
                <div x-data="{ blogOpen: true }">
                    <button @click="blogOpen = !blogOpen"
                            class="w-full flex items-center justify-between px-3 py-2.5 text-sm font-medium text-white/70 hover:bg-white/5 hover:text-white rounded-lg transition-all duration-200">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                            <span x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-x-2" x-transition:enter-end="opacity-100 transform translate-x-0">Blog Management</span>
                        </div>
                        <svg class="w-4 h-4 transition-transform duration-200 flex-shrink-0" :class="blogOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="open">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
{{--                    <button @click="blogOpen = !blogOpen"--}}
{{--                            class="w-full flex items-center justify-between px-3 py-2.5 text-sm font-medium text-white/70 hover:bg-white/5 hover:text-white rounded-lg transition-all duration-200">--}}
{{--                        <div class="flex items-center gap-3">--}}
{{--                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>--}}
{{--                            </svg>--}}
{{--                            <span x-show="open || window.innerWidth <= 1024" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-x-2" x-transition:enter-end="opacity-100 transform translate-x-0">Blog</span>--}}
{{--                        </div>--}}
{{--                        <svg class="w-4 h-4 transition-transform duration-200 flex-shrink-0" :class="blogOpen ? 'rotate-90' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>--}}
{{--                        </svg>--}}
{{--                    </button>--}}

                    <div x-show="blogOpen"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         :class="window.innerWidth <= 1024 ? 'mt-2 space-y-1' : (open ? 'ml-6 mt-2 space-y-1' : 'mt-2 space-y-1')">
                        <a href="{{ route('admin.blog.categories.index') }}"
                           class="flex items-center gap-3 px-3 py-2 text-sm text-white/60 hover:bg-white/5 hover:text-white rounded-md transition-all duration-200 {{ request()->routeIs('admin.blog.categories.*') ? 'bg-white/10 text-white' : '' }}"
                           @click="if (window.innerWidth <= 1024) mobileMenuOpen = false">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            <span class="font-medium" x-show="open">Categories</span>
                        </a>
                        <a href="{{ route('admin.blog.posts.index') }}"
                           class="flex items-center gap-3 px-3 py-2 text-sm text-white/60 hover:bg-white/5 hover:text-white rounded-md transition-all duration-200 {{ request()->routeIs('admin.blog.posts.*') ? 'bg-white/10 text-white' : '' }}"
                           @click="if (window.innerWidth <= 1024) mobileMenuOpen = false">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                            <span class="font-medium" x-show="open">Posts</span>
                        </a>
                    </div>
                </div>

                <!-- Contacts -->
                <a href="{{ route('admin.contacts.index') }}"
                   class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-white/70 hover:bg-white/5 hover:text-white rounded-lg transition-all duration-200 {{ request()->routeIs('admin.contacts.*') ? 'bg-white/10 text-white shadow-sm' : '' }}"
                   @click="if (window.innerWidth <= 1024) mobileMenuOpen = false">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-x-2" x-transition:enter-end="opacity-100 transform translate-x-0">Contacts</span>
                </a>
            </nav>
        </aside>
        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col min-h-screen lg:ml-0" :class="window.innerWidth <= 1024 ? '' : ''">
            <!-- Header -->
            <header class="h-16 glass-header flex items-center justify-between px-4 lg:px-6 sticky top-0 z-30">
                <!-- Mobile Menu Button -->
                <div class="flex items-center gap-4">
                    <button class="lg:hidden p-2 text-white/70 hover:text-white hover:bg-white/10 rounded-lg transition-colors"
                            @click="mobileMenuOpen = !mobileMenuOpen"
                            title="Toggle menu">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <div class="text-white font-semibold">{{ $header ?? 'Dashboard' }}</div>
                </div>

                <!-- Right Side Actions -->
                <div class="flex items-center justify-end gap-3 h-16 flex-nowrap">
                    <!-- Notifications -->
                    <div class="relative flex items-center" x-data="notificationSystem()">
                        <button @click="toggleNotifications()" 
                                class="p-2 text-white/70 hover:text-white hover:bg-white/10 rounded-lg transition-colors relative flex items-center justify-center h-10 min-w-10">
                            <!-- Clean Bell Icon -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg>
                            <!-- Notification Badge -->
                            <span x-show="unreadCount > 0" 
                                  x-text="unreadCount > 99 ? '99+' : unreadCount"
                                  class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center font-semibold animate-pulse"></span>
                        </button>

                        <!-- Notifications Dropdown -->
                        <div x-show="showNotifications" 
                             @click.away="showNotifications = false"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                             x-transition:leave-end="opacity-0 scale-95 translate-y-2"
                             class="absolute top-full right-0 mt-2 w-96 bg-white rounded-xl shadow-2xl border border-gray-200 z-50 max-h-[80vh] overflow-hidden">
                            <!-- Header -->
                            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-purple-50">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900">Notifications</h3>
                                            <p class="text-sm text-gray-600" x-text="unreadCount + ' unread'"></p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <button @click="markAllAsRead()" 
                                                x-show="unreadCount > 0"
                                                class="text-xs text-blue-600 hover:text-blue-800 font-medium px-3 py-1 rounded-md hover:bg-blue-100 transition-colors">
                                            Mark all read
                                        </button>
                                        <button @click="refreshNotifications()" 
                                                class="text-xs text-gray-500 hover:text-gray-700 p-1 rounded-md hover:bg-gray-100 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Notifications List -->
                            <div class="max-h-96 overflow-y-auto">
                                <template x-for="notification in notifications" :key="notification.id">
                                    <div class="px-6 py-4 border-b border-gray-100 hover:bg-gray-50 transition-colors cursor-pointer group"
                                         :class="{ 'bg-blue-50 border-l-4 border-l-blue-500': !notification.is_read }"
                                         @click="handleNotificationClick(notification)">
                                        <div class="flex items-start gap-3">
                                            <!-- Notification Icon -->
                                            <div class="flex-shrink-0 mt-1">
                                                <div class="w-8 h-8 rounded-full flex items-center justify-center"
                                                     :class="notification.type === 'contact_form' ? 'bg-green-100' : 'bg-blue-100'">
                                                    <svg x-show="notification.type === 'contact_form'" class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                    </svg>
                                                    <svg x-show="notification.type !== 'contact_form'" class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            
                                            <!-- Notification Content -->
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-center gap-2 mb-1">
                                                    <h4 class="text-sm font-semibold text-gray-900 truncate" x-text="notification.title"></h4>
                                                    <span x-show="!notification.is_read" 
                                                          class="w-2 h-2 bg-blue-500 rounded-full flex-shrink-0 animate-pulse"></span>
                                                </div>
                                                <p class="text-xs text-gray-600 mb-2 line-clamp-2" x-text="notification.message"></p>
                                                <div class="flex items-center justify-between">
                                                    <p class="text-xs text-gray-400" x-text="formatDate(notification.created_at)"></p>
                                                    <button @click.stop="markAsRead(notification.id)" 
                                                            x-show="!notification.is_read"
                                                            class="text-xs text-blue-600 hover:text-blue-800 font-medium opacity-0 group-hover:opacity-100 transition-opacity">
                                                        Mark read
                                                    </button>
                                                </div>
                                            </div>
                                            
                                            <!-- Arrow Icon -->
                                            <div class="flex-shrink-0 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                                
                                <!-- Empty State -->
                                <div x-show="notifications.length === 0" class="px-6 py-12 text-center">
                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                        </svg>
                                    </div>
                                    <h4 class="text-sm font-medium text-gray-900 mb-1">No notifications</h4>
                                    <p class="text-xs text-gray-500">You're all caught up!</p>
                                </div>
                            </div>

                            <!-- Footer -->
                            <div x-show="notifications.length > 0" class="px-6 py-3 border-t border-gray-100 bg-gray-50">
                                <a href="{{ route('admin.contacts.index') }}" 
                                   class="text-xs text-blue-600 hover:text-blue-800 font-medium flex items-center gap-1">
                                    View all contacts
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                    </div>

                    <!-- User Menu -->
                    <div class="relative flex items-center" x-data="{ userMenuOpen: false }">
                        <button @click="userMenuOpen = !userMenuOpen"
                                class="flex items-center gap-2 text-sm text-white/80 hover:text-white transition-colors p-2 rounded-lg hover:bg-white/10 h-10">
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-xs">
                                {{ substr(auth('admin')->user()->name ?? 'A', 0, 1) }}
                            </div>
                            <span class="hidden md:block">{{ auth('admin')->user()->name ?? '' }}</span>
                            <!-- Clean Chevron Down Icon -->
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                    <!-- User Dropdown -->
                    <div x-show="userMenuOpen"
                         @click.away="userMenuOpen = false"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute top-full right-6 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-2 z-50">
                        <div class="px-4 py-2 border-b border-gray-100">
                            <div class="text-sm font-medium text-gray-900">{{ auth('admin')->user()->name ?? '' }}</div>
                            <div class="text-xs text-gray-500">{{ auth('admin')->user()->email ?? '' }}</div>
                        </div>
                        <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                            <svg class="w-4 h-4 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Profile
                        </a>
                        <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                            <svg class="w-4 h-4 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Settings
                        </a>
                        <div class="border-t border-gray-200 mt-1"></div>
                        <form method="POST" action="{{ route('admin.logout') }}" class="block">
                            @csrf
                            <button type="submit" class="w-full flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                <svg class="w-4 h-4 mr-3 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>
                        <main class="p-6">
                            @if(session('status'))
                                <x-toast>{{ session('status') }}</x-toast>
                            @endif
                            @if ($errors->any())
                                <x-toast>
                                    <span class="font-medium">Validation errors:</span>
                                    <ul class="list-disc pl-5 mt-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </x-toast>
                            @endif

                            <div class="rounded-xl glass-card p-4">
                                {{ $slot }}
                            </div>
                        </main>
        </div>
    </div>

    <!-- Global Loading System -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      console.log('Initializing global loading system for admin');
      
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
        console.log('Checking if admin data is ready');
        
        // Check for key elements that indicate admin page is loaded
        const hasNavigation = document.querySelector('nav') || document.querySelector('aside');
        const hasMainContent = document.querySelector('main');
        
        // Check for admin-specific content
        const hasAdminContent = document.querySelector('.glass-card') || 
                               document.querySelector('.glass-sidebar') ||
                               document.querySelector('.glass-header') ||
                               document.querySelector('[x-data]');
        
        const isReady = hasNavigation && hasMainContent && hasAdminContent;
        
        if (isReady) {
          console.log('Admin data is ready - Navigation:', !!hasNavigation, 'Main:', !!hasMainContent, 'Content:', !!hasAdminContent);
          isDataReady = true;
        } else {
          console.log('Admin data not ready - Navigation:', !!hasNavigation, 'Main:', !!hasMainContent, 'Content:', !!hasAdminContent);
        }
        
        return isReady;
      }
      
      // Continuous loading loop
      function startLoadingLoop() {
        console.log('Starting continuous loading loop for admin');
        loadingInterval = setInterval(() => {
          const elapsedTime = Date.now() - loadingStartTime;
          const hasMinTimePassed = elapsedTime >= minLoadingTime;
          console.log(`Admin loading check - Elapsed: ${elapsedTime}ms, Min time: ${minLoadingTime}ms, Data ready: ${isDataReady}`);
          
          if (hasMinTimePassed && isDataReady) {
            console.log('Both conditions met - hiding admin loading');
            clearInterval(loadingInterval);
            hideLoading();
          } else if (hasMinTimePassed && !isDataReady) {
            console.log('Min time passed but admin data not ready - continuing to check');
            checkDataReady();
          } else {
            console.log('Still within minimum loading time for admin');
          }
        }, 100); // Check every 100ms
      }
      
      showLoading();
      startLoadingLoop();
      
      window.globalLoading = {
        show: showLoading,
        hide: hideLoading,
        checkData: checkDataReady,
        setDataReady: function() {
          isDataReady = true;
          console.log('Admin data marked as ready externally');
        }
      };
    });

    // Enhanced Notification System
    function notificationSystem() {
        return {
            notifications: [],
            unreadCount: 0,
            showNotifications: false,
            refreshInterval: null,

            init() {
                this.loadNotifications();
                this.startAutoRefresh();
            },

            getCSRFToken() {
                return document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
            },

            async loadNotifications() {
                try {
                    const response = await fetch('/admin/notifications');
                    const data = await response.json();
                    this.notifications = data.notifications.data || [];
                    this.unreadCount = data.unreadCount || 0;
                } catch (error) {
                    console.error('Failed to load notifications:', error);
                }
            },

            async refreshNotifications() {
                await this.loadNotifications();
            },

            async handleNotificationClick(notification) {
                try {
                    // Mark as read and get redirect URL
                    const response = await fetch(`/admin/notifications/${notification.id}/read`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': this.getCSRFToken(),
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        }
                    });

                    if (response.ok) {
                        const result = await response.json();
                        // Update local state
                        notification.is_read = true;
                        notification.read_at = new Date().toISOString();
                        this.unreadCount = Math.max(0, this.unreadCount - 1);
                        
                        // Redirect if URL provided
                        if (result.redirect_url) {
                            window.location.href = result.redirect_url;
                        }
                    } else {
                        console.error('Failed to mark notification as read:', response.status);
                    }
                } catch (error) {
                    console.error('Error handling notification click:', error);
                }
            },

            async markAsRead(notificationId) {
                try {
                    const response = await fetch(`/admin/notifications/${notificationId}/read`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': this.getCSRFToken(),
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        }
                    });

                    if (response.ok) {
                        // Update local state
                        const notification = this.notifications.find(n => n.id === notificationId);
                        if (notification) {
                            notification.is_read = true;
                            notification.read_at = new Date().toISOString();
                        }
                        this.unreadCount = Math.max(0, this.unreadCount - 1);
                    } else {
                        console.error('Failed to mark notification as read:', response.status);
                    }
                } catch (error) {
                    console.error('Failed to mark notification as read:', error);
                }
            },

            async markAllAsRead() {
                try {
                    const response = await fetch('/admin/notifications/mark-all-read', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': this.getCSRFToken(),
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        }
                    });

                    if (response.ok) {
                        // Update local state
                        this.notifications.forEach(notification => {
                            notification.is_read = true;
                            notification.read_at = new Date().toISOString();
                        });
                        this.unreadCount = 0;
                    } else {
                        console.error('Failed to mark all notifications as read:', response.status);
                    }
                } catch (error) {
                    console.error('Failed to mark all notifications as read:', error);
                }
            },

            toggleNotifications() {
                this.showNotifications = !this.showNotifications;
                if (this.showNotifications) {
                    this.refreshNotifications();
                }
            },

            startAutoRefresh() {
                // Refresh notifications every 30 seconds
                this.refreshInterval = setInterval(() => {
                    this.loadNotifications();
                }, 30000);
            },

            formatDate(dateString) {
                const date = new Date(dateString);
                const now = new Date();
                const diffInMinutes = Math.floor((now - date) / (1000 * 60));

                if (diffInMinutes < 1) return 'Just now';
                if (diffInMinutes < 60) return `${diffInMinutes}m ago`;
                if (diffInMinutes < 1440) return `${Math.floor(diffInMinutes / 60)}h ago`;
                return date.toLocaleDateString();
            }
        }
    }
    </script>
</body>
</html>


