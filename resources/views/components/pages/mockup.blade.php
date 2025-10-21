@php
$strategicPillars = [
    'mission' => [
        'title' => 'Mission',
        'icon' => '🎯',
        'color' => 'bg-blue-900',
        'textColor' => 'text-white',
        'content' => 'To deliver cutting-edge Safety, security and intelligent solutions across chip-to-cloud',
        'applications' => ['microchip', 'car', 'robot', 'excavator', 'cloud']
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
        'icon' => '🌐'
    ],
    'cloud_backend' => [
        'name' => 'Cloud Backend',
        'color' => 'bg-green-400',
        'textColor' => 'text-black',
        'icon' => '☁️',
        'features' => ['Binary Code Processing', 'Data Management']
    ],
    'ai_analytics' => [
        'name' => 'AI & Data Analytics, OTA',
        'color' => 'bg-purple-400',
        'textColor' => 'text-white',
        'icon' => '🧠'
    ],
    'connectivity' => [
        'name' => 'Connectivity',
        'color' => 'bg-yellow-400',
        'textColor' => 'text-black',
        'icon' => '📡'
    ],
    'application_software' => [
        'name' => 'Application Software',
        'color' => 'bg-orange-400',
        'textColor' => 'text-white',
        'icon' => '🎮'
    ],
    'operating_system' => [
        'name' => 'Operating System',
        'color' => 'bg-sky-400',
        'textColor' => 'text-white',
        'icon' => '⚙️'
    ],
    'hardware' => [
        'name' => 'E/E Hardware',
        'color' => 'bg-red-400',
        'textColor' => 'text-white',
        'icon' => '🔧'
    ],
    'vehicle_platform' => [
        'name' => 'Vehicle Platform',
        'color' => 'bg-gray-400',
        'textColor' => 'text-white',
        'icon' => '🚗'
    ]
];
@endphp

<style>
.perspective-1000 {
    perspective: 1000px;
}

.group:hover .stack-card {
    transform: translateY(-4px) rotateX(5deg);
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
}

.stack-card {
    transform-style: preserve-3d;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.stack-shadow {
    background: linear-gradient(135deg, rgba(0,0,0,0.08) 0%, rgba(0,0,0,0.15) 100%);
    transform: translate(4px, 4px);
    transition: all 0.3s ease;
}

.side-panel {
    background: linear-gradient(90deg, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.25) 100%);
    transform: skewY(-8deg);
    transform-origin: right;
    transition: all 0.3s ease;
}

.group:hover .side-panel {
    transform: skewY(-12deg);
}

.group:hover .stack-shadow {
    transform: translate(6px, 6px);
    opacity: 0.4;
}

