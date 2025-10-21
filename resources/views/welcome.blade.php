<x-layouts.app>
    <div data-reveal-scope>
        <div data-reveal>
            <x-partials.hero :slides="$slides"/>
        </div>

        <div data-reveal>
            <x-partials.about />
        </div>

        <div class="border border-t border-b border-gray-300 py-6 xs:py-8 sm:py-10 md:py-16 lg:py-20 my-6 xs:my-8 sm:my-10 md:my-16 lg:my-20 bg-blue-700" data-reveal>
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 xs:gap-6 sm:gap-8 md:gap-6 lg:gap-8 max-w-xs xs:max-w-sm sm:max-w-2xl md:max-w-4xl lg:max-w-6xl xl:max-w-7xl mx-auto h-full px-3 xs:px-4 sm:px-6">
                <div class="w-full md:w-auto" data-reveal>
                    <x-partials.stats count="50+" text="Deployements" tag="Vehicle innovations now come from software-based features" />
                </div>

                <span class="w-16 xs:w-20 sm:w-24 border-b md:w-0 md:h-16 lg:h-20 xl:h-24 md:border-b-0 md:border-r border-gray-300" data-reveal></span>

                <div class="w-full md:w-auto" data-reveal>
                    <x-partials.stats count="100% "  text="Efficiency Boost" tag="SDV Transformation" />
                </div>

                <span class="w-16 xs:w-20 sm:w-24 border-b md:w-0 md:h-16 lg:h-20 xl:h-24 md:border-b-0 md:border-r border-gray-300" data-reveal></span>

                <div class="w-full md:w-auto" data-reveal>
                    <x-partials.stats count="100+" text="Man Years" tag="Expertise in developing next-generation vehicle solutions" />
                </div>

            </div>
        </div>

        <div data-reveal>
            <x-partials.contact />
        </div>
        <div data-reveal>
            <x-partials.info />
        </div>
        <div data-reveal>
            <x-partials.products />
        </div>
        <div data-reveal>
            <x-partials.faq />
        </div>
        <div data-reveal>
            <x-partials.news />
        </div>
        <div data-reveal>
            <x-partials.team />
        </div>

    </div>
</x-layouts.app>


