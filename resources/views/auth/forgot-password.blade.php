<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-100">
        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Reset Password</h2>

            <p class="text-sm text-gray-600 mb-4 text-center">
                Forgot your password? No problem. Just let us know your email address, and we will email you a password reset link that will allow you to choose a new one.
            </p>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 text-sm text-green-600 text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit"
                        class="bg-indigo-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-indigo-700">
                        Email Password Reset Link
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
