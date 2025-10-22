@props(['subtitles' => [], 'currentSubtitle' => null, 'baseUrl' => '/services'])

<!-- Responsive Navigation Pills -->
<nav class="w-full h-40 bg-white border-b border-gray-200 flex flex-row justify-center items-center">
    <ul class="flex flex-wrap justify-center items-center gap-4 sm:gap-6 md:gap-8">
        <li>
            <a href="{{ $baseUrl }}"
               class="px-5 py-2 sm:px-6 sm:py-2.5 {{ is_null($currentSubtitle) ? 'bg-blue-600 text-white' : 'bg-white text-gray-700' }} font-semibold rounded-full shadow-md shadow-gray-200 hover:shadow-lg hover:shadow-gray-300 transition-all duration-300 text-xs">
                All Services
            </a>
        </li>
        @foreach($subtitles as $subtitle)
            <li>
                <a href="{{ $baseUrl }}/{{ Str::slug($subtitle) }}"
                   class="px-5 py-2 sm:px-6 sm:py-2.5 {{ $currentSubtitle === $subtitle ? 'bg-blue-600 text-white' : 'bg-white text-gray-700' }} font-semibold rounded-full shadow-md shadow-gray-200 hover:shadow-lg hover:shadow-gray-300 transition-all duration-300 text-xs">
                    {{ $subtitle }}
                </a>
            </li>
        @endforeach
    </ul>
</nav>
