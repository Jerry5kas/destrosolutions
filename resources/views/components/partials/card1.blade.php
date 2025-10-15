@props([
    'src' => 'https://templates.framework-y.com/structura/images/gallery/image-5.jpg',
    'title' => 'Title',
    'desc' => 'Lorem ipsum dolor sit amet, consectetur.'
])

<div class="flex flex-col justify-center items-center gap-y-2">
    <div class="relative group w-[360px] h-64 bg-white overflow-hidden transition-all duration-500 ease-in-out
            transform hover:scale-95
            shadow-[0_0_20px_10px_rgba(0,0,0,0.1),0_0_50px_20px_rgba(0,0,0,0.05)] hover:shadow-none">

        <!-- Image -->
        <img
            src="{{ $src }}"
            alt="Gallery Image"
            class="w-full h-full object-cover scale-100 group-hover:scale-125 transition-transform duration-700 ease-in-out">

        <!-- Overlay -->
        <div
            class="absolute inset-0 z-10 bg-black/30 flex items-center justify-center opacity-0
                   transition-all duration-500 ease-in-out group-hover:opacity-100">
            <h1 class="text-white text-lg font-semibold transform transition-transform duration-500 ease-in-out group-hover:scale-110">
                {{ $title }}
            </h1>
        </div>
    </div>

    <p class="text-gray-500 text-md text-center w-full mt-2">{{ $desc }}</p>
</div>
