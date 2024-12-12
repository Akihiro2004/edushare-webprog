<!-- resources/views/auth/login.blade.php -->
<x-guest-layout>
    <div class="flex flex-col gap-8">
        <!-- Logo Section -->
        <div class="text-center">
            <a href="{{ route('welcome') }}" class="inline-flex items-center gap-3 px-4 py-2 rounded-xl transition-all duration-300 hover:bg-white/50">
                <div class="rounded-xl p-2.5 bg-gradient-to-r from-[#121d3c]/10 to-[#4e1b60]/10">
                    <i class="fas fa-graduation-cap text-2xl bg-gradient-to-r from-[#121d3c] to-[#4e1b60] bg-clip-text text-transparent"></i>
                </div>
                <span class="text-2xl font-bold bg-gradient-to-r from-[#121d3c] to-[#4e1b60] bg-clip-text text-transparent">
                    EduShare
                </span>
            </a>
            <h2 class="mt-6 text-xl font-semibold text-gray-800">Welcome Back!</h2>
            <p class="mt-2 text-sm text-gray-600">Sign in to continue your learning journey</p>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="bg-[#121d3c]/5 border border-[#121d3c]/10 text-[#121d3c] px-4 py-3 rounded-xl text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div class="space-y-2">
                <label for="email" class="block text-sm font-medium text-gray-700">
                    Email Address
                </label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-[#121d3c] transition-colors">
                        <i class="fas fa-envelope text-sm"></i>
                    </div>
                    <input type="email" name="email" id="email"
                           class="block w-full pl-11 pr-4 py-2.5 rounded-xl text-gray-900
                                  border border-gray-200
                                  focus:outline-none focus:border-[#121d3c] focus:ring-4 focus:ring-[#121d3c]/10
                                  hover:border-gray-300
                                  transition-all duration-300"
                           placeholder="Enter your email address"
                           value="{{ old('email') }}" required autofocus>
                </div>
                @error('email')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="space-y-2">
                <label for="password" class="block text-sm font-medium text-gray-700">
                    Password
                </label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-[#121d3c] transition-colors">
                        <i class="fas fa-lock text-sm"></i>
                    </div>
                    <input type="password" name="password" id="password"
                           class="block w-full pl-11 pr-4 py-2.5 rounded-xl text-gray-900
                                  border border-gray-200
                                  focus:outline-none focus:border-[#121d3c] focus:ring-4 focus:ring-[#121d3c]/10
                                  hover:border-gray-300
                                  transition-all duration-300"
                           placeholder="Enter your password"
                           required>
                </div>
                @error('password')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember"
                           class="w-4 h-4 text-[#4e1b60] border-gray-300 rounded
                                  focus:ring-[#4e1b60]/20 transition-all duration-300">
                    <label for="remember" class="ml-2 text-sm text-gray-600">
                        Remember me
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                       class="text-sm font-medium text-[#121d3c] hover:text-[#4e1b60] transition-colors duration-300">
                        Forgot password?
                    </a>
                @endif
            </div>

            <!-- Submit -->
            <div>
                <button type="submit"
                        class="w-full px-6 py-3 rounded-xl
                               bg-gradient-to-r from-[#121d3c] to-[#4e1b60]
                               text-white font-medium
                               shadow-lg shadow-[#121d3c]/20
                               hover:shadow-[#121d3c]/30 hover:scale-[1.02]
                               focus:outline-none focus:ring-4 focus:ring-[#121d3c]/20
                               transition-all duration-300">
                    Sign in to Account
                </button>
            </div>
        </form>

        <!-- Register Link -->
        <div class="text-center space-y-4">
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-200"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-white/80 text-gray-500">or</span>
                </div>
            </div>

            <p class="text-sm text-gray-600">
                Don't have an account?
                <a href="{{ route('register') }}"
                   class="font-semibold text-[#121d3c] hover:text-[#4e1b60] transition-colors duration-300">
                    Create one now
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>