/* Smooth animations for all interactive elements */
.group {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Enhanced hover effects */
.group:hover {
    transform: translateY(-2px);
}

/* Progress bar animation */
.progress-bar {
    transition: width 1s ease-in-out;
}

/* Pulse animation for connecting dots */
@keyframes pulse-slow {
    0%, 100% { opacity: 0.6; }
    50% { opacity: 1; }
}

.animate-pulse-slow {
    animation: pulse-slow 2s ease-in-out infinite;
}
</style>

<section class="w-full bg-gray-50 py-12 px-4">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">DestroSolutions</h1>
            <p class="text-lg text-gray-600 italic">"Your secure silicon partner for the quantum age"</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            
            <!-- Left Section - Strategic Pillars Grid -->
            <div class="space-y-8">
                <div class="text-center lg:text-left">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Strategic Foundation</h2>
                    <p class="text-sm text-gray-600">Core principles driving our innovation</p>
                </div>
                
                <!-- 2x2 Grid Layout -->
                <div class="grid grid-cols-2 gap-6">
                    @foreach($strategicPillars as $key => $pillar)
                    <div class="group cursor-pointer">
                        <div class="w-full h-48 rounded-2xl {{ $pillar['color'] }} {{ $pillar['textColor'] }} flex flex-col items-center justify-center text-center p-6 shadow-lg hover:shadow-xl transform group-hover:scale-105 group-hover:-translate-y-1 transition-all duration-300">
                            <div class="text-4xl mb-3 group-hover:animate-bounce">{{ $pillar['icon'] }}</div>
                            <h3 class="text-lg font-bold mb-3">{{ $pillar['title'] }}</h3>
                            <p class="text-xs leading-relaxed opacity-90">{{ Str::limit($pillar['content'], 50) }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Clean Connecting Arrow -->
            <div class="flex justify-center items-center py-6">
                <div class="flex items-center space-x-2">
                    <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse-slow"></div>
                    <div class="w-12 h-0.5 bg-gradient-to-r from-blue-400 to-green-400"></div>
                    <div class="w-6 h-6 bg-gradient-to-r from-blue-500 to-green-500 rounded-full flex items-center justify-center shadow-lg">
                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="w-12 h-0.5 bg-gradient-to-r from-green-400 to-blue-400"></div>
                    <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse-slow"></div>
                </div>
            </div>

            <!-- Right Section - Technical Stack -->
            <div class="space-y-8">
                <div class="text-center lg:text-left">
                    <h2 class="text-2xl font-bold text-blue-800 mb-2">Quantum Secured Chip to Cloud</h2>
                    <p class="text-sm text-gray-600">Layered architecture for secure implementation</p>
                </div>
                
                <!-- Clean Data Flow Indicator -->
                <div class="flex justify-center mb-6">
                    <div class="flex items-center space-x-2 bg-blue-50 px-4 py-2 rounded-full border border-blue-200">
                        <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                        <span class="text-sm text-blue-700 font-medium">Data Flow</span>
                        <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                    </div>
                </div>

                <!-- Enhanced 3D Stack Layers -->
                <div class="relative perspective-1000">
                    @foreach($techStack as $key => $layer)
                    <div class="group cursor-pointer mb-4">
                        <!-- Enhanced 3D Stack Card -->
                        <div class="relative stack-card">
                            <!-- Main Card -->
                            <div class="flex items-center space-x-4 p-5 rounded-xl {{ $layer['color'] }} text-white shadow-lg hover:shadow-2xl relative z-10 transform group-hover:-translate-y-1 transition-all duration-300">
                                <div class="text-2xl group-hover:scale-110 transition-transform duration-300">{{ $layer['icon'] }}</div>
                                <div class="flex-1">
                                    <h3 class="font-bold text-base mb-1">{{ $layer['name'] }}</h3>
                                    <div class="w-full bg-white bg-opacity-20 rounded-full h-1">
                                        <div class="bg-white h-1 rounded-full transition-all duration-1000 group-hover:w-full" style="width: {{ (8 - $loop->index) * 12.5 }}%"></div>
                                    </div>
                                </div>
                                <div class="w-6 h-6 bg-white bg-opacity-20 rounded-full flex items-center justify-center group-hover:bg-opacity-30 transition-all duration-300">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            
                            <!-- Enhanced 3D Depth Shadow -->
                            <div class="absolute inset-0 stack-shadow rounded-xl {{ $layer['color'] }} opacity-25 -z-10"></div>
                            
                            <!-- Enhanced Side Panel for 3D Effect -->
                            <div class="absolute right-0 top-0 bottom-0 w-4 side-panel rounded-r-xl"></div>
                        </div>
                        
                        <!-- Enhanced Connection Line -->
                        @if(!$loop->last)
                        <div class="flex justify-center mt-3">
                            <div class="w-0.5 h-4 bg-gradient-to-b from-gray-300 to-gray-100"></div>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

                <!-- Connected Services Summary -->
                <!-- <div class="mt-6 p-4 bg-white rounded-lg shadow-lg">
                    <h3 class="text-sm font-semibold text-gray-800 mb-3 flex items-center">
                        <span class="text-lg mr-2">🔗</span>
                        Connected Services
                    </h3>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach($techStack as $key => $service)
                        <div class="flex items-center space-x-2 p-1 rounded hover:bg-gray-50 transition-colors">
                            <div class="text-sm">{{ $service['icon'] }}</div>
                            <span class="text-xs font-medium text-gray-700">{{ $service['name'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>
