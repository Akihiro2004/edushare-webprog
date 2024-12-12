<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduShare</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('graduation-cap-solid.svg') }}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased min-h-screen flex flex-col" style="background-color: #f6f2f0;">
    <nav class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between h-16">
                <a href="{{ route('welcome') }}">
                    <div class="flex items-center gap-2 transition-all duration-300 p-2 rounded-lg">
                        <div class="rounded-lg p-2 bg-gradient-to-r from-[#121d3c]/10 to-[#4e1b60]/10">
                            <i class="fas fa-graduation-cap text-xl bg-gradient-to-r from-[#121d3c] to-[#4e1b60] bg-clip-text text-transparent"></i>
                        </div>
                        <span class="text-xl font-semibold cursor-pointer bg-gradient-to-r from-[#121d3c] to-[#4e1b60] bg-clip-text text-transparent">EduShare</span>
                    </div>
                </a>

                @if (Route::has('login'))
                    <div class="flex justify-center items-center">
                        <a href="{{ route('welcome') }}" class="text-sm text-gray-800 hover:text-[#121d3c] transition-all duration-300 px-4 py-2 border-b-2 border-transparent hover:border-[#121d3c]">Home</a>
                        <a href="{{ url('/about') }}" class="text-sm text-gray-800 hover:text-[#121d3c] transition-all duration-300 px-4 py-2 border-b-2 border-transparent hover:border-[#121d3c]">About</a>
                        @auth
                            <div class="relative group">
                                <a href="#" class="text-sm text-gray-800 hover:text-[#121d3c] transition-all duration-300 px-4 py-2 border-b-2 border-transparent hover:border-[#121d3c] flex items-center">
                                    Resource
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transition-transform duration-300 group-hover:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </a>
                                <div class="absolute hidden group-hover:block w-48 bg-white shadow-lg rounded-md mt-0 z-50 transform transition-all duration-300 opacity-0 group-hover:opacity-100">
                                    <a href="{{ route('books') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#121d3c]/5 hover:text-[#121d3c] transition-colors duration-300">Books</a>
                                    <a href="{{ route('videos') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#121d3c]/5 hover:text-[#121d3c] transition-colors duration-300">Videos</a>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-sm text-gray-800 hover:text-[#121d3c] transition-all duration-300 px-4 py-2 border-b-2 border-transparent hover:border-[#121d3c]">Log out</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-800 hover:text-[#121d3c] transition-all duration-300 px-4 py-2 border-b-2 border-transparent hover:border-[#121d3c]">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-sm px-4 py-2 rounded-lg bg-gradient-to-r from-[#121d3c] to-[#4e1b60] text-white transition-all duration-300 hover:opacity-90 hover:shadow-md">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="border-t border-gray-200 bg-white">
        <div class="max-w-7xl mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <div>
                    <h3 class="text-lg font-semibold text-[#1E2A4A] mb-4">About EduShare</h3>
                    <p class="text-sm text-gray-600 mb-4">
                        Free educational resources platform providing quality materials to enhance your learning journey.
                    </p>
                    <div class="flex space-x-4">
                        <a href="https://x.com" class="text-gray-400 hover:text-[#4A1E6A] transition-colors" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://facebook.com" class="text-gray-400 hover:text-[#4A1E6A] transition-colors" target="_blank">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="https://instagram.com" class="text-gray-400 hover:text-[#4A1E6A] transition-colors" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-[#1E2A4A] mb-4">Resources</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('books') }}" class="text-sm text-gray-600 hover:text-[#4A1E6A] transition-colors">Books</a>
                        </li>
                        <li>
                            <a href="{{ route('videos') }}" class="text-sm text-gray-600 hover:text-[#4A1E6A] transition-colors">Videos</a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-[#1E2A4A] mb-4">Contact</h3>
                    <ul class="space-y-2">
                        <li class="text-sm text-gray-600">
                            <i class="fas fa-envelope mr-2 text-[#4A1E6A]"></i>
                            support@edushare.org
                        </li>
                        <li class="text-sm text-gray-600">
                            <i class="fas fa-map-marker-alt mr-2 text-[#4A1E6A]"></i>
                            Jakarta, Indonesia
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-[#1E2A4A] mb-4">Stay Updated</h3>
                    <p class="text-sm text-gray-600 mb-4">Subscribe to get updates about new resources.</p>
                    <form class="flex gap-2">
                        <input type="email"
                               placeholder="Enter your email"
                               class="flex-1 px-4 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4A1E6A] focus:border-transparent"
                        >
                        <button type="submit"
                                class="px-4 py-2 text-sm text-white bg-[#4A1E6A] rounded-lg hover:bg-opacity-90 transition-colors"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>

            <div class="pt-8 border-t border-gray-100">
                <div class="text-center transform transition-all duration-300 hover:-translate-y-1">
                    <p class="text-sm font-medium text-gray-500 hover:text-gray-600 transition-colors duration-200">
                        © {{ date('Y') }} EduShare. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
