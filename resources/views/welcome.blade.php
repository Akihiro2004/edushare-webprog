@extends('layout')
@section('content')
<div class="relative min-h-[65vh] flex items-center">
    <div class="absolute inset-0 bg-gradient-to-b from-[#1E2A4A] to-[#4A1E6A]"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 py-20">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="lg:flex lg:flex-col lg:justify-center">
                <h1 class="text-5xl font-bold mb-8 text-white lg:max-w-xl">
                    Free Educational Resources for Everyone
                </h1>
                <p class="text-xl text-gray-200 leading-relaxed mb-8 lg:max-w-xl">
                    Access quality educational materials completely free. Download books and watch educational videos to enhance your learning journey.
                </p>
                @guest
                <div class="flex gap-4">
                    <a href="{{ route('register') }}"
                        class="text-sm px-8 py-4 rounded-lg bg-white text-[#4A1E6A] font-medium transition duration-300 hover:bg-opacity-90 hover:shadow-lg">
                        Get Started
                    </a>
                </div>
                @endguest
            </div>
            <div class="hidden lg:block">
                <img
                    src="{{ asset('Welcome/FamilyPic.png') }}"
                    alt="Education"
                    class="rounded-2xl object-cover shadow-xl w-full h-auto"
                />
            </div>
        </div>
    </div>
</div>

