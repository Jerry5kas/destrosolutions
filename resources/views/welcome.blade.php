<x-layouts.master>
    <div>
        <x-partials.hero/>
        <x-partials.about />
        <div class="border border-t border-b border-gray-300 py-8 md:py-20 my-8 md:my-20 ">
            <div class="flex flex-col md:flex-row justify-between items-center gap-8 md:gap-6 max-w-6xl mx-auto h-full px-4">
                <div class="w-full md:w-auto">
                    <x-partials.stats count="50+" text="Deployements" tag="Vehicle innovations now come from software-based features" />
                </div>

                <span class="w-24 border-b md:w-0 md:h-24 md:border-b-0 md:border-r border-gray-300"></span>

                <div class="w-full md:w-auto">
                    <x-partials.stats count="100% "  text="Efficiency Boost" tag="SDV Transformation" />
                </div>

                <span class="w-24 border-b md:w-0 md:h-24 md:border-b-0 md:border-r border-gray-300"></span>


                <div class="w-full md:w-auto">
                    <x-partials.stats count="100+" text="Man Years" tag="Expertise in developing next-generation vehicle solutions" />
                </div>

            </div>
        </div>

        <x-partials.contact />
        <x-partials.info />
        <x-partials.products />
        <x-partials.faq />
        <x-partials.news />
        <x-partials.team />
        <x-partials.footer />

    </div>
</x-layouts.master>


