<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        .bg-animated {
            background: 
                linear-gradient(135deg, #0f0f23 0%, #1a1a2e 25%, #16213e 50%, #0f3460 75%, #533483 100%),
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.1) 0%, transparent 50%);
            background-size: 400% 400%, 800px 800px, 600px 600px, 400px 400px;
            animation: gradientShift 25s ease-in-out infinite;
        }
        
        @keyframes gradientShift {
            0%, 100% { 
                background-position: 0% 50%, 0 0, 0 0, 0 0; 
            }
            25% { 
                background-position: 100% 50%, 200px 200px, 150px 150px, 100px 100px; 
            }
            50% { 
                background-position: 50% 100%, 400px 400px, 300px 300px, 200px 200px; 
            }
            75% { 
                background-position: 50% 0%, 600px 600px, 450px 450px, 300px 300px; 
            }
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.25),
                0 0 0 1px rgba(255, 255, 255, 0.05),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }
        
        .glass-input {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #ffffff;
        }
        
        .glass-input:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(59, 130, 246, 0.6);
            box-shadow: 
                0 0 0 3px rgba(59, 130, 246, 0.2),
                0 8px 25px rgba(0, 0, 0, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }
        
        .glass-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        
        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }
        
        .floating-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            animation: float 20s infinite ease-in-out;
        }
        
        .floating-circle:nth-child(1) {
            width: 100px;
            height: 100px;
            top: 15%;
            left: 10%;
            animation-delay: 0s;
            background: rgba(59, 130, 246, 0.1);
        }
        
        .floating-circle:nth-child(2) {
            width: 150px;
            height: 150px;
            top: 25%;
            right: 15%;
            animation-delay: 7s;
            background: rgba(147, 51, 234, 0.08);
        }
        
        .floating-circle:nth-child(3) {
            width: 80px;
            height: 80px;
            bottom: 25%;
            left: 20%;
            animation-delay: 14s;
            background: rgba(236, 72, 153, 0.1);
        }
        
        .floating-circle:nth-child(4) {
            width: 120px;
            height: 120px;
            bottom: 20%;
            right: 10%;
            animation-delay: 3s;
            background: rgba(16, 185, 129, 0.08);
        }
        
        @keyframes float {
            0%, 100% { 
                transform: translateY(0px) rotate(0deg) scale(1); 
                opacity: 0.6; 
            }
            33% { 
                transform: translateY(-30px) rotate(120deg) scale(1.1); 
                opacity: 0.8; 
            }
            66% { 
                transform: translateY(-15px) rotate(240deg) scale(0.9); 
                opacity: 1; 
            }
        }
        
        .pulse-glow {
            animation: pulseGlow 4s ease-in-out infinite;
        }
        
        @keyframes pulseGlow {
            0%, 100% { 
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
            }
            50% { 
                box-shadow: 0 0 40px rgba(59, 130, 246, 0.6), 0 0 60px rgba(59, 130, 246, 0.3);
            }
        }
    </style>
</head>
<body class="min-h-screen text-gray-700 overflow-hidden">
    <div class="min-h-screen relative bg-animated flex items-center justify-center">
        <!-- Floating Elements -->
        <div class="floating-elements">
            <div class="floating-circle"></div>
            <div class="floating-circle"></div>
            <div class="floating-circle"></div>
            <div class="floating-circle"></div>
        </div>
        
        <!-- Login Form -->
        <div class="w-full max-w-md mx-4 relative z-10">
            <div class="glass-effect rounded-2xl p-8 shadow-2xl">
                <!-- Header -->
                <div class="mb-8 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-white/10 backdrop-blur-sm rounded-2xl mb-4 pulse-glow">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-white mb-2">Admin Portal</h1>
                    <p class="text-white/80 text-sm">Welcome back, please sign in to continue</p>
                </div>

                <!-- Form -->
                <form method="POST" action="{{ route('admin.login') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Email Field -->
                    <div>
                        <label class="block text-sm font-medium text-white/90 mb-2">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                            <input name="email" type="email" value="{{ old('email') }}" required autofocus
                                placeholder="Enter your email"
                                class="glass-input pl-10 w-full rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-0 transition-all duration-300" />
                        </div>
                        @error('email')
                            <p class="text-sm text-red-300 mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <!-- Password Field -->
                    <div>
                        <label class="block text-sm font-medium text-white/90 mb-2">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input name="password" type="password" required
                                placeholder="Enter your password"
                                class="glass-input pl-10 w-full rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-0 transition-all duration-300" />
                        </div>
                        @error('password')
                            <p class="text-sm text-red-300 mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label class="inline-flex items-center gap-2 text-sm text-white/90 cursor-pointer">
                            <input type="checkbox" name="remember" 
                                class="w-4 h-4 text-blue-600 bg-white/20 border-white/30 rounded focus:ring-blue-500 focus:ring-2">
                            <span>Remember me</span>
                        </label>
                        <a href="#" class="text-sm text-white/80 hover:text-white transition-colors">
                            Forgot password?
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white font-semibold py-3 px-4 rounded-xl border border-white/30 transition-all duration-300 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-white/50 focus:ring-offset-2 focus:ring-offset-transparent">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            Sign In
                        </span>
                    </button>
                </form>
                
                <!-- Footer -->
                <div class="mt-8 text-center">
                    <p class="text-white/60 text-xs">
                        Secure admin access • Protected by advanced encryption
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


