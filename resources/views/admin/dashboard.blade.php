<x-admin-layout :title="'Dashboard'" :header="'Dashboard'">
    <div x-data="{ 
        loading: false,
        init() {
            // Show loading on page load
            this.loading = true;
            setTimeout(() => {
                this.loading = false;
            }, 1500);
        }
    }">
        <!-- Loading State -->
        <div x-show="loading" x-transition>
            <x-loading-skeleton type="metric" :count="4" />
            <div class="mt-6 grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 bg-white border border-gray-200 rounded-xl p-6">
                    <div class="skeleton-text w-32 h-6 mb-4"></div>
                    <div class="h-48 bg-gray-100 rounded"></div>
                </div>
                <div class="bg-white border border-gray-200 rounded-xl p-6">
                    <div class="skeleton-text w-40 h-6 mb-4"></div>
                    <div class="w-32 h-32 mx-auto bg-gray-100 rounded-full"></div>
                </div>
            </div>
        </div>
        
        <!-- Content State -->
        <div x-show="!loading" x-transition>
            <div class="flex items-center justify-between mb-6">
                <div>
                    <div class="text-sm text-gray-500">Welcome back,</div>
                    <div class="text-2xl font-semibold text-blue-700">{{ auth('admin')->user()->name }}</div>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('admin.banners.create') }}" class="btn-primary flex items-center gap-2">
                        <x-icons name="plus" size="w-4 h-4" />
                        New Banner
                    </a>
                    <a href="{{ route('admin.blog.posts.create') }}" class="btn-primary flex items-center gap-2">
                        <x-icons name="plus" size="w-4 h-4" />
                        New Post
                    </a>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Metric Cards -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                    <div class="flex justify-between items-center mb-2">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="text-green-500 text-xs font-semibold bg-green-100 px-2 py-1 rounded-full">+12%</span>
                    </div>
                    <h3 class="text-sm font-medium text-gray-600 mb-1">Total Banners</h3>
                    <p class="text-3xl font-bold text-gray-900">{{ $stats['banners'] }}</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                    <div class="flex justify-between items-center mb-2">
                        <div class="p-2 bg-purple-100 rounded-lg">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <span class="text-green-500 text-xs font-semibold bg-green-100 px-2 py-1 rounded-full">+8%</span>
                    </div>
                    <h3 class="text-sm font-medium text-gray-600 mb-1">Total Services</h3>
                    <p class="text-3xl font-bold text-gray-900">{{ $stats['services'] }}</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                    <div class="flex justify-between items-center mb-2">
                        <div class="p-2 bg-green-100 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <span class="text-red-500 text-xs font-semibold bg-red-100 px-2 py-1 rounded-full">-2%</span>
                    </div>
                    <h3 class="text-sm font-medium text-gray-600 mb-1">Total Products</h3>
                    <p class="text-3xl font-bold text-gray-900">{{ $stats['products'] }}</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                    <div class="flex justify-between items-center mb-2">
                        <div class="p-2 bg-orange-100 rounded-lg">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="text-green-500 text-xs font-semibold bg-green-100 px-2 py-1 rounded-full">+15%</span>
                    </div>
                    <h3 class="text-sm font-medium text-gray-600 mb-1">Total Contacts</h3>
                    <p class="text-3xl font-bold text-gray-900">{{ $stats['contacts'] }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Chart Widget -->
                <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-sm border border-gray-200" x-data="{ values:[120,340,220,180,260,140,300,90,210,380,240,80] }">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-800">Monthly Sales</h3>
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                            <span class="text-sm text-gray-600">Sales</span>
                        </div>
                    </div>
                    <div class="h-48 flex items-end justify-around">
                        <template x-for="(v, index) in values" :key="index">
                            <div class="flex flex-col items-center">
                                <div class="w-6 bg-gradient-to-t from-blue-500 to-blue-400 rounded-t-md shadow-sm" 
                                     :style="`height:${(v/400)*120}px`"
                                     x-data="{ hover: false }"
                                     @mouseenter="hover = true"
                                     @mouseleave="hover = false">
                                </div>
                                <span class="text-xs text-gray-500 mt-2 font-medium" x-text="index + 1"></span>
                            </div>
                        </template>
                    </div>
                </div>
                
                <!-- Progress Ring Widget -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 flex flex-col items-center justify-center" x-data="{ percent:75.55 }">
                    <h3 class="text-lg font-semibold text-gray-800 mb-6">Monthly Target</h3>
                    <div class="relative w-32 h-32 mb-4">
                        <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">
                            <circle cx="50" cy="50" r="45" stroke="#e5e7eb" stroke-width="10" fill="none"/>
                            <circle cx="50" cy="50" r="45" stroke="#2563eb" stroke-width="10" fill="none" stroke-linecap="round"
                                :stroke-dasharray="`${percent*2.83} 283`"/>
                        </svg>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-2xl font-bold text-blue-600" x-text="`${percent}%`"></span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 text-center">Monthly target achieved</p>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>