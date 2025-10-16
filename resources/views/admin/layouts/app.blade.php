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
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-gray-50 text-gray-700">
    <div x-data="{ open: true }" class="flex min-h-screen">
        <aside :class="open ? 'w-72' : 'w-16'" class="transition-all duration-200 bg-white/95 backdrop-blur border-r border-gray-200">
            <div class="h-16 flex items-center px-6 border-b border-gray-200">
                <button class="mr-3 text-blue-600" @click="open=!open" title="Toggle sidebar">
                    <x-icons name="menu" size="w-6 h-6" />
                </button>
                <span class="text-blue-600 font-semibold tracking-wide" x-show="open">Admin Console</span>
            </div>
            <nav class="p-4 space-y-6">
                <div>
                    <div class="px-3 text-xs font-semibold text-gray-500 uppercase">Overview</div>
                    <a href="{{ route('admin.dashboard') }}" class="mt-2 flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-lg transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                        <x-icons name="dashboard" size="w-5 h-5" />
                        <span x-show="open">Dashboard</span>
                    </a>
                </div>
                
                <!-- Content Management -->
                <div x-data="{ contentOpen: true }">
                    <div class="px-3 text-xs font-semibold text-gray-500 uppercase">Content</div>
                    <button @click="contentOpen = !contentOpen" class="w-full mt-2 flex items-center justify-between px-3 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">
                        <div class="flex items-center gap-3">
                            <x-icons name="banners" size="w-5 h-5" />
                            <span x-show="open">Content Management</span>
                        </div>
                        <x-icons name="chevron-down" size="w-4 h-4" x-show="open" :class="contentOpen ? 'rotate-180' : ''" class="transition-transform" />
                    </button>
                    
                    <div x-show="contentOpen && open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="ml-6 mt-2 space-y-1">
                        <a href="{{ route('admin.banners.index') }}" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-700 rounded-md transition-colors {{ request()->routeIs('admin.banners.*') ? 'bg-blue-50 text-blue-700' : '' }}">
                            <x-icons name="banners" size="w-4 h-4" />
                            <span>Banners</span>
                        </a>
                        <a href="{{ route('admin.quantum.index') }}" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-700 rounded-md transition-colors {{ request()->routeIs('admin.quantum.*') ? 'bg-blue-50 text-blue-700' : '' }}">
                            <x-icons name="quantum" size="w-4 h-4" />
                            <span>Quantum</span>
                        </a>
                        <a href="{{ route('admin.services.index') }}" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-700 rounded-md transition-colors {{ request()->routeIs('admin.services.*') ? 'bg-blue-50 text-blue-700' : '' }}">
                            <x-icons name="services" size="w-4 h-4" />
                            <span>Services</span>
                        </a>
                        <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-700 rounded-md transition-colors {{ request()->routeIs('admin.products.*') ? 'bg-blue-50 text-blue-700' : '' }}">
                            <x-icons name="products" size="w-4 h-4" />
                            <span>Products</span>
                        </a>
                        <a href="{{ route('admin.training.index') }}" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-700 rounded-md transition-colors {{ request()->routeIs('admin.training.*') ? 'bg-blue-50 text-blue-700' : '' }}">
                            <x-icons name="training" size="w-4 h-4" />
                            <span>Training</span>
                        </a>
                    </div>
                </div>
                
                <!-- Blog Management -->
                <div x-data="{ blogOpen: false }">
                    <button @click="blogOpen = !blogOpen" class="w-full flex items-center justify-between px-3 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg transition-colors">
                        <div class="flex items-center gap-3">
                            <x-icons name="blog" size="w-5 h-5" />
                            <span x-show="open">Blog</span>
                        </div>
                        <x-icons name="chevron-right" size="w-4 h-4" x-show="open" :class="blogOpen ? 'rotate-90' : ''" class="transition-transform" />
                    </button>
                    
                    <div x-show="blogOpen && open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="ml-6 mt-2 space-y-1">
                        <a href="{{ route('admin.blog.categories.index') }}" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-700 rounded-md transition-colors {{ request()->routeIs('admin.blog.categories.*') ? 'bg-blue-50 text-blue-700' : '' }}">
                            <div class="w-4 h-4 rounded border border-gray-300 flex items-center justify-center">
                                <div class="w-2 h-2 bg-gray-400 rounded-full"></div>
                            </div>
                            <span>Categories</span>
                        </a>
                        <a href="{{ route('admin.blog.posts.index') }}" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-700 rounded-md transition-colors {{ request()->routeIs('admin.blog.posts.*') ? 'bg-blue-50 text-blue-700' : '' }}">
                            <x-icons name="blog" size="w-4 h-4" />
                            <span>Posts</span>
                        </a>
                    </div>
                </div>
                
                <!-- Contacts -->
                <a href="{{ route('admin.contacts.index') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded-lg transition-colors {{ request()->routeIs('admin.contacts.*') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-600' : '' }}">
                    <x-icons name="contacts" size="w-5 h-5" />
                    <span x-show="open">Contacts</span>
                </a>
            </nav>
        </aside>
        <div class="flex-1 flex flex-col">
            <header class="h-16 bg-white/95 backdrop-blur border-b border-blue-200/60 flex items-center justify-between px-6 sticky top-0 z-10">
                <div class="flex items-center gap-4">
                    <div class="text-gray-700 font-medium">{{ $header ?? 'Dashboard' }}</div>
                </div>
                
                <!-- Search Bar -->
                <div class="flex-1 max-w-md mx-8" x-data="{ searchOpen: false, searchQuery: '' }">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <x-icons name="search" size="w-4 h-4" class="text-gray-400" />
                        </div>
                        <input type="text" 
                               x-model="searchQuery"
                               @focus="searchOpen = true"
                               @blur="setTimeout(() => searchOpen = false, 200)"
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white/90 backdrop-blur-sm"
                               placeholder="Search or type command..."
                               x-transition:enter="transition ease-out duration-100"
                               x-transition:enter-start="opacity-0 scale-95"
                               x-transition:enter-end="opacity-100 scale-100">
                        
                        <!-- Search Results Dropdown -->
                        <div x-show="searchOpen && searchQuery.length > 0" 
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             class="absolute top-full left-0 right-0 mt-1 bg-white rounded-lg shadow-lg border border-gray-200 py-2 z-50">
                            <div class="px-4 py-2 text-sm text-gray-500 border-b border-gray-100">Quick Actions</div>
                            <a href="{{ route('admin.banners.create') }}" class="flex items-center px-4 py-2 text-sm hover:bg-gray-50">
                                <x-icons name="plus" size="w-4 h-4" class="text-gray-400 mr-3" />
                                Create Banner
                            </a>
                            <a href="{{ route('admin.blog.posts.create') }}" class="flex items-center px-4 py-2 text-sm hover:bg-gray-50">
                                <x-icons name="plus" size="w-4 h-4" class="text-gray-400 mr-3" />
                                Create Blog Post
                            </a>
                            <div class="px-4 py-2 text-sm text-gray-500 border-t border-gray-100 mt-1">Navigation</div>
                            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2 text-sm hover:bg-gray-50">
                                <x-icons name="dashboard" size="w-4 h-4" class="text-gray-400 mr-3" />
                                Dashboard
                            </a>
                            <a href="{{ route('admin.banners.index') }}" class="flex items-center px-4 py-2 text-sm hover:bg-gray-50">
                                <x-icons name="banners" size="w-4 h-4" class="text-gray-400 mr-3" />
                                Banners
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="flex items-center gap-4">
                    <!-- Theme Toggle -->
                    <button class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors" 
                            x-data="{ dark: false }"
                            @click="dark = !dark; document.documentElement.classList.toggle('dark')"
                            title="Toggle theme">
                        <x-icons name="moon" size="w-5 h-5" x-show="!dark" />
                        <x-icons name="sun" size="w-5 h-5" x-show="dark" />
                    </button>
                    
                    <!-- Notifications -->
                    <button class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors relative" 
                            title="Notifications">
                        <x-icons name="bell" size="w-5 h-5" />
                        <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full text-xs text-white flex items-center justify-center">3</span>
                    </button>
                    
                    <!-- User Menu -->
                    <div class="flex items-center gap-3" x-data="{ userMenuOpen: false }">
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-xs">
                                {{ substr(auth('admin')->user()->name ?? 'A', 0, 1) }}
                            </div>
                            <span class="hidden md:block">{{ auth('admin')->user()->name ?? '' }}</span>
                        </div>
                        
                        <button @click="userMenuOpen = !userMenuOpen" 
                                class="p-1 text-gray-600 hover:text-gray-900 transition-colors">
                            <x-icons name="chevron-down" size="w-4 h-4" />
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
                            <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                <x-icons name="user" size="w-4 h-4" class="mr-3" />
                                Profile
                            </a>
                            <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                <x-icons name="settings" size="w-4 h-4" class="mr-3" />
                                Settings
                            </a>
                            <div class="border-t border-gray-100 mt-1"></div>
                            <form method="POST" action="{{ route('admin.logout') }}" class="block">
                                @csrf
                                <button type="submit" class="w-full flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                    <x-icons name="logout" size="w-4 h-4" class="mr-3" />
                                    Logout
                                </button>
                            </form>
                        </div>
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
                                     class="fixed inset-0 bg-white/80 backdrop-blur-sm z-50 flex items-center justify-center">
                                    <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-8 text-center">
                                        <x-loading-spinner size="xl" color="blue" text="Loading..." />
                                    </div>
                                </div>
                                
                                <div class="rounded-xl bg-white/95 backdrop-blur border border-gray-200 shadow-sm p-4">
                                    {{ $slot }}
                                </div>
                            </div>
                        </main>
        </div>
    </div>
</body>
</html>


