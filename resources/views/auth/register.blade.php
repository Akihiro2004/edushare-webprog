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
            <h2 class="mt-6 text-xl font-semibold text-gray-800">Create Account</h2>
            <p class="mt-2 text-sm text-gray-600">Start your learning journey today</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div class="space-y-2">
                <label for="name" class="block text-sm font-medium text-gray-700">
                    Full Name
                </label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-[#121d3c] transition-colors">
                        <i class="fas fa-user text-sm"></i>
                    </div>
                    <input type="text" name="name" id="name"
                           class="block w-full pl-11 pr-4 py-2.5 rounded-xl text-gray-900
                                  border border-gray-200
                                  focus:outline-none focus:border-[#121d3c] focus:ring-4 focus:ring-[#121d3c]/10
                                  hover:border-gray-300
                                  transition-all duration-300"
                           placeholder="Enter your full name"
                           value="{{ old('name') }}" required autofocus>
                </div>
                @error('name')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
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
                           value="{{ old('email') }}" required>
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
                           placeholder="Create a strong password"
                           required>
                </div>
                @error('password')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="space-y-2">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                    Confirm Password
                </label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-[#121d3c] transition-colors">
                        <i class="fas fa-lock text-sm"></i>
                    </div>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           class="block w-full pl-11 pr-4 py-2.5 rounded-xl text-gray-900
                                  border border-gray-200
                                  focus:outline-none focus:border-[#121d3c] focus:ring-4 focus:ring-[#121d3c]/10
                                  hover:border-gray-300
                                  transition-all duration-300"
                           placeholder="Confirm your password"
                           required>
                </div>
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
                    Create Account
                </button>
            </div>
        </form>

        <!-- Login Link -->
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
                Already have an account?
                <a href="{{ route('login') }}"
                   class="font-semibold text-[#121d3c] hover:text-[#4e1b60] transition-colors duration-300">
                    Sign in
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>
