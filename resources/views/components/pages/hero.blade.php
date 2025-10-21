@props([
    'title' => 'Page Title',
    'desc' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet culpa doloremque ducimus earum harum quos vero?'
])
<section

    class="relative w-full h-[18rem] xs:h-[22rem] sm:h-[26rem] md:h-[30rem] lg:h-[35rem] bg-fixed bg-center bg-cover bg-no-repeat"
    style="background-image: url('{{ asset('/images/page-temp.webp') }}');"
>
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/40"></div>

    <!-- Text Content -->
    <div class="absolute inset-0 flex flex-col justify-center items-start px-4 sm:px-8 md:px-12 lg:px-20">
        <div class="max-w-xl text-white">
            <h1 class="font-roboto-slab text-2xl xs:text-3xl sm:text-4xl md:text-5xl font-bold mb-2 leading-tight">
                {{$title}}
            </h1>
            <p class="text-sm xs:text-base sm:text-lg text-gray-200 leading-relaxed">
                {{$desc}}

            </p>
        </div>
    </div>
</section>
