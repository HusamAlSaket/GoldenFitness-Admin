
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'FitLife Pro') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Additional Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Custom Styles -->
        <style>
            .fitness-gradient {
                background: linear-gradient(135deg, #ff0844 0%, #ff3860 100%);
            }
            .glassmorphism {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
            }
            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.05); }
                100% { transform: scale(1); }
            }
            .animate-pulse-slow {
                animation: pulse 3s infinite;
            }
            .clip-path-right {
                clip-path: polygon(10% 0, 100% 0, 100% 100%, 0% 100%);
            }
        </style>
    </head>
    <body class="font-['Montserrat'] antialiased">
        <!-- Main Container -->
        <div class="min-h-screen flex flex-col lg:flex-row">
            <!-- Left Section - Hero Image -->
            <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden">
                <div class="absolute inset-0 fitness-gradient opacity-90"></div>
                <img 
                    src="/api/placeholder/1200/800" 
                    alt="Fitness Motivation" 
                    class="object-cover w-full h-full"
                >
                <!-- Motivational Text Overlay -->
                <div class="absolute inset-0 flex flex-col justify-center px-12 text-white">
                    <h1 class="text-5xl font-extrabold mb-6 leading-tight">Transform Your Life Through Fitness</h1>
                    <p class="text-xl font-light mb-8">Join thousands of members achieving their fitness goals</p>
                    <div class="flex space-x-4">
                        <!-- Achievement Stats -->
                        <div class="bg-white bg-opacity-20 rounded-lg p-4">
                            <h3 class="text-3xl font-bold">10K+</h3>
                            <p class="text-sm">Active Members</p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-lg p-4">
                            <h3 class="text-3xl font-bold">95%</h3>
                            <p class="text-sm">Success Rate</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Section - Registration Form -->
            <div class="flex-1 flex items-center justify-center p-8 lg:p-12 bg-gray-50">
                <div class="w-full max-w-md">
                    <!-- Logo -->
                    <div class="text-center mb-8">
                        <a href="/" class="inline-block">
                            <x-application-logo class="w-16 h-16 fill-current text-red-600 animate-pulse-slow" />
                        </a>
                        <h2 class="mt-6 text-3xl font-bold text-gray-900">Create an Account</h2>
                        <p class="mt-2 text-sm text-gray-600">Sign up to start your fitness journey</p>
                    </div>

                    <!-- Registration Form -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="space-y-2">
                            <x-input-label for="name" :value="__('Name')" class="text-sm font-semibold text-gray-700" />
                            <x-text-input 
                                id="name" 
                                class="block mt-1 w-full rounded-xl border-gray-300 focus:border-red-500 focus:ring-red-500 transition-all duration-300" 
                                type="text" 
                                name="name" 
                                :value="old('name')" 
                                required 
                                autofocus 
                                autocomplete="name" 
                            />
                            <x-input-error :messages="$errors->get('name')" class="mt-1 text-sm text-red-600" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4 space-y-2">
                            <x-input-label for="email" :value="__('Email')" class="text-sm font-semibold text-gray-700" />
                            <x-text-input 
                                id="email" 
                                class="block mt-1 w-full rounded-xl border-gray-300 focus:border-red-500 focus:ring-red-500 transition-all duration-300" 
                                type="email" 
                                name="email" 
                                :value="old('email')" 
                                required 
                                autocomplete="username" 
                            />
                            <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-600" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4 space-y-2">
                            <x-input-label for="password" :value="__('Password')" class="text-sm font-semibold text-gray-700" />
                            <x-text-input 
                                id="password" 
                                class="block mt-1 w-full rounded-xl border-gray-300 focus:border-red-500 focus:ring-red-500 transition-all duration-300" 
                                type="password" 
                                name="password" 
                                required 
                                autocomplete="new-password" 
                            />
                            <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-600" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4 space-y-2">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-sm font-semibold text-gray-700" />
                            <x-text-input 
                                id="password_confirmation" 
                                class="block mt-1 w-full rounded-xl border-gray-300 focus:border-red-500 focus:ring-red-500 transition-all duration-300" 
                                type="password" 
                                name="password_confirmation" 
                                required 
                                autocomplete="new-password" 
                            />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-sm text-red-600" />
                        </div>

                        <!-- Bottom Section with Links & Button -->
                        <div class="flex items-center justify-between mt-6">
                            <div class="text-sm">
                                Already have an account?
                                <a href="{{ route('login') }}" class="font-semibold text-red-600 hover:text-red-500 transition-all duration-300">
                                    {{ __('Login here') }}
                                </a>
                            </div>

                            <x-primary-button class="w-full py-3 bg-red-600 hover:bg-red-700 transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] rounded-xl">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
