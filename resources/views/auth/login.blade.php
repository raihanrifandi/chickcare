<x-guest-layout>
    <div class="min-h-screen flex justify-center items-center bg-gray-50">
        <div class="flex w-[90%] max-w-6xl h-[85vh] bg-white rounded-xl shadow-lg overflow-hidden">
            
            <!-- Left Section -->
            <div class="w-1/2 flex flex-col justify-center px-16">
                <div class="max-w-sm">
                    <h1 class="text-2xl font-semibold mb-2">Selamat Datang Kembali!👋</h1>
                    <p class="text-gray-600 text-sm mb-8">
                        di website Sistem Pakar Diagnosa Penyakit Pada Ayam.<br>
                        Mulai diagnosa penyakit pada ayam-mu1.
                    </p>

                    <!-- Session Status -->
                    @if(session('status'))
                        <div class="bg-green-100 text-green-800 p-2 rounded mb-4 text-sm">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" 
                                placeholder="contoh@email.com"
                                required autofocus autocomplete="username"
                                class="w-full px-3 py-2 text-sm rounded-lg bg-gray-50 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('email')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <input type="password" id="password" name="password" 
                                placeholder="Password"
                                required autocomplete="current-password"
                                class="w-full px-3 py-2 text-sm rounded-lg bg-gray-50 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @error('password')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Forgot Password Link -->
                        <div class="text-right">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-blue-600 hover:text-blue-700 text-sm">
                                    Lupa Password?
                                </a>
                            @endif
                        </div>

                        <!-- Sign In Button -->
                        <button type="submit" class="w-full bg-blue-600 text-white py-2.5 rounded-lg hover:bg-blue-700 transition-colors text-sm">
                            Masuk
                        </button>

                        <!-- Sign Up Link -->
                        <p class="text-center text-gray-600 text-sm">
                            Belum punya akun? 
                            <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-700">Daftar disini!</a>
                        </p>
                    </form>

                    <!-- Footer -->
                    <div class="mt-8 text-center text-gray-400 text-xs">
                        © KELOMPOK SISPAK 2024 ALL RIGHTS RESERVED
                    </div>
                </div>
            </div>

            <!-- Right Section - Image (Flex-grow) -->
            <div class="flex-1 z-50">
                <img src="assets/cover.png" alt="Login Page" 
                    class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</x-guest-layout>