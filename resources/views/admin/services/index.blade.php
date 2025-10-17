<x-admin-layout :title="'Services'" :header="'Services'">
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
                <h2 class="text-xl font-semibold text-gray-800">Services</h2>
                <p class="text-sm text-gray-600 mt-1">Manage your services content</p>
            </div>
            <a href="{{ route('admin.services.create') }}" class="btn-primary flex items-center gap-2">
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
            @if($services->count() > 0)
                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 sticky top-0 z-10">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($services as $index => $item)
                                    <tr class="hover:bg-gray-50 {{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-50/50' }}" 
                                        x-data="{ showActions: false }"
                                        @mouseenter="showActions = true"
                                        @mouseleave="showActions = false">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($item->image)
                                                <img src="{{ Storage::url($item->image) }}" class="h-12 w-12 object-cover rounded-lg border border-gray-200 shadow-sm" />
                                            @else
                                                <div class="h-12 w-12 bg-gradient-to-br from-gray-100 to-gray-200 rounded-lg border border-gray-200 flex items-center justify-center">
                                                    <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $item->title }}</div>
                                            @if($item->key_features && count($item->key_features) > 0)
                                                <div class="text-sm text-gray-500">{{ count($item->key_features) }} key features</div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900 max-w-xs truncate">{{ Str::limit($item->description, 100) }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $item->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                <div class="w-2 h-2 rounded-full mr-1.5 {{ $item->is_active ? 'bg-green-400' : 'bg-red-400' }}"></div>
                                                {{ $item->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->created_at->format('M d, Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex items-center justify-end gap-2" x-show="showActions" x-transition>
                                                <a href="{{ route('admin.services.edit', $item) }}" 
                                                   class="inline-flex items-center px-3 py-1.5 border border-blue-300 rounded-md text-xs font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors">
                                                    <x-icons name="edit" size="w-3 h-3" class="mr-1" />
                                                    Edit
                                                </a>
                                                <form method="POST" action="{{ route('admin.services.destroy', $item) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this service?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="inline-flex items-center px-3 py-1.5 border border-red-300 rounded-md text-xs font-medium text-red-700 bg-red-50 hover:bg-red-100 transition-colors">
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
                
                @if($services->hasPages())
                    <div class="mt-6">
                        {{ $services->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-12">
                    <div class="mx-auto w-24 h-24 bg-gradient-to-br from-blue-100 to-blue-200 rounded-full flex items-center justify-center mb-4">
                        <svg class="h-12 w-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No services found</h3>
                    <p class="text-gray-500 mb-6">Get started by creating your first service to showcase your offerings.</p>
                    <a href="{{ route('admin.services.create') }}" class="btn-primary flex items-center gap-2">
                        <x-icons name="plus" size="w-4 h-4" />
                        Create New Service
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>