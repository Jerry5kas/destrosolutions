<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100..900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')

    <!-- Alpine.js (Include this in your layout before the closing </body>) -->
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>

<!-- Header -->


<!-- Header -->
<nav x-data="{ open: false }"
     class="fixed top-0 left-0 w-full z-50 px-4 py-3 border-b border-gray-300 font-exo-2 bg-white ">

    <div class="max-w-7xl mx-auto flex items-center justify-between px-4 py-2 ">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <img class="w-7 h-7" src="{{ asset('images/letter-d.png') }}" alt="Logo"/>
            <span class="text-lg font-semibold tracking-wide">
        DESTRO SOLUTIONS
      </span>
        </div>

        <!-- Hamburger button (mobile) -->
        <div class="md:hidden">
            <button @click="open = !open" class="focus:outline-none">
                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Desktop Nav -->
        <div class="hidden md:flex space-x-12 items-center font-semibold">
            <a class="text-sm text-gray-700 hover:text-black" href="#">Home</a>
            <a class="text-sm text-gray-700 hover:text-black" href="{{url('/')}}">Quantum</a>
            <a class="text-sm text-gray-700 hover:text-black" href="#">Services</a>
            <a class="text-sm text-gray-700 hover:text-black" href="#">Products</a>
            <a class="text-sm text-gray-700 hover:text-black" href="#">Training</a>
            <a class="text-sm text-gray-700 hover:text-black" href="#">Blog</a>
            <a class="text-sm text-gray-700 hover:text-black" href="#">Contact Us</a>
        </div>
    </div>

    <!-- Mobile Nav -->
    <div x-show="open" x-transition x-cloak class="md:hidden mt-3 space-y-2 px-2">
        <a class="block text-sm text-gray-700 hover:text-black" href="#">Home</a>
        <a class="block text-sm text-gray-700 hover:text-black" href="#">Quantum</a>
        <a class="block text-sm text-gray-700 hover:text-black" href="#">Services</a>
        <a class="block text-sm text-gray-700 hover:text-black" href="#">Products</a>
        <a class="block text-sm text-gray-700 hover:text-black" href="#">Training</a>
        <a class="block text-sm text-gray-700 hover:text-black" href="#">Blog</a>
        <a class="block text-sm text-gray-700 hover:text-black" href="#">Contact Us</a>
    </div>
</nav>

<main class="mt-16 font-inter-light min-h-screen flex flex-col justify-between ">
    <div class="">
        {{ $slot }}
    </div>

    <div>
        <x-partials.footer/>
    </div>
</main>

<!-- WhatsApp Button -->
<a
    href="https://api.whatsapp.com/send/?phone=919398793452&text&type=phone_number&app_absent=0"
    target="_blank"
    class="fixed bottom-6 right-6 z-50 flex items-center justify-center w-14 h-14 rounded-full bg-gray-600 hover:bg-green-600 transition-colors duration-300 shadow-lg"
    title="Chat with us on WhatsApp"
>
    <!-- WhatsApp Icon -->
    <svg class="w-7 h-7 text-white hover:text-gray-100 transition-colors duration-300"
         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
        <path
            d="M20.52 3.48A11.94 11.94 0 0 0 12 0C5.37 0 0 5.37 0 12c0 2.12.56 4.1 1.53 5.84L0 24l6.41-1.67A11.94 11.94 0 0 0 12 24c6.63 0 12-5.37 12-12 0-3.2-1.24-6.18-3.48-8.52zm-8.52 18.96a10.02 10.02 0 0 1-5.33-1.53l-.38-.23-3.8.99.99-3.78-.25-.39A10 10 0 1 1 12 22.44zm5.05-7.78c-.28-.14-1.64-.81-1.89-.91-.25-.1-.43-.14-.61.14s-.7.91-.86 1.1c-.16.18-.32.21-.6.07-.28-.14-1.18-.44-2.25-1.38-.83-.74-1.39-1.66-1.55-1.92-.16-.25-.02-.38.12-.52.12-.12.28-.32.42-.48.14-.16.18-.28.28-.46.1-.18.05-.34-.02-.48-.07-.14-.61-1.48-.84-2.02-.22-.53-.44-.46-.61-.46-.16 0-.35 0-.53 0s-.48.07-.73.35c-.25.28-.96.94-.96 2.29s.99 2.65 1.13 2.83c.14.18 1.95 2.97 4.73 4.17.66.28 1.17.45 1.57.57.66.2 1.26.17 1.74.1.53-.08 1.64-.67 1.87-1.32.23-.66.23-1.22.16-1.32-.07-.1-.25-.16-.53-.3z"/>
    </svg>
</a>

</body>
</html>
