@props(['item' => null, 'type' => 'content'])

<div class="bg-white rounded-md overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 flex flex-col h-[32rem] group cursor-pointer content-card"
     data-item='{!! json_encode($item) !!}'
     data-type="{{ $type }}">
    <div class="relative">
        @if($item && $item->image)
            <img src="{{ Storage::url($item->image) }}"
                 alt="{{ $item->title }}"
                 class="w-full h-60 object-cover">
        @else
            <img src="https://images.unsplash.com/photo-1501594907352-04cda38ebc29?q=80&w=800"
                 alt=""
                 class="w-full h-60 object-cover">
        @endif
        @if($item && $item->subtitle)
            <div class="absolute top-3 right-3 bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wide shadow-md">
                {{ $item->subtitle }}
            </div>
        @endif
        <div class="absolute -bottom-12 right-6 bg-gray-800 text-white rounded-full w-24 h-24 flex flex-col items-center justify-center text-center shadow-md space-y-3 group-hover:rotate-[20deg] transition-transform duration-300 ease-in-out">
            <span class="text-lg font-bold leading-none">{{ $item ? $item->created_at->format('d') : '05' }}</span>
            <span class="text-[10px] uppercase tracking-wide">{{ $item ? $item->created_at->format('M Y') : 'Oct, 15' }}</span>
        </div>
    </div>
    <!-- Content fills the remaining space -->
    <div class="flex flex-col justify-center items-center pt-12 pb-8 px-6 flex-grow">
        <div>
            <h3 class="text-lg font-bold text-gray-800 mb-3 line-clamp-2">
                {{ $item ? $item->title : 'Default Title' }}
            </h3>
            <p class="text-gray-500 text-sm leading-relaxed line-clamp-2 mb-3">
                {{ $item ? Str::limit($item->description, 120) : 'Default description text.' }}
            </p>
            <ul class="space-y-2 text-sm text-gray-700 text-xs">
                @if($item && isset($item->key_features) && count($item->key_features) > 0)
                    @foreach(array_slice($item->key_features, 0, 3) as $feature)
                        <li class="flex items-start">
                            <svg class="w-3.5 h-3.5 mt-0.5 mr-3 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>{{ Str::limit($feature, 60) }}</span>
                        </li>
                    @endforeach
                @elseif($item && isset($item->features) && count($item->features) > 0)
                    @foreach(array_slice($item->features, 0, 3) as $feature)
                        <li class="flex items-start">
                            <svg class="w-3.5 h-3.5 mt-0.5 mr-3 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>{{ Str::limit($feature, 60) }}</span>
                        </li>
                    @endforeach
                @else
                    <li class="flex items-start">
                        <svg class="w-3.5 h-3.5 mt-0.5 mr-3 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Professional service delivery</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-3.5 h-3.5 mt-0.5 mr-3 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Industry expertise</span>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
