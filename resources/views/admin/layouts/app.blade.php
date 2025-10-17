<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Roboto+Slab:wght@600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])
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
    </style>
</head>
<body class="dark-glass-bg min-h-screen text-white">
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
                    <div class="px-3 text-xs font-semibold text-white/50 uppercase tracking-wider mb-2" x-show="open || window.innerWidth <= 1024">Overview</div>
                    <a href="{{ route('admin.dashboard') }}" 
                       class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-white shadow-sm' : 'text-white/70 hover:bg-white/5 hover:text-white' }}"
                       @click="if (window.innerWidth <= 1024) mobileMenuOpen = false">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
                        </svg>
                        <span x-show="open || window.innerWidth <= 1024" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-x-2" x-transition:enter-end="opacity-100 transform translate-x-0">Dashboard</span>
                    </a>
                </div>
                
                <!-- Content Management -->
                <div x-data="{ contentOpen: true }">
                    <div class="px-3 text-xs font-semibold text-white/50 uppercase tracking-wider mb-2" x-show="open || window.innerWidth <= 1024">Content</div>
                    <button @click="contentOpen = !contentOpen" 
                            class="w-full flex items-center justify-between px-3 py-2.5 text-sm font-medium text-white/70 hover:bg-white/5 hover:text-white rounded-lg transition-all duration-200">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            <span x-show="open || window.innerWidth <= 1024" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-x-2" x-transition:enter-end="opacity-100 transform translate-x-0">Content Management</span>
                        </div>
                        <svg class="w-4 h-4 transition-transform duration-200 flex-shrink-0" :class="contentOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    <div x-show="contentOpen && (open || window.innerWidth <= 1024)" 
                         x-transition:enter="transition ease-out duration-200" 
                         x-transition:enter-start="opacity-0 transform -translate-y-2" 
                         x-transition:enter-end="opacity-100 transform translate-y-0" 
                         :class="window.innerWidth <= 1024 ? 'mt-2 space-y-1' : 'ml-6 mt-2 space-y-1'">
                        <a href="{{ route('admin.banners.index') }}" 
                           class="flex items-center gap-3 px-3 py-2 text-sm text-white/60 hover:bg-white/5 hover:text-white rounded-md transition-all duration-200 {{ request()->routeIs('admin.banners.*') ? 'bg-white/10 text-white' : '' }}"
                           @click="if (window.innerWidth <= 1024) mobileMenuOpen = false">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="font-medium">Banners</span>
                        </a>
                        <a href="{{ route('admin.quantum.index') }}" 
                           class="flex items-center gap-3 px-3 py-2 text-sm text-white/60 hover:bg-white/5 hover:text-white rounded-md transition-all duration-200 {{ request()->routeIs('admin.quantum.*') ? 'bg-white/10 text-white' : '' }}"
                           @click="if (window.innerWidth <= 1024) mobileMenuOpen = false">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                            <span class="font-medium">Quantum</span>
                        </a>
                        <a href="{{ route('admin.services.index') }}" 
                           class="flex items-center gap-3 px-3 py-2 text-sm text-white/60 hover:bg-white/5 hover:text-white rounded-md transition-all duration-200 {{ request()->routeIs('admin.services.*') ? 'bg-white/10 text-white' : '' }}"
                           @click="if (window.innerWidth <= 1024) mobileMenuOpen = false">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                            <span class="font-medium">Services</span>
                        </a>
                        <a href="{{ route('admin.products.index') }}" 
                           class="flex items-center gap-3 px-3 py-2 text-sm text-white/60 hover:bg-white/5 hover:text-white rounded-md transition-all duration-200 {{ request()->routeIs('admin.products.*') ? 'bg-white/10 text-white' : '' }}"
                           @click="if (window.innerWidth <= 1024) mobileMenuOpen = false">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            <span class="font-medium">Products</span>
                        </a>
                        <a href="{{ route('admin.training.index') }}" 
                           class="flex items-center gap-3 px-3 py-2 text-sm text-white/60 hover:bg-white/5 hover:text-white rounded-md transition-all duration-200 {{ request()->routeIs('admin.training.*') ? 'bg-white/10 text-white' : '' }}"
                           @click="if (window.innerWidth <= 1024) mobileMenuOpen = false">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <span class="font-medium">Training</span>
                        </a>
                    </div>
                </div>
                
                <!-- Blog Management -->
                <div x-data="{ blogOpen: false }">
                    <button @click="blogOpen = !blogOpen" 
                            class="w-full flex items-center justify-between px-3 py-2.5 text-sm font-medium text-white/70 hover:bg-white/5 hover:text-white rounded-lg transition-all duration-200">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                            <span x-show="open || window.innerWidth <= 1024" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-x-2" x-transition:enter-end="opacity-100 transform translate-x-0">Blog</span>
                        </div>
                        <svg class="w-4 h-4 transition-transform duration-200 flex-shrink-0" :class="blogOpen ? 'rotate-90' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                    
                    <div x-show="blogOpen && (open || window.innerWidth <= 1024)" 
                         x-transition:enter="transition ease-out duration-200" 
                         x-transition:enter-start="opacity-0 transform -translate-y-2" 
                         x-transition:enter-end="opacity-100 transform translate-y-0" 
                         :class="window.innerWidth <= 1024 ? 'mt-2 space-y-1' : 'ml-6 mt-2 space-y-1'">
                        <a href="{{ route('admin.blog.categories.index') }}" 
                           class="flex items-center gap-3 px-3 py-2 text-sm text-white/60 hover:bg-white/5 hover:text-white rounded-md transition-all duration-200 {{ request()->routeIs('admin.blog.categories.*') ? 'bg-white/10 text-white' : '' }}"
                           @click="if (window.innerWidth <= 1024) mobileMenuOpen = false">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            <span class="font-medium">Categories</span>
                        </a>
                        <a href="{{ route('admin.blog.posts.index') }}" 
                           class="flex items-center gap-3 px-3 py-2 text-sm text-white/60 hover:bg-white/5 hover:text-white rounded-md transition-all duration-200 {{ request()->routeIs('admin.blog.posts.*') ? 'bg-white/10 text-white' : '' }}"
                           @click="if (window.innerWidth <= 1024) mobileMenuOpen = false">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                            <span class="font-medium">Posts</span>
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
                    <span x-show="open || window.innerWidth <= 1024" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-x-2" x-transition:enter-end="opacity-100 transform translate-x-0">Contacts</span>
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
                
                <!-- User Menu -->
                <div class="flex items-center gap-3" x-data="{ userMenuOpen: false }">
                    <div class="flex items-center gap-2 text-sm text-white/80">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-xs">
                            {{ substr(auth('admin')->user()->name ?? 'A', 0, 1) }}
                        </div>
                        <span class="hidden md:block">{{ auth('admin')->user()->name ?? '' }}</span>
                    </div>
                    
                    <button @click="userMenuOpen = !userMenuOpen" 
                            class="p-1 text-white/70 hover:text-white transition-colors">
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
                        <a href="#" class="flex items-center px-4 py-2 text-sm text-white/80 hover:bg-white/5">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Profile
                        </a>
                        <a href="#" class="flex items-center px-4 py-2 text-sm text-white/80 hover:bg-white/5">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Settings
                        </a>
                        <div class="border-t border-white/10 mt-1"></div>
                        <form method="POST" action="{{ route('admin.logout') }}" class="block">
                            @csrf
                            <button type="submit" class="w-full flex items-center px-4 py-2 text-sm text-red-400 hover:bg-white/5">
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                            
                            <!-- Global Loading Overlay -->
                            <div x-data="{ 
                                loading: false,
                                init() {
                                    this.$watch('loading', value => {
                                        if (value) {
                                            document.body.style.overflow = 'hidden';
                                        } else {
                                            document.body.style.overflow = '';
                                        }
                                    });
                                }
                            }" 
                            @loading-start.window="loading = true"
                            @loading-end.window="loading = false"
                            @loading-error.window="loading = false">
                                
                                <!-- Loading Overlay -->
                                <div x-show="loading" 
                                     x-transition:enter="transition ease-out duration-200"
                                     x-transition:enter-start="opacity-0"
                                     x-transition:enter-end="opacity-100"
                                     x-transition:leave="transition ease-in duration-150"
                                     x-transition:leave-start="opacity-100"
                                     x-transition:leave-end="opacity-0"
                                     class="fixed inset-0 bg-black/80 backdrop-blur-sm z-50 flex items-center justify-center">
                                    <div class="glass-card rounded-xl p-8 text-center">
                                        <x-loading-spinner size="xl" color="blue" text="Loading..." />
                                    </div>
                                </div>
                                
                                <div class="rounded-xl glass-card p-4">
                                    {{ $slot }}
                                </div>
                            </div>
                        </main>
        </div>
    </div>
</body>
</html>


