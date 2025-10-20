@props([
    'src' => "",
    'title' => 'Title',
    'desc' => 'Lorem ipsum dolor sit amet, consectetur.'
])

<div class="flex flex-col justify-center items-center gap-y-2" data-reveal>
    <div class="relative group w-full max-w-[280px] xs:max-w-[320px] sm:max-w-[340px] md:max-w-[360px] h-48 xs:h-52 sm:h-56 md:h-60 lg:h-64 bg-white overflow-hidden transition-all duration-500 ease-in-out
            transform hover:scale-95
            shadow-[0_0_15px_8px_rgba(0,0,0,0.08),0_0_40px_15px_rgba(0,0,0,0.04)] hover:shadow-none rounded-sm">

        <!-- Image -->
        <img
            src="{{asset('images/car1.jpg')}}"
            alt="Gallery Image"
            class="w-full h-full object-cover scale-100 group-hover:scale-125 transition-transform duration-700 ease-in-out">

        <!-- Overlay -->
        <div
            class="absolute inset-0 z-10 bg-blue-700/30 flex items-center justify-center opacity-0
                   transition-all duration-500 ease-in-out group-hover:opacity-100">
            <h1 class="text-white text-sm xs:text-base sm:text-lg font-semibold transform transition-transform duration-500 ease-in-out group-hover:scale-110 text-center px-2">
                {{ $title }}
            </h1>
        </div>
    </div>

    <p class="text-gray-500 text-xs xs:text-sm sm:text-base text-center w-full mt-2 px-1">{{ $desc }}</p>
</div>
