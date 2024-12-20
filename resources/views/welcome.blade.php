<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ChickCare - Landing Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- AOS CSS and JS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <!-- Fontawesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!-- Navbar -->
    <nav class="bg-white/80 backdrop-blur-md fixed w-full z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-2">
                    <i class="fa-solid fa-feather text-blue-600 text-2xl"></i>
                    <a href="/" class="text-xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">ChickCare</a>
                </div>
                @if (Route::has('login'))
                <div class="flex space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 transition-all duration-300 shadow-[3px_3px_6px_0px_#b8b9be,-3px_-3px_6px_0px_#fff]">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 transition-all duration-300 shadow-[3px_3px_6px_0px_#b8b9be,-3px_-3px_6px_0px_#fff]">
                            Masuk
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white transition-all duration-300">
                                Daftar
                            </a>
                        @endif
                    @endauth
                </div>
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="pt-24 pb-16 bg-gradient-to-br from-blue-600 to-blue-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="text-white space-y-6" data-aos="fade-right">
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight">Diagnosis Cepat & Akurat untuk Kesehatan Ayam Anda</h1>
                    <p class="text-lg text-blue-100">Sistem pakar berbasis website untuk mendeteksi penyakit ayam dengan akurasi tinggi. Dapatkan solusi tepat dalam hitungan menit.</p>
                    @if (Route::has('login') && !auth()->check())
                    <div class="flex space-x-4">
                        <a href="{{ route('login') }}" class="px-6 py-3 bg-white text-blue-600 font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-300">
                            Mulai Diagnosa
                        </a>
                        <a href="#features" class="px-6 py-3 bg-blue-700 text-white font-semibold rounded-lg hover:bg-blue-800 transition-all duration-300">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                    @endif
                </div>
                <div class="hidden lg:block lg:absolute lg:right-24 lg:-translate-y-1/2" data-aos="fade-left" data-aos-delay="200"> <!-- Modified this div -->
                    <img src="assets/hero.svg" alt="ChickCare Illustration" class="w-auto h-72"> <!-- Modified image size -->
                </div>
            </div>
        </div>
        <div class="wave-bottom">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="fill-gray-100"></path>
            </svg>
        </div>
    </header>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"  data-aos="fade-up">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800">Mengapa Memilih ChickCare?</h2>
                <p class="mt-4 text-lg text-gray-600">Solusi modern untuk kesehatan unggas Anda</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-[5px_5px_10px_0px_#b8b9be,-5px_-5px_10px_0px_#fff] transition-all duration-300 hover:shadow-[8px_8px_16px_0px_#b8b9be,-8px_-8px_16px_0px_#fff]" data-aos="fade-up" data-aos-delay="0">>
                    <div class="flex flex-col items-center text-center">
                        <div class="p-4 bg-blue-100 rounded-2xl mb-6">
                            <i class="fa-solid fa-bolt text-blue-600 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-4">Diagnosis Instan</h3>
                        <p class="text-gray-600">Dapatkan hasil diagnosis dalam hitungan detik dengan metode yang presisi</p>
                    </div>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-[5px_5px_10px_0px_#b8b9be,-5px_-5px_10px_0px_#fff] transition-all duration-300 hover:shadow-[8px_8px_16px_0px_#b8b9be,-8px_-8px_16px_0px_#fff]" data-aos="fade-up" data-aos-delay="100">>
                    <div class="flex flex-col items-center text-center">
                        <div class="p-4 bg-green-100 rounded-2xl mb-6">
                            <i class="fa-solid fa-clipboard-check text-green-600 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-4">Solusi Terperinci</h3>
                        <p class="text-gray-600">Rekomendasi penanganan yang detail dan mudah dipahami untuk setiap diagnosis</p>
                    </div>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-[5px_5px_10px_0px_#b8b9be,-5px_-5px_10px_0px_#fff] transition-all duration-300 hover:shadow-[8px_8px_16px_0px_#b8b9be,-8px_-8px_16px_0px_#fff]" data-aos="fade-up" data-aos-delay="200">>
                    <div class="flex flex-col items-center text-center">
                        <div class="p-4 bg-yellow-100 rounded-2xl mb-6">
                            <i class="fa-solid fa-clock-rotate-left text-yellow-600 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-4">Riwayat Lengkap</h3>
                        <p class="text-gray-600">Pantau riwayat kesehatan ternak Anda dengan sistem pencatatan yang terorganisir</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-br from-blue-600 to-blue-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-8" data-aos="fade-up">Mulai Diagnosis Sekarang</h2>
            <p class="text-xl text-blue-100 mb-12 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">Lindungi kesehatan ternak Anda dengan diagnosis cepat dan akurat menggunakan ChickCare</p>
            <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-4 bg-white text-blue-600 font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                Daftar Gratis
                <i class="fa-solid fa-arrow-right ml-2"></i>
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black dark:bg-gray-800">
        <div class="max-w-screen-xl p-4 py-6 mx-auto lg:py-16 md:p-8 lg:p-10">
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8">
            <div class="text-center">
                <a href="#" class="flex items-center justify-center mb-5 text-2xl font-semibold text-white">
                    <i class="fa-solid fa-feather text-blue-600 text-2xl"></i>
                     ChickCare  
                </a>
                <span class="block text-sm text-center text-gray-500 dark:text-gray-400">© 2024 ChickCare™. All Rights Reserved. Made with love by Kelompok 2 Kelas A Sistem Pakar.
                </span>
                <ul class="flex justify-center mt-5 space-x-5">
                    <li>
                        <a href="https://github.com/raihanrifandi/chickcare" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>
</html>

<style>
.wave-bottom {
    position: relative;
    height: 150px;
    overflow: hidden;
    margin-bottom: -65px; /* Menambahkan margin negative untuk menghilangkan gap */
}

.wave-bottom svg {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 150px;
    transform: rotate(180deg);
    display: block; /* Memastikan tidak ada extra space */
}
</style>
</html>
