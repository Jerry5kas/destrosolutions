@props(['item', 'editRoute', 'deleteRoute', 'showImage' => false, 'showStatus' => true])

<td class="px-6 py-4 whitespace-nowrap">
    @if($showImage && $item->image)
        <img src="{{ Storage::url($item->image) }}" class="h-12 w-12 object-cover rounded-lg border border-gray-200 shadow-sm" />
    @elseif($showImage)
        <div class="h-12 w-12 bg-gradient-to-br from-gray-100 to-gray-200 rounded-lg border border-gray-200 flex items-center justify-center">
            <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
        </div>
    @else
        {{ $slot }}
    @endif
</td>

<td class="px-6 py-4">
    <div class="text-sm font-medium text-gray-900">{{ $item->title ?? $item->name }}</div>
    @if($item->description)
        <div class="text-sm text-gray-500">{{ Str::limit($item->description, 60) }}</div>
    @endif
</td>

@if($showStatus)
    <td class="px-6 py-4 whitespace-nowrap">
        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $item->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
            <div class="w-2 h-2 rounded-full mr-1.5 {{ $item->is_active ? 'bg-green-400' : 'bg-red-400' }}"></div>
            {{ $item->is_active ? 'Active' : 'Inactive' }}
        </span>
    </td>
@endif

<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->created_at->format('M d, Y') }}</td>

<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
    <div class="flex items-center justify-end gap-2" x-show="showActions" x-transition>
        <a href="{{ $editRoute }}" 
           class="inline-flex items-center px-3 py-1.5 border border-blue-300 rounded-md text-xs font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors">
            <x-icons name="edit" size="w-3 h-3" class="mr-1" />
            Edit
        </a>
        <form method="POST" action="{{ $deleteRoute }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this item?')">
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
