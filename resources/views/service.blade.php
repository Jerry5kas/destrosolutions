<x-layouts.app>
    <x-pages.hero title="Empowering Next-Gen Mobility & Security"
                  desc="DestroSolutions drives innovation across automotive, avionics, rail, and healthcare with secure, software-defined, and compliant digital transformation solutions."/>
    <x-pages.mockup :galleries="$galleries"/>
    <x-pages.link :subtitles="$subtitles" :currentSubtitle="$originalSubtitle ?? null" baseUrl="/services" />
    <x-pages.content :items="$services" title="Our Services"
                     desc="Comprehensive solutions across automotive, avionics, railways, and healthcare sectors—delivering security, compliance, and innovation for next-generation systems."
                     type="service"/>
    <x-pages.content-modal/>
</x-layouts.app>
