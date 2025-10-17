<x-admin-layout :title="'Banners'" :header="'Banners'">
    <div x-data="{ 
        loading: false,
        init() {
            // Show loading on page load
            this.loading = true;
            setTimeout(() => {
                this.loading = false;
            }, 1000);
        }
    }">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-semibold text-white">Banners</h2>
                <p class="text-sm text-white/70 mt-1">Manage your banner content</p>
            </div>
            <a href="{{ route('admin.banners.create') }}" class="glass-button px-4 py-2 rounded-lg flex items-center gap-2 hover:bg-white/20 transition-all">
                <x-icons name="plus" size="w-4 h-4" />
                Create New
            </a>
        </div>
        
        <!-- Loading State -->
        <div x-show="loading" x-transition>
            <x-loading-skeleton type="table" :count="5" />
        </div>
        
        <!-- Content State -->
        <div x-show="!loading" x-transition>
            @if($banners->count() > 0)
                <div class="glass-table rounded-xl overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-white/10">
                            <thead class="bg-white/5 backdrop-blur-sm sticky top-0 z-10">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white/70 uppercase tracking-wider">Image</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white/70 uppercase tracking-wider">Title</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white/70 uppercase tracking-wider">Page</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white/70 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white/70 uppercase tracking-wider">Created</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-white/70 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white/5 backdrop-blur-sm divide-y divide-white/10">
                                @foreach($banners as $index => $banner)
                                    <tr class="hover:bg-white/10 {{ $index % 2 === 0 ? 'bg-white/5' : 'bg-white/10' }}" 
                                        x-data="{ showActions: false }"
                                        @mouseenter="showActions = true"
                                        @mouseleave="showActions = false">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($banner->image)
                                                <img src="{{ Storage::url($banner->image) }}" class="h-12 w-12 object-cover rounded-lg border border-white/20 shadow-sm" />
                                            @else
                                                <div class="h-12 w-12 bg-gradient-to-br from-white/10 to-white/20 rounded-lg border border-white/20 flex items-center justify-center">
                                                    <svg class="h-6 w-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-medium text-white">{{ $banner->title }}</div>
                                            @if($banner->slogan)
                                                <div class="text-sm text-white/70">{{ $banner->slogan }}</div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-500/20 backdrop-blur-sm text-blue-400 border border-blue-400/30">
                                                {{ ucfirst($banner->page) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $banner->is_active ? 'bg-green-500/20 text-green-400 border border-green-400/30' : 'bg-red-500/20 text-red-400 border border-red-400/30' }} backdrop-blur-sm">
                                                <div class="w-2 h-2 rounded-full mr-1.5 {{ $banner->is_active ? 'bg-green-400' : 'bg-red-400' }}"></div>
                                                {{ $banner->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-white/70">{{ $banner->created_at->format('M d, Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex items-center justify-end gap-2" x-show="showActions" x-transition>
                                                <a href="{{ route('admin.banners.edit', $banner) }}" 
                                                   class="inline-flex items-center px-3 py-1.5 border border-blue-400/30 rounded-md text-xs font-medium text-blue-400 bg-blue-500/10 backdrop-blur-sm hover:bg-blue-500/20 transition-colors">
                                                    <x-icons name="edit" size="w-3 h-3" class="mr-1" />
                                                    Edit
                                                </a>
                                                <form method="POST" action="{{ route('admin.banners.destroy', $banner) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this banner?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="inline-flex items-center px-3 py-1.5 border border-red-400/30 rounded-md text-xs font-medium text-red-400 bg-red-500/10 backdrop-blur-sm hover:bg-red-500/20 transition-colors">
                                                        <x-icons name="delete" size="w-3 h-3" class="mr-1" />
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                @if($banners->hasPages())
                    <div class="mt-6">
                        {{ $banners->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-12">
                    <div class="mx-auto w-24 h-24 bg-gradient-to-br from-blue-500/20 to-blue-600/20 backdrop-blur-sm rounded-full flex items-center justify-center mb-4 border border-blue-400/30">
                        <svg class="h-12 w-12 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-white mb-2">No banners found</h3>
                    <p class="text-white/70 mb-6">Get started by creating your first banner to showcase your content.</p>
                    <a href="{{ route('admin.banners.create') }}" class="glass-button px-4 py-2 rounded-lg flex items-center gap-2 hover:bg-white/20 transition-all">
                        <x-icons name="plus" size="w-4 h-4" />
                        Create New Banner
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>