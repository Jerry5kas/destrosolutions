<x-admin-layout :title="'Dashboard'" :header="'Dashboard'">
    <div x-data="{ 
        loading: false,
        activeTab: 'overview',
        init() {
            this.loading = true;
            setTimeout(() => {
                this.loading = false;
            }, 1500);
        }
    }">
        <!-- Loading State -->
        <div x-show="loading" x-transition>
            <x-loading-skeleton type="metric" :count="6" />
            <div class="mt-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="glass-card rounded-xl p-6">
                    <div class="skeleton-text w-32 h-6 mb-4"></div>
                    <div class="h-48 bg-white/10 rounded"></div>
                </div>
                <div class="glass-card rounded-xl p-6">
                    <div class="skeleton-text w-40 h-6 mb-4"></div>
                    <div class="h-48 bg-white/10 rounded"></div>
                </div>
            </div>
        </div>
        
        <!-- Content State -->
        <div x-show="!loading" x-transition>
            
            <div class="flex items-center justify-between mb-8">
                <div>
                    <div class="text-sm text-white/60">Welcome back,</div>
                    <div class="text-3xl font-bold text-white">{{ auth('admin')->user()->name }}</div>
                    <div class="text-sm text-white/70 mt-1">Here's what's happening with your platform today</div>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('admin.banners.create') }}" class="glass-button px-4 py-2 rounded-lg flex items-center gap-2 hover:bg-white/20 transition-all">
                        <x-icons name="plus" size="w-4 h-4" />
                        New Banner
                    </a>
                    <a href="{{ route('admin.blog.posts.create') }}" class="bg-gradient-to-r from-purple-500/80 to-purple-600/80 backdrop-blur-sm text-white px-4 py-2 rounded-lg flex items-center gap-2 hover:from-purple-500 hover:to-purple-600 transition-all border border-purple-400/30">
                        <x-icons name="plus" size="w-4 h-4" />
                        New Post
                    </a>
                </div>
            </div>

            <!-- Professional Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-6 mb-8">
                <!-- Quantum Solutions -->
                <div class="group relative overflow-hidden glass-card rounded-2xl p-6 hover:bg-white/10 transition-all duration-500 border border-blue-500/20 hover:border-blue-400/40">
                    <!-- Background Gradient -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 via-transparent to-blue-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <!-- Content -->
                    <div class="relative z-10">
                        <!-- Header with Logo and Count -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-to-br from-blue-500/20 to-blue-600/20 backdrop-blur-sm rounded-xl border border-blue-400/20">
                                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                            </div>
                            <div class="text-3xl font-bold text-white">{{ $stats['quantum'] ?? 0 }}</div>
                        </div>
                        
                        <!-- Bottom Text -->
                        <div class="space-y-1">
                            <h3 class="text-sm font-semibold text-blue-400 tracking-wide">Quantum Solutions</h3>
                            <p class="text-xs text-white/60 font-medium">Advanced Computing</p>
                        </div>
                    </div>
                </div>

                <!-- Services -->
                <div class="group relative overflow-hidden glass-card rounded-2xl p-6 hover:bg-white/10 transition-all duration-500 border border-cyan-500/20 hover:border-cyan-400/40">
                    <!-- Background Gradient -->
                    <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 via-transparent to-cyan-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <!-- Content -->
                    <div class="relative z-10">
                        <!-- Header with Logo and Count -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-to-br from-cyan-500/20 to-cyan-600/20 backdrop-blur-sm rounded-xl border border-cyan-400/20">
                                <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                </svg>
                            </div>
                            <div class="text-3xl font-bold text-white">{{ $stats['services'] ?? 0 }}</div>
                        </div>
                        
                        <!-- Bottom Text -->
                        <div class="space-y-1">
                            <h3 class="text-sm font-semibold text-cyan-400 tracking-wide">Services</h3>
                            <p class="text-xs text-white/60 font-medium">Professional Services</p>
                        </div>
                    </div>
                </div>

                <!-- Products -->
                <div class="group relative overflow-hidden glass-card rounded-2xl p-6 hover:bg-white/10 transition-all duration-500 border border-emerald-500/20 hover:border-emerald-400/40">
                    <!-- Background Gradient -->
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 via-transparent to-emerald-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <!-- Content -->
                    <div class="relative z-10">
                        <!-- Header with Logo and Count -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-to-br from-emerald-500/20 to-emerald-600/20 backdrop-blur-sm rounded-xl border border-emerald-400/20">
                                <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                            <div class="text-3xl font-bold text-white">{{ $stats['products'] ?? 0 }}</div>
                        </div>
                        
                        <!-- Bottom Text -->
                        <div class="space-y-1">
                            <h3 class="text-sm font-semibold text-emerald-400 tracking-wide">Products</h3>
                            <p class="text-xs text-white/60 font-medium">Innovation Solutions</p>
                        </div>
                    </div>
                </div>

                <!-- Training -->
                <div class="group relative overflow-hidden glass-card rounded-2xl p-6 hover:bg-white/10 transition-all duration-500 border border-amber-500/20 hover:border-amber-400/40">
                    <!-- Background Gradient -->
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 via-transparent to-amber-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <!-- Content -->
                    <div class="relative z-10">
                        <!-- Header with Logo and Count -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-to-br from-amber-500/20 to-amber-600/20 backdrop-blur-sm rounded-xl border border-amber-400/20">
                                <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <div class="text-3xl font-bold text-white">{{ $stats['training'] ?? 0 }}</div>
                        </div>
                        
                        <!-- Bottom Text -->
                        <div class="space-y-1">
                            <h3 class="text-sm font-semibold text-amber-400 tracking-wide">Training</h3>
                            <p class="text-xs text-white/60 font-medium">Learning Programs</p>
                        </div>
                    </div>
                </div>

                <!-- Blog Posts -->
                <div class="group relative overflow-hidden glass-card rounded-2xl p-6 hover:bg-white/10 transition-all duration-500 border border-violet-500/20 hover:border-violet-400/40">
                    <!-- Background Gradient -->
                    <div class="absolute inset-0 bg-gradient-to-br from-violet-500/5 via-transparent to-violet-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <!-- Content -->
                    <div class="relative z-10">
                        <!-- Header with Logo and Count -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-to-br from-violet-500/20 to-violet-600/20 backdrop-blur-sm rounded-xl border border-violet-400/20">
                                <svg class="w-6 h-6 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                </svg>
                            </div>
                            <div class="text-3xl font-bold text-white">{{ $stats['blog_posts'] ?? 0 }}</div>
                        </div>
                        
                        <!-- Bottom Text -->
                        <div class="space-y-1">
                            <h3 class="text-sm font-semibold text-violet-400 tracking-wide">Blog Posts</h3>
                            <p class="text-xs text-white/60 font-medium">Content Articles</p>
                        </div>
                    </div>
                </div>

                <!-- Contacts -->
                <div class="group relative overflow-hidden glass-card rounded-2xl p-6 hover:bg-white/10 transition-all duration-500 border border-rose-500/20 hover:border-rose-400/40">
                    <!-- Background Gradient -->
                    <div class="absolute inset-0 bg-gradient-to-br from-rose-500/5 via-transparent to-rose-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <!-- Content -->
                    <div class="relative z-10">
                        <!-- Header with Logo and Count -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gradient-to-br from-rose-500/20 to-rose-600/20 backdrop-blur-sm rounded-xl border border-rose-400/20">
                                <svg class="w-6 h-6 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="text-3xl font-bold text-white">{{ $stats['contacts'] ?? 0 }}</div>
                        </div>
                        
                        <!-- Bottom Text -->
                        <div class="space-y-1">
                            <h3 class="text-sm font-semibold text-rose-400 tracking-wide">Contacts</h3>
                            <p class="text-xs text-white/60 font-medium">Customer Inquiries</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Latest Blog Posts Section -->
            <div class="glass-card rounded-2xl p-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-white">Latest Blog Posts</h2>
                    <a href="{{ route('admin.blog.posts.index') }}" class="text-blue-400 hover:text-blue-300 text-sm font-medium flex items-center gap-2">
                        View All
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                
                <div class="text-center py-12">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500/20 to-purple-600/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">Start Creating Content</h3>
                    <p class="text-white/60 mb-6">Create your first blog post to engage with your audience</p>
                    <a href="{{ route('admin.blog.posts.create') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500/80 to-purple-600/80 backdrop-blur-sm text-white px-6 py-3 rounded-xl hover:from-blue-500 hover:to-purple-600 transition-all border border-blue-400/30">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Create New Post
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>