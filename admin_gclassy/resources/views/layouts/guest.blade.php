<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
            
            .glass-effect {
                background: rgba(255, 255, 255, 0.15);
                backdrop-filter: blur(15px);
                border: 1px solid rgba(255, 255, 255, 0.2);
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            }
            
            .gradient-bg {
                background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 25%, #e8a87c 50%, #c38d9e 75%, #a8c8ec 100%);
            }
            
            .gradient-text {
                background: linear-gradient(135deg, #d299c2 0%, #a8c8ec 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
            
            .floating-animation {
                animation: floating 6s ease-in-out infinite;
            }
            
            @keyframes floating {
                0% { transform: translate(0, 0px); }
                50% { transform: translate(0, -20px); }
                100% { transform: translate(0, 0px); }
            }
            
            .pulse-animation {
                animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
            }
            
            .slide-in {
                animation: slideIn 0.8s ease-out;
            }
            
            @keyframes slideIn {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            .form-input {
                transition: all 0.3s ease;
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(15px);
                border: 1px solid rgba(255, 255, 255, 0.2);
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            }
            
            .form-input:focus {
                transform: translateY(-2px);
                box-shadow: 0 10px 20px rgba(168, 200, 236, 0.15);
                background: rgba(255, 255, 255, 0.15);
                backdrop-filter: blur(20px);
            }
            
            .form-input:hover {
                background: rgba(255, 255, 255, 0.12);
                backdrop-filter: blur(18px);
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <!-- Background with animated gradient -->
        <div class="min-h-screen relative overflow-hidden">
            <!-- Animated background -->
            <div class="absolute inset-0 gradient-bg"></div>
            
            <!-- Floating shapes -->
            <div class="absolute top-20 left-20 w-32 h-32 bg-white bg-opacity-10 rounded-full floating-animation"></div>
            <div class="absolute top-40 right-20 w-20 h-20 bg-white bg-opacity-5 rounded-full floating-animation" style="animation-delay: -3s;"></div>
            <div class="absolute bottom-40 left-40 w-24 h-24 bg-white bg-opacity-10 rounded-full floating-animation" style="animation-delay: -1s;"></div>
            <div class="absolute bottom-20 right-40 w-16 h-16 bg-white bg-opacity-5 rounded-full floating-animation" style="animation-delay: -4s;"></div>
            
            <!-- Main content -->
            <div class="relative min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
                <!-- Logo -->
                <div class="slide-in mb-8">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-white bg-opacity-90 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-8 h-8 text-rose-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.84L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.84l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white">GClassy</h1>
                            <p class="text-white text-opacity-80 text-sm">E-Learning Platform</p>
                        </div>
                    </div>
                </div>

                <!-- Form container -->
                <div class="w-full sm:max-w-md slide-in">
                    <div class="glass-effect rounded-2xl p-8 shadow-2xl">
                        {{ $slot }}
                    </div>
                </div>
                
                <!-- Footer -->
                <div class="mt-8 text-center slide-in">
                    <p class="text-white text-opacity-60 text-sm">
                        © 2025 GClassy. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
