<x-layouts.app>
    <x-pages.hero title="Training & Skill Development"
                  desc="DestroSolutions provides hands-on, standards-driven training in cybersecurity, functional safety, ASPICE, AUTOSAR, and OT security—equipping teams with skills to lead Software-Defined Vehicle transformation confidently."/>
    <x-pages.mockup :galleries="$galleries"/>
    <x-pages.link :subtitles="$subtitles" :currentSubtitle="$originalSubtitle ?? null" baseUrl="/training" />
    <x-pages.content :items="$trainings" title="Our Training Programs"
                     desc="At DestroSolutions, we don’t just build solutions — we empower teams. Our hands-on, industry-aligned training programs are designed to equip engineers, managers, and technical leaders with the skills needed to succeed in the era of Software-Defined Vehicles (SDVs), compliance, and cybersecurity.

Whether you're an OEM, Tier-1 supplier, or startup, we tailor our training modules to match your project needs, tools, and maturity level."
                     type="training"/>
    <x-pages.content-modal/>
</x-layouts.app>
