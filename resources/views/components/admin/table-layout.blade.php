@props(['title', 'description', 'createRoute', 'createLabel', 'items', 'pagination' => null])

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
            <h2 class="text-xl font-semibold text-gray-800">{{ $title }}</h2>
            <p class="text-sm text-gray-600 mt-1">{{ $description }}</p>
        </div>
        <a href="{{ $createRoute }}" class="btn-primary flex items-center gap-2">
            <x-icons name="plus" size="w-4 h-4" />
            {{ $createLabel }}
        </a>
    </div>
    
    <!-- Loading State -->
    <div x-show="loading" x-transition>
        <x-loading-skeleton type="table" :count="5" />
    </div>
    
    <!-- Content State -->
    <div x-show="!loading" x-transition>
        @if($items->count() > 0)
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 sticky top-0 z-10">
                            <tr>
                                {{ $header }}
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($items as $index => $item)
                                <tr class="hover:bg-gray-50 {{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-50/50' }}" 
                                    x-data="{ showActions: false }"
                                    @mouseenter="showActions = true"
                                    @mouseleave="showActions = false">
                                    {{ $slot }}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            @if($pagination && $items->hasPages())
                <div class="mt-6">
                    {{ $pagination }}
                </div>
            @endif
        @else
            <div class="text-center py-12">
                <div class="mx-auto w-24 h-24 bg-gradient-to-br from-blue-100 to-blue-200 rounded-full flex items-center justify-center mb-4">
                    @if(isset($emptyIcon))
                        {!! $emptyIcon !!}
                    @else
                        <x-icons name="banners" size="w-12 h-12" class="text-blue-600" />
                    @endif
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">{{ $emptyTitle ?? 'No items found' }}</h3>
                <p class="text-gray-500 mb-6">{{ $emptyDescription ?? 'Get started by creating your first item.' }}</p>
                <a href="{{ $createRoute }}" class="btn-primary flex items-center gap-2 mx-auto">
                    <x-icons name="plus" size="w-4 h-4" />
                    {{ $createLabel }}
                </a>
            </div>
        @endif
    </div>
</div>
