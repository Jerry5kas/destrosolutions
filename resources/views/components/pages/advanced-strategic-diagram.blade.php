@php
$strategicPillars = [
    'mission' => [
        'title' => 'Mission',
        'icon' => '🎯',
        'color' => 'bg-blue-900',
        'textColor' => 'text-white',
        'content' => 'To deliver cutting-edge Safety, security and intelligent solutions across chip-to-cloud',
        'applications' => [
            ['icon' => '🔧', 'name' => 'Microchip'],
            ['icon' => '🚗', 'name' => 'Automotive'],
            ['icon' => '🤖', 'name' => 'Robotics'],
            ['icon' => '🏗️', 'name' => 'Construction'],
            ['icon' => '☁️', 'name' => 'Cloud']
        ]
    ],
    'vision' => [
        'title' => 'Vision',
        'icon' => '🔭',
        'color' => 'bg-green-400',
        'textColor' => 'text-black',
        'content' => 'Securing the future of intelligent systems—from chip to cloud—starting with automotive and expanding across industries in the era of software and quantum.'
    ],
    'goals' => [
        'title' => 'Goals',
        'icon' => '🚀',
        'color' => 'bg-blue-300',
        'textColor' => 'text-black',
        'content' => 'Lead the global shift toward secure, quantum-resilient architectures, starting with automotive and scaling into critical industries.'
    ],
    'values' => [
        'title' => 'Values',
        'icon' => '💎',
        'color' => 'bg-blue-500',
        'textColor' => 'text-white',
        'content' => 'Innovation, Integrity, Resilience, and Scalable Impact—driving secure transformation in a software-defined world.'
    ]
];

$techStack = [
    'connected_services' => [
        'name' => 'Connected Services',
        'color' => 'bg-blue-900',
        'textColor' => 'text-white',
        'icon' => '🌐',
        'description' => 'Network orchestration and service management'
    ],
    'cloud_backend' => [
        'name' => 'Cloud Backend',
        'color' => 'bg-green-400',
        'textColor' => 'text-black',
        'icon' => '☁️',
        'description' => 'Distributed computing and data processing',
        'features' => ['Binary Code Processing', 'Data Management', 'Scalable Infrastructure']
    ],
    'ai_analytics' => [
        'name' => 'AI & Data Analytics, OTA',
        'color' => 'bg-purple-400',
        'textColor' => 'text-white',
        'icon' => '🧠',
        'description' => 'Machine learning and over-the-air updates'
    ],
    'connectivity' => [
        'name' => 'Connectivity',
        'color' => 'bg-yellow-400',
        'textColor' => 'text-black',
        'icon' => '📡',
        'description' => 'Wireless communication protocols'
    ],
    'application_software' => [
        'name' => 'Application Software',
        'color' => 'bg-orange-400',
        'textColor' => 'text-white',
        'icon' => '🎮',
        'description' => 'User interface and application logic'
    ],
    'operating_system' => [
        'name' => 'Operating System',
        'color' => 'bg-sky-400',
        'textColor' => 'text-white',
        'icon' => '⚙️',
        'description' => 'System resource management'
    ],
    'hardware' => [
        'name' => 'E/E Hardware',
        'color' => 'bg-red-400',
        'textColor' => 'text-white',
        'icon' => '🔧',
        'description' => 'Electronic and electrical components'
    ],
    'vehicle_platform' => [
        'name' => 'Vehicle Platform',
        'color' => 'bg-gray-400',
        'textColor' => 'text-white',
        'icon' => '🚗',
        'description' => 'Physical vehicle infrastructure'
    ]
];
@endphp

