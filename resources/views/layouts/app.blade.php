<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>HALAMAN ADMIN</title>

        <!-- Scripts -->
        @vite('resources/sass/app.scss', 'resources/js/app.js') 
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200 font-roboto">
            @include('components.sidebar')
    
            <div class="flex-1 flex flex-col overflow-hidden">
                @include('components.header')
    
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container mx-auto px-6 py-4">
                        @yield('contents')
                    </div>
                </main>
    
            </div>
        </div>
    </body>
</html>
