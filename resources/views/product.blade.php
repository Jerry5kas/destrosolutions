<x-layouts.app>
    <x-pages.hero title="Our Products"
                  desc="A unified SDV platform delivering AI automation, cybersecurity, analytics, compliance, and seamless OTA updates for connected vehicle innovation."/>
    <x-pages.mockup :galleries="$galleries"/>
    <x-pages.link :subtitles="$subtitles" :currentSubtitle="$originalSubtitle ?? null" baseUrl="/products" />
    <x-pages.content :items="$products" title="Our Products"
                     desc="Powering the Software-Defined Vehicle (SDV) ecosystem with intelligent, secure, and scalable Platform"
                     type="product"/>
    <x-pages.content-modal/>
</x-layouts.app>
