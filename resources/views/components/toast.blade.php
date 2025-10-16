<div x-data="{ show: true }" x-init="setTimeout(()=>show=false, 3000)" x-show="show" x-transition.opacity.duration.250ms
     class="fixed bottom-6 right-6 z-50 rounded-lg border border-blue-200 bg-white/95 backdrop-blur px-4 py-3 shadow-md text-sm text-gray-700">
    <div class="flex items-start gap-3">
        <svg class="h-5 w-5 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 9v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <div>{{ $slot }}</div>
        <button class="ml-4 text-gray-500 hover:text-gray-700" @click="show=false">×</button>
    </div>
</div>


