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
            <!-- Header Section -->
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

            <!-- Stats Overview Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6 mb-8">
                <!-- Quantum Solutions -->
                <div class="glass-card rounded-xl p-6 hover:bg-white/10 transition-all duration-300 border-blue-400/20">
                    <div class="flex justify-between items-center mb-3">
                        <div class="p-3 bg-blue-500/20 backdrop-blur-sm rounded-lg">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </div>
                        <span class="text-blue-400 text-xs font-semibold bg-blue-500/20 backdrop-blur-sm px-2 py-1 rounded-full">+24%</span>
                    </div>
                    <h3 class="text-sm font-medium text-blue-400 mb-1">Quantum Solutions</h3>
                    <p class="text-2xl font-bold text-white">{{ $stats['quantum'] ?? 0 }}</p>
                    <p class="text-xs text-white/60 mt-1">Advanced computing</p>
                </div>

                <!-- Services -->
                <div class="glass-card rounded-xl p-6 hover:bg-white/10 transition-all duration-300 border-cyan-400/20">
                    <div class="flex justify-between items-center mb-3">
                        <div class="p-3 bg-cyan-500/20 backdrop-blur-sm rounded-lg">
                            <svg class="w-6 h-6 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                        </div>
                        <span class="text-cyan-400 text-xs font-semibold bg-cyan-500/20 backdrop-blur-sm px-2 py-1 rounded-full">+18%</span>
                    </div>
                    <h3 class="text-sm font-medium text-cyan-400 mb-1">Services</h3>
                    <p class="text-2xl font-bold text-white">{{ $stats['services'] ?? 0 }}</p>
                    <p class="text-xs text-white/60 mt-1">Professional services</p>
                </div>

                <!-- Products -->
                <div class="glass-card rounded-xl p-6 hover:bg-white/10 transition-all duration-300 border-emerald-400/20">
                    <div class="flex justify-between items-center mb-3">
                        <div class="p-3 bg-emerald-100 rounded-lg">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <span class="text-emerald-600 text-xs font-semibold bg-emerald-100 px-2 py-1 rounded-full">-5%</span>
                    </div>
                    <h3 class="text-sm font-medium text-emerald-600 mb-1">Products</h3>
                    <p class="text-2xl font-bold text-emerald-900">{{ $stats['products'] ?? 0 }}</p>
                    <p class="text-xs text-emerald-500 mt-1">Innovation catalog</p>
                </div>

                <!-- Training Programs -->
                <div class="bg-gradient-to-br from-amber-50 to-amber-100 p-6 rounded-xl border border-amber-200 hover:shadow-md hover:border-amber-300 transition-all">
                    <div class="flex justify-between items-center mb-3">
                        <div class="p-3 bg-amber-100 rounded-lg">
                            <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <span class="text-amber-600 text-xs font-semibold bg-amber-100 px-2 py-1 rounded-full">+32%</span>
                    </div>
                    <h3 class="text-sm font-medium text-amber-600 mb-1">Training</h3>
                    <p class="text-2xl font-bold text-amber-900">{{ $stats['training'] ?? 0 }}</p>
                    <p class="text-xs text-amber-500 mt-1">Learning programs</p>
                </div>

                <!-- Blog Posts -->
                <div class="bg-gradient-to-br from-violet-50 to-violet-100 p-6 rounded-xl border border-violet-200 hover:shadow-md hover:border-violet-300 transition-all">
                    <div class="flex justify-between items-center mb-3">
                        <div class="p-3 bg-violet-100 rounded-lg">
                            <svg class="w-6 h-6 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                        </div>
                        <span class="text-violet-600 text-xs font-semibold bg-violet-100 px-2 py-1 rounded-full">+45%</span>
                    </div>
                    <h3 class="text-sm font-medium text-violet-600 mb-1">Blog Posts</h3>
                    <p class="text-2xl font-bold text-violet-900">{{ $stats['blog_posts'] ?? 0 }}</p>
                    <p class="text-xs text-violet-500 mt-1">Content articles</p>
                </div>

                <!-- Contacts -->
                <div class="bg-gradient-to-br from-rose-50 to-rose-100 p-6 rounded-xl border border-rose-200 hover:shadow-md hover:border-rose-300 transition-all">
                    <div class="flex justify-between items-center mb-3">
                        <div class="p-3 bg-rose-100 rounded-lg">
                            <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="text-rose-600 text-xs font-semibold bg-rose-100 px-2 py-1 rounded-full">+12%</span>
                    </div>
                    <h3 class="text-sm font-medium text-rose-600 mb-1">Contacts</h3>
                    <p class="text-2xl font-bold text-rose-900">{{ $stats['contacts'] ?? 0 }}</p>
                    <p class="text-xs text-rose-500 mt-1">New inquiries</p>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Blog Section -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Latest Blog Posts -->
                    <div class="bg-white rounded-xl border border-gray-200 p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-bold text-gray-900">Latest Blog Posts</h3>
                            <a href="{{ route('admin.blog.posts.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View All</a>
                        </div>
                        @if(isset($latestPosts) && $latestPosts->count() > 0)
                            <div class="space-y-4">
                                @foreach($latestPosts as $post)
                                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                        @if($post->image)
                                            <img src="{{ Storage::url($post->image) }}" class="w-16 h-16 object-cover rounded-lg" alt="{{ $post->title }}">
                                        @else
                                            <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center">
                                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                                </svg>
                                            </div>
                                        @endif
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-gray-900 mb-1">{{ Str::limit($post->title, 50) }}</h4>
                                            <p class="text-sm text-gray-600 mb-2">{{ Str::limit($post->description, 80) }}</p>
                                            <div class="flex items-center gap-4 text-xs text-gray-500">
                                                <span class="flex items-center gap-1">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                                    </svg>
                                                    {{ $post->category->name ?? 'Uncategorized' }}
                                                </span>
                                                <span class="flex items-center gap-1">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    {{ $post->created_at->diffForHumans() }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            @if($post->is_active)
                                                <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Active</span>
                                            @else
                                                <span class="px-2 py-1 bg-gray-100 text-gray-800 text-xs rounded-full">Draft</span>
                                            @endif
                                            <a href="{{ route('admin.blog.posts.edit', $post) }}" class="text-blue-600 hover:text-blue-800">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-medium text-gray-900 mb-2">No blog posts yet</h4>
                                <p class="text-gray-600 mb-4">Start creating content to engage your audience</p>
                                <a href="{{ route('admin.blog.posts.create') }}" class="btn-primary">Create First Post</a>
                            </div>
                        @endif
                    </div>

                    <!-- SDV Analytics Chart -->
                    <div class="bg-white rounded-xl border border-gray-200 p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-bold text-gray-900">Software Defined Vehicles Analytics</h3>
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 bg-gray-400 rounded-full"></div>
                                <span class="text-sm text-gray-600">SDV Solutions</span>
                            </div>
                        </div>
                        <div class="h-64" x-data="{ 
                            values: [85, 92, 78, 96, 88, 94, 89, 91, 87, 93, 90, 95],
                            months: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                        }">
                            <div class="flex items-end justify-between h-full pb-4">
                                <template x-for="(v, index) in values" :key="index">
                                    <div class="flex flex-col items-center group" x-data="{ hover: false }">
                                        <div class="relative">
                                            <div class="w-8 bg-gray-300 hover:bg-gray-400 rounded-t-md transition-all duration-300" 
                                                 :style="`height:${(v/100)*200}px`"
                                                 @mouseenter="hover = true"
                                                 @mouseleave="hover = false">
                                            </div>
                                            <div x-show="hover" class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded" x-text="v + '%'"></div>
                                        </div>
                                        <span class="text-xs text-gray-500 mt-2 font-medium" x-text="months[index]"></span>
                                    </div>
                                </template>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-4 mt-6 pt-6 border-t border-gray-200">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-700">94%</div>
                                <div class="text-sm text-gray-600">System Efficiency</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-700">1,247</div>
                                <div class="text-sm text-gray-600">Active Vehicles</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-700">99.2%</div>
                                <div class="text-sm text-gray-600">Uptime</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Quick Actions -->
                    <div class="bg-white rounded-xl border border-gray-200 p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Quick Actions</h3>
                        <div class="space-y-3">
                            <a href="{{ route('admin.quantum.create') }}" class="flex items-center gap-3 p-3 bg-slate-50 hover:bg-slate-100 rounded-lg transition-colors border border-slate-100">
                                <div class="p-2 bg-slate-500 rounded-lg">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </div>
                                <span class="font-medium text-gray-900">Add Quantum Solution</span>
                            </a>
                            <a href="{{ route('admin.services.create') }}" class="flex items-center gap-3 p-3 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors border border-blue-100">
                                <div class="p-2 bg-blue-500 rounded-lg">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </div>
                                <span class="font-medium text-gray-900">Add Service</span>
                            </a>
                            <a href="{{ route('admin.training.create') }}" class="flex items-center gap-3 p-3 bg-amber-50 hover:bg-amber-100 rounded-lg transition-colors border border-amber-100">
                                <div class="p-2 bg-amber-500 rounded-lg">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </div>
                                <span class="font-medium text-gray-900">Add Training</span>
                            </a>
                            <a href="{{ route('admin.contacts.index') }}" class="flex items-center gap-3 p-3 bg-rose-50 hover:bg-rose-100 rounded-lg transition-colors border border-rose-100">
                                <div class="p-2 bg-rose-500 rounded-lg">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                </div>
                                <span class="font-medium text-gray-900">View Messages</span>
                            </a>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="bg-white rounded-xl border border-gray-200 p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Recent Activity</h3>
                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <div class="p-2 bg-green-100 rounded-lg">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">New blog post published</p>
                                    <p class="text-xs text-gray-500">2 hours ago</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="p-2 bg-blue-100 rounded-lg">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">New contact inquiry</p>
                                    <p class="text-xs text-gray-500">4 hours ago</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="p-2 bg-purple-100 rounded-lg">
                                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">Service updated</p>
                                    <p class="text-xs text-gray-500">1 day ago</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- System Status -->
                    <div class="bg-white rounded-xl border border-gray-200 p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">System Status</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Database</span>
                                <span class="flex items-center gap-2">
                                    <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                    <span class="text-sm font-medium text-green-600">Healthy</span>
                                </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Storage</span>
                                <span class="flex items-center gap-2">
                                    <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>
                                    <span class="text-sm font-medium text-yellow-600">75% Used</span>
                                </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">API Response</span>
                                <span class="flex items-center gap-2">
                                    <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                    <span class="text-sm font-medium text-green-600">145ms</span>
                                </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Uptime</span>
                                <span class="flex items-center gap-2">
                                    <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                    <span class="text-sm font-medium text-green-600">99.9%</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>