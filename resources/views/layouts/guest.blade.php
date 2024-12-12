<!-- resources/views/layouts/guest.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50/50">
        <!-- Background Pattern -->
        <div class="fixed inset-0 -z-10 overflow-hidden">
            <div class="absolute inset-0 bg-[#121d3c]/5 backdrop-blur-3xl"></div>
            <div class="absolute -top-1/2 -right-1/2 w-full h-full rotate-12 bg-gradient-to-b from-[#121d3c]/10 to-transparent"></div>
            <div class="absolute -bottom-1/2 -left-1/2 w-full h-full -rotate-12 bg-gradient-to-t from-[#4e1b60]/10 to-transparent"></div>
        </div>

        <div class="min-h-screen flex flex-col sm:justify-center items-center p-6">
            <!-- Main Container -->
            <div class="w-full max-w-md">
                <!-- Card -->
                <div class="bg-white/80 backdrop-blur-xl shadow-xl rounded-2xl overflow-hidden">
                    <!-- Header Accent -->
                    <div class="h-2 bg-gradient-to-r from-[#121d3c] to-[#4e1b60]"></div>

                    <!-- Content -->
                    <div class="p-8">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
