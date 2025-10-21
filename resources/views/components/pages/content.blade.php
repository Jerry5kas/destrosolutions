@props(['items' => [], 'title' => 'Our Content','desc' => '', 'type' => 'content'])

<section class="bg-white py-10">
    <div class="w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        <div class="text-4xl font-roboto-slab text-slate-600 font-semibold">{{ $title }}</div>
        <div class="text-md text-slate-600 font-semibold">{{ $desc }}</div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-16">
            @forelse($items as $item)
                <x-pages.card :item="$item" :type="$type" />
            @empty
                <x-pages.card />
                <x-pages.card />
                <x-pages.card />
            @endforelse
        </div>
    </div>
</section>
