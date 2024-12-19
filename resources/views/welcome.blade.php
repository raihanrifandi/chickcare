<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Landing Page</title>
    @vite('resources/css/app.css')
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 1.5s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gray-100">

    <section class="relative bg-white">
        <div class="relative h-screen bg-cover bg-center" style="background-image: url('/img/chicekcare-landingpage.png');">
            <div class="absolute inset-0 bg-gray-800 bg-opacity-50"></div>
            
            <!-- ChickCare Text -->
            <div class="absolute top-4 left-4 z-20 text-xl font-semibold text-white flex items-center animate-fade-in">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M9.5 2C8.12 2 7 3.12 7 4.5C7 4.78 7.05 5.05 7.13 5.31C4.24 5.85 2 8.35 2 11.5C2 14.54 4.46 17 7.5 17H15C17.21 17 19 15.21 19 13C19 12.65 18.94 12.32 18.84 12H19C20.1 12 21 11.1 21 10C21 8.9 20.1 8 19 8H18.76C18.43 6.69 17.3 5.63 16 5.18V4.5C16 3.12 14.88 2 13.5 2C12.59 2 11.79 2.5 11.35 3.21C10.79 2.5 10.03 2 9.5 2M7.5 19C4 19 1 16 1 12.5C1 8.84 3.84 6 7.5 6C9.65 6 11.5 7.2 12.3 9.01C12.56 9 12.81 9 13 9H19C20.66 9 22 10.34 22 12C22 13.66 20.66 15 19 15H7.5Z" />
                </svg>
                <span class="text-green-400">ChickCare</span>
            </div>
            
            <!-- Welcome Content -->
            <div class="container mx-auto flex items-center justify-center h-full px-6">
                <div class="relative z-10 text-center animate-fade-in">
                    <h1 class="text-5xl font-bold text-white mb-4">Welcome to Chickcare</h1>
                    <p class="text-lg text-white mb-6">
                        Nurturing with Love, Caring with Heart.
                    </p>
                    <a href="{{ route('login') }}"
                       class="px-6 py-3 text-gray-800 bg-white rounded shadow hover:bg-gray-100">
                       Get Started
                    </a>
                </div>
            </div>
        </div>
    </section>

</body>
</html>