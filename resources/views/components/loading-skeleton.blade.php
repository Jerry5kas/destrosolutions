@props(['type' => 'table', 'count' => 5])

@if($type === 'table')
    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
        <!-- Table Header Skeleton -->
        <div class="bg-gray-50 border-b border-gray-200 px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="skeleton-text w-32 h-5"></div>
                    <div class="skeleton-text w-24 h-4"></div>
                </div>
                <div class="skeleton-text w-24 h-8 rounded-md"></div>
            </div>
        </div>
        
        <!-- Table Rows Skeleton -->
        <div class="divide-y divide-gray-200">
            @for($i = 0; $i < $count; $i++)
                <div class="px-6 py-4">
                    <div class="flex items-center gap-4">
                        <div class="skeleton-avatar w-10 h-10"></div>
                        <div class="flex-1 space-y-2">
                            <div class="skeleton-text w-3/4 h-4"></div>
                            <div class="skeleton-text w-1/2 h-3"></div>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="skeleton-text w-16 h-6 rounded-full"></div>
                            <div class="skeleton-text w-8 h-8 rounded"></div>
                            <div class="skeleton-text w-8 h-8 rounded"></div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@elseif($type === 'cards')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @for($i = 0; $i < $count; $i++)
            <div class="bg-white border border-gray-200 rounded-xl p-6">
                <div class="flex items-start gap-4">
                    <div class="skeleton w-16 h-16 rounded-lg"></div>
                    <div class="flex-1 space-y-3">
                        <div class="skeleton-text w-3/4 h-5"></div>
                        <div class="skeleton-text w-full h-3"></div>
                        <div class="skeleton-text w-2/3 h-3"></div>
                        <div class="flex items-center gap-2 mt-4">
                            <div class="skeleton-text w-16 h-6 rounded-full"></div>
                            <div class="skeleton-text w-8 h-8 rounded"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
@elseif($type === 'list')
    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
        @for($i = 0; $i < $count; $i++)
            <div class="px-6 py-4 {{ $i < $count - 1 ? 'border-b border-gray-200' : '' }}">
                <div class="flex items-center gap-4">
                    <div class="skeleton-avatar w-12 h-12"></div>
                    <div class="flex-1 space-y-2">
                        <div class="skeleton-text w-2/3 h-5"></div>
                        <div class="skeleton-text w-1/2 h-4"></div>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="skeleton-text w-20 h-6 rounded-full"></div>
                        <div class="skeleton-text w-8 h-8 rounded"></div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
@elseif($type === 'metric')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @for($i = 0; $i < $count; $i++)
            <div class="bg-white border border-gray-200 rounded-xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="skeleton-text w-24 h-4"></div>
                    <div class="skeleton-text w-12 h-4 rounded"></div>
                </div>
                <div class="skeleton-text w-16 h-8 mb-2"></div>
                <div class="skeleton-text w-20 h-3"></div>
            </div>
        @endfor
    </div>
@endif