<div class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold mb-4 text-[#1E2A4A]">Explore Our Resources</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Choose from our extensive collection of educational materials designed to support your learning journey.
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <a href="{{ route('videos') }}" class="group relative overflow-hidden rounded-2xl shadow-lg transition-all duration-300 hover:shadow-xl">
                <div class="absolute inset-0 bg-gradient-to-r from-[#1E2A4A] to-[#4A1E6A] opacity-10 transition-opacity group-hover:opacity-20"></div>
                <div class="bg-white p-8 rounded-2xl border border-gray-100">
                    <div class="flex items-start gap-6">
                        <div class="w-16 h-16 rounded-xl flex items-center justify-center bg-[#4A1E6A] bg-opacity-10">
                            <i class="fas fa-video text-2xl text-[#4A1E6A]"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold mb-2 text-[#1E2A4A]">Educational Videos</h3>
                            <p class="text-gray-600 mb-4">
                                Watch educational videos from experienced instructors on various topics.
                            </p>
                            <span class="text-sm font-medium text-[#4A1E6A] flex items-center gap-2">
                                Browse Videos
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{ route('books') }}" class="group relative overflow-hidden rounded-2xl shadow-lg transition-all duration-300 hover:shadow-xl">
                <div class="absolute inset-0 bg-gradient-to-r from-[#1E2A4A] to-[#4A1E6A] opacity-10 transition-opacity group-hover:opacity-20"></div>
                <div class="bg-white p-8 rounded-2xl border border-gray-100">
                    <div class="flex items-start gap-6">
                        <div class="w-16 h-16 rounded-xl flex items-center justify-center bg-[#4A1E6A] bg-opacity-10">
                            <i class="fas fa-book text-2xl text-[#4A1E6A]"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold mb-2 text-[#1E2A4A]">Educational Books</h3>
                            <p class="text-gray-600 mb-4">
                                Access our extensive library of educational books. Download and read at your own pace.
                            </p>
                            <span class="text-sm font-medium text-[#4A1E6A] flex items-center gap-2">
                                Browse Books
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-[#1E2A4A]">Latest Videos</h2>
            <a href="{{ route('videos') }}" class="text-sm text-[#4A1E6A] hover:underline flex items-center gap-2">
                See all videos
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($latestVideos as $video)
                <a href="{{ route('videoDetail', ['video'=>$video->id]) }}" class="group block transform hover:scale-[1.01] transition-all duration-500 h-full">
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 h-full flex flex-col">
                        <div class="relative aspect-video overflow-hidden bg-gray-100">
                            @if($video->thumbnail)
                                <img src="{{ asset('storage/' . $video->thumbnail) }}"
                                    alt="{{ $video->title }}"
                                    class="h-full w-full object-cover transition-all duration-700 group-hover:scale-105 group-hover:brightness-90"
                                >
                            @else
                                <div class="h-full w-full flex items-center justify-center">
                                    <i class="fas fa-video text-4xl text-gray-400"></i>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-b from-black/5 to-black/20 opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                        </div>

                        <div class="p-7 flex flex-col flex-grow">
                            <div class="flex items-center gap-3 mb-5">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-purple-50 text-purple-700 text-xs font-medium rounded-md">
                                    <i class="fa-solid fa-graduation-cap text-purple-500"></i>
                                    {{$video->category->category_name}}
                                </span>
                                <time class="inline-flex items-center gap-1.5 text-xs font-medium text-gray-500">
                                    <i class="fa-regular fa-calendar"></i>
                                    {{$video->publish_date->format('d F, Y')}}
                                </time>
                            </div>

                            <h3 class="text-xl font-bold text-gray-800 mb-3 leading-snug group-hover:text-purple-700 transition-colors duration-300">
                                {{$video->title}}
                            </h3>

                            <p class="text-sm text-gray-600 leading-relaxed mb-4 line-clamp-3">
                                {{$video->description}}
                            </p>

                            <div class="flex items-center justify-between pt-4 border-t border-gray-100 mt-auto">
                                <div class="flex flex-col">
                                    <span class="text-xs text-gray-500 mb-1">Published by</span>
                                    <div class="flex items-center gap-2">
                                        <span class="text-sm font-semibold text-gray-900">{{$video->creator}}</span>
                                    </div>
                                </div>

                                <div class="h-9 w-9 rounded-full bg-purple-50 flex items-center justify-center text-purple-600
                                        group-hover:bg-purple-600 group-hover:text-white
                                        group-hover:translate-x-1
                                        transition-all duration-500">
                                    <i class="fa-solid fa-arrow-right text-sm"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>

<div class="bg-white">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-[#1E2A4A]">Latest Books</h2>
            <a href="{{ route('books') }}" class="text-sm text-[#4A1E6A] hover:underline flex items-center gap-2">
                See all books
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($latestBooks as $book)
            <a href="{{ route('bookDetail', ['book'=>$book->id]) }}" class="block group">
                <div class="relative h-[400px] rounded-xl bg-white shadow-sm ring-1 ring-black/5 overflow-hidden transition-all duration-300 hover:shadow-lg hover:ring-black/10">
                    <div class="absolute inset-0">
                        @if($book->thumbnail)
                            <img src="{{ asset('storage/' . $book->thumbnail) }}"
                                alt="{{ $book->title }}"
                                class="h-full w-full object-cover transition-all duration-700 ease-out group-hover:scale-105">
                        @else
                            <div class="h-full w-full flex items-center justify-center bg-gray-100">
                                <i class="fas fa-book text-4xl text-gray-400"></i>
                            </div>
                        @endif
                    </div>

                    <div class="absolute inset-x-0 bottom-0 z-20 transition-all duration-500 ease-out transform opacity-100 group-hover:translate-y-4 group-hover:opacity-0">
                        <div class="absolute inset-0 bottom-0 h-full bg-gradient-to-t from-black/80 via-black/50 to-transparent"></div>
                        <div class="relative p-6">
                            <h3 class="font-semibold text-xl text-white drop-shadow-lg text-shadow">
                                {{$book->title}}
                            </h3>
                        </div>
                    </div>

                    <div class="absolute inset-0 bg-white/95 translate-y-full transition-all duration-500 ease-out group-hover:translate-y-0">
                        <div class="h-full p-6 flex flex-col">
                            <span class="inline-block px-2 py-1 text-sm font-medium text-white bg-[#1E2A4A] rounded-full mb-3 w-fit opacity-0 transition-all delay-200 duration-300 group-hover:opacity-100">
                                {{$book->category->category_name}}
                            </span>

                            <h3 class="font-semibold text-xl text-gray-900 mb-2 opacity-0 transition-all delay-200 duration-300 group-hover:opacity-100 line-clamp-3">
                                {{$book->title}}
                            </h3>

                            <p class="text-sm text-gray-600 mb-4 opacity-0 transition-all delay-200 duration-300 group-hover:opacity-100 line-clamp-1">
                                by {{$book->author}}
                            </p>

                            <p class="text-sm text-gray-600 mb-auto opacity-0 transition-all delay-200 duration-300 group-hover:opacity-100 line-clamp-[8]">
                                {{$book->description}}
                            </p>

                            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                                <div class="flex items-center text-[#4A1E6A] opacity-0 transition-all delay-200 duration-300 group-hover:opacity-100">
                                    <span class="text-sm font-medium">View Details</span>
                                    <svg class="w-4 h-4 ml-1 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
         </div>
    </div>
</div>


@endsection
