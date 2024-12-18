<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Landing Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="text-xl font-bold text-blue-600">Chickcare</a>
                </div>
                @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-blue-600 font-semibold">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 font-semibold">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-gray-600 hover:text-blue-600 font-semibold">Register</a>
                        @endif
                    @endauth
                </div>
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-blue-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center text-white">
            <h1 class="text-4xl font-bold">Welcome to Chickcare</h1>
            <p class="mt-4 text-lg">Under Construction</p>
            @if (Route::has('login') && !auth()->check())
            <div class="mt-6">
                <a href="{{ route('login') }}" class="px-6 py-3 bg-white text-blue-600 font-semibold rounded-lg shadow-md hover:bg-gray-200">
                    Get Started
                </a>
            </div>
            @endif
        </div>
    </header>

    <!-- Features Section -->
    <section class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold">Why Choose Us?</h2>
                <p class="mt-2 text-gray-600">Discover the features that make us stand out.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-2">Feature 1</h3>
                    <p class="text-gray-600">Detailed explanation about feature 1.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-2">Feature 2</h3>
                    <p class="text-gray-600">Detailed explanation about feature 2.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-2">Feature 3</h3>
                    <p class="text-gray-600">Detailed explanation about feature 3.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 py-6 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <p>&copy; 2024 Chickcare. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
