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

            <!-- Right Section - Login Form -->
            <div class="flex-1 flex items-center justify-center p-8 lg:p-12 bg-gray-50">
                <div class="w-full max-w-md">
                    <!-- Logo -->
                    <div class="text-center mb-8">
                        <a href="/" class="inline-block">
                            <x-application-logo class="w-16 h-16 fill-current text-red-600 animate-pulse-slow" />
                        </a>
                        <h2 class="mt-6 text-3xl font-bold text-gray-900">Welcome Back!</h2>
                        <p class="mt-2 text-sm text-gray-600">To Golden Fitness</p>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Input -->
                        <div class="space-y-2">
                            <x-input-label for="email" :value="__('Email')" class="text-sm font-semibold text-gray-700" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </div>
                                <x-text-input 
                                    id="email" 
                                    class="pl-10 w-full rounded-xl border-gray-300 focus:border-red-500 focus:ring-red-500 transition-all duration-300"
                                    type="email" 
                                    name="email" 
                                    :value="old('email')" 
                                    required 
                                    autofocus 
                                    autocomplete="username" 
                                    placeholder="your@email.com"
                                />
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-600" />
                        </div>

                        <!-- Password Input -->
                        <div class="space-y-2">
                            <x-input-label for="password" :value="__('Password')" class="text-sm font-semibold text-gray-700" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <x-text-input 
                                    id="password" 
                                    class="pl-10 w-full rounded-xl border-gray-300 focus:border-red-500 focus:ring-red-500 transition-all duration-300"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="current-password" 
                                    placeholder="••••••••"
                                />
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-600" />
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <label class="flex items-center">
                                <input type="checkbox" name="remember" class="rounded border-gray-300 text-red-600 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a class="text-sm font-medium text-red-600 hover:text-red-500 transition-colors duration-300" href="{{ route('password.request') }}">
                                    {{ __('Forgot password?') }}
                                </a>
                            @endif
                        </div>

                        <!-- Login Button -->
                        <div>
                            <x-primary-button class="w-full py-3 bg-red-600 hover:bg-red-700 transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] rounded-xl">
                                {{ __('Sign in to your account') }}
                            </x-primary-button>
                        </div>

                        <!-- Sign Up Link -->
                        <div class="text-center mt-6">
                            <p class="text-sm text-gray-600">
                                Don't have an account?
                                <a href="{{ route('register') }}" class="font-semibold text-red-600 hover:text-red-500 transition-all duration-300">
                                    {{ __('Create an account') }}
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