<section class="w-full bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50 py-20 px-4 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-20 left-20 w-32 h-32 bg-blue-600 rounded-full"></div>
        <div class="absolute bottom-20 right-20 w-24 h-24 bg-green-500 rounded-full"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-purple-500 rounded-full"></div>
    </div>

    <div class="max-w-7xl mx-auto relative z-10">
        <!-- Header -->
        <div class="text-center mb-16">
            <h1 class="text-5xl font-bold text-gray-800 mb-6">DestroSolutions</h1>
            <p class="text-2xl text-gray-600 italic font-light">"Your secure silicon partner for the quantum age"</p>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-green-500 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-16 items-start">
            
            <!-- Left Section - Strategic Pillars -->
            <div class="space-y-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Strategic Foundation</h2>
                
                <!-- Mission Circle -->
                <div class="relative group">
                    <div class="w-96 h-96 rounded-full {{ $strategicPillars['mission']['color'] }} {{ $strategicPillars['mission']['textColor'] }} flex flex-col items-center justify-center text-center p-10 shadow-2xl mx-auto transform group-hover:scale-105 transition-all duration-500 cursor-pointer">
                        <div class="text-5xl mb-6 animate-pulse">{{ $strategicPillars['mission']['icon'] }}</div>
                        <h3 class="text-3xl font-bold mb-6">{{ $strategicPillars['mission']['title'] }}</h3>
                        <p class="text-base leading-relaxed">{{ $strategicPillars['mission']['content'] }}</p>
                        
                        <!-- Application Icons with Tooltips -->
                        <div class="flex justify-center space-x-4 mt-6">
                            @foreach($strategicPillars['mission']['applications'] as $app)
                            <div class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center text-lg hover:bg-opacity-30 transition-all duration-300 group/tooltip relative">
                                <span>{{ $app['icon'] }}</span>
                                <div class="absolute -top-12 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover/tooltip:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                                    {{ $app['name'] }}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Vision Circle -->
                <div class="relative -mt-20 group">
                    <div class="w-96 h-96 rounded-full {{ $strategicPillars['vision']['color'] }} {{ $strategicPillars['vision']['textColor'] }} flex flex-col items-center justify-center text-center p-10 shadow-2xl mx-auto transform group-hover:scale-105 transition-all duration-500 cursor-pointer">
                        <div class="text-5xl mb-6 animate-pulse">{{ $strategicPillars['vision']['icon'] }}</div>
                        <h3 class="text-3xl font-bold mb-6">{{ $strategicPillars['vision']['title'] }}</h3>
                        <p class="text-base leading-relaxed">{{ $strategicPillars['vision']['content'] }}</p>
                    </div>
                </div>

                <!-- Goals & Values Row -->
                <div class="flex justify-center space-x-12 -mt-20">
                    <!-- Goals -->
                    <div class="w-80 h-80 rounded-full {{ $strategicPillars['goals']['color'] }} {{ $strategicPillars['goals']['textColor'] }} flex flex-col items-center justify-center text-center p-8 shadow-2xl transform hover:scale-105 transition-all duration-500 cursor-pointer group">
                        <div class="text-5xl mb-4 animate-pulse">{{ $strategicPillars['goals']['icon'] }}</div>
                        <h3 class="text-2xl font-bold mb-4">{{ $strategicPillars['goals']['title'] }}</h3>
                        <p class="text-sm leading-relaxed">{{ $strategicPillars['goals']['content'] }}</p>
                    </div>

                    <!-- Values -->
                    <div class="w-80 h-80 rounded-full {{ $strategicPillars['values']['color'] }} {{ $strategicPillars['values']['textColor'] }} flex flex-col items-center justify-center text-center p-8 shadow-2xl transform hover:scale-105 transition-all duration-500 cursor-pointer group">
                        <div class="text-5xl mb-4 animate-pulse">{{ $strategicPillars['values']['icon'] }}</div>
                        <h3 class="text-2xl font-bold mb-4">{{ $strategicPillars['values']['title'] }}</h3>
                        <p class="text-sm leading-relaxed">{{ $strategicPillars['values']['content'] }}</p>
                    </div>
                </div>
            </div>

            <!-- Right Section - Technical Stack -->
            <div class="space-y-8">
                <h2 class="text-3xl font-bold text-blue-800 mb-8 text-center">Quantum Secured Chip to Cloud</h2>
                
                <!-- Stack Visualization -->
                <div class="relative">
                    <!-- Connection Arrow -->
                    <div class="absolute -left-12 top-1/2 transform -translate-y-1/2 z-20">
                        <div class="w-20 h-3 bg-gradient-to-r from-blue-600 to-green-500 rounded-full animate-pulse"></div>
                        <div class="absolute right-0 top-1/2 transform -translate-y-1/2 w-0 h-0 border-l-12 border-l-blue-600 border-t-6 border-t-transparent border-b-6 border-b-transparent"></div>
                    </div>

                    <!-- Stack Layers -->
                    <div class="space-y-4 ml-12">
                        @foreach($techStack as $key => $layer)
                        <div class="group relative">
                            <div class="flex items-center space-x-6 p-6 rounded-xl {{ $layer['color'] }} {{ $layer['textColor'] }} shadow-lg transform group-hover:scale-105 group-hover:shadow-2xl transition-all duration-300 cursor-pointer">
                                <div class="text-3xl group-hover:animate-bounce">{{ $layer['icon'] }}</div>
                                <div class="flex-1">
                                    <h3 class="font-bold text-xl mb-1">{{ $layer['name'] }}</h3>
                                    <p class="text-sm opacity-80">{{ $layer['description'] }}</p>
                                    @if(isset($layer['features']))
                                        <div class="text-xs opacity-70 mt-2">
                                            @foreach($layer['features'] as $feature)
                                                <span class="inline-block bg-white bg-opacity-20 px-2 py-1 rounded-full mr-2 mb-1">{{ $feature }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center group-hover:bg-opacity-30 transition-all duration-300">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            
                            <!-- Binary Code Overlay for Cloud Backend -->
                            @if($key === 'cloud_backend')
                            <div class="absolute inset-0 pointer-events-none">
                                <div class="flex justify-center items-center h-full">
                                    <div class="text-xs font-mono opacity-20 text-center">
                                        <div class="animate-pulse">10101010</div>
                                        <div class="animate-pulse delay-100">01010101</div>
                                        <div class="animate-pulse delay-200">11001100</div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <!-- Connection Lines -->
                            @if(!$loop->last)
                            <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-0.5 h-4 bg-gradient-to-b from-gray-300 to-transparent"></div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Connected Services Grid -->
                <div class="mt-12 p-8 bg-white rounded-2xl shadow-xl">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center justify-center">
                        <span class="text-3xl mr-3">🔗</span>
                        Connected Services Ecosystem
                    </h3>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach($techStack as $key => $service)
                        <div class="flex items-center space-x-3 p-4 rounded-lg hover:bg-gray-50 transition-all duration-300 cursor-pointer group">
                            <div class="text-2xl group-hover:scale-110 transition-transform duration-300">{{ $service['icon'] }}</div>
                            <div>
                                <span class="text-sm font-semibold text-gray-700">{{ $service['name'] }}</span>
                                <div class="text-xs text-gray-500">{{ $service['description'] }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Data Flow Visualization -->
                <div class="mt-8 p-6 bg-gradient-to-r from-blue-600 to-green-500 rounded-2xl text-white">
                    <h4 class="text-lg font-bold mb-4 text-center">Data Flow Architecture</h4>
                    <div class="flex justify-between items-center">
                        <div class="text-center">
                            <div class="text-2xl mb-2">🚗</div>
                            <div class="text-sm">Vehicle</div>
                        </div>
                        <div class="flex-1 mx-4">
                            <div class="h-1 bg-white bg-opacity-30 rounded-full overflow-hidden">
                                <div class="h-full bg-white rounded-full animate-pulse" style="width: 100%; animation-duration: 2s;"></div>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl mb-2">☁️</div>
                            <div class="text-sm">Cloud</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
