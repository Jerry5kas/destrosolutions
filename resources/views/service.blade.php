<x-layouts.app>
    <x-pages.hero title="Quantum"
                  desc="Securing chip-to-cloud in Quantum era"/>
    <x-pages.mockup :galleries="$galleries"/>
    <x-pages.link />
    <x-pages.content :items="$quantumContent" title="Our Quantum Solutions"
                     desc="Delivering quantum-secured, intelligent, and resilient chip-to-cloud solutions—driving safety, innovation, and transformation across automotive and connected industries."
                     type="quantum"/>
    <x-pages.content-modal/>
</x-layouts.app>
