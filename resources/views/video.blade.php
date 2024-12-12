@extends('layout')
@section('content')
<div class="relative bg-gradient-to-br from-[#3d1266] to-[#2a3875] overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZGVmcz48cGF0dGVybiBpZD0iZ3JpZCIgd2lkdGg9IjIwIiBoZWlnaHQ9IjIwIiBwYXR0ZXJuVW5pdHM9InVzZXJTcGFjZU9uVXNlIj48cGF0aCBkPSJNIDIwIDAgTCAwIDAgMCAyMCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSJ3aGl0ZSIgc3Ryb2tlLW9wYWNpdHk9IjAuMSIgc3Ryb2tlLXdpZHRoPSIxIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+PC9zdmc+')] opacity-20"></div>
        <div class="max-w-7xl mx-auto px-6 py-16 relative">
            <div class="relative">
                <div class="max-w-3xl">
                    <span class="inline-block px-4 py-1 mb-6 text-sm font-medium text-purple-100 bg-white/10 backdrop-blur-sm rounded-full">Educational Resources</span>
                    <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">Learn Through Video Courses</h1>
                    <p class="text-xl text-purple-100 leading-relaxed">Explore our curated collection of educational videos across various subjects. Unlock your potential with free, high-quality video learning resources.</p>
                </div>

                @if(auth()->user() && auth()->user()->role === 'admin')
                    <a href="{{ route('addVideoPage') }}"
                    class="absolute bottom-0 right-0 flex items-center gap-2 px-6 py-3.5
                            bg-white/10 hover:bg-white/20 text-white
                            rounded-full backdrop-blur-sm
                            shadow-lg shadow-black/20
                            hover:shadow-black/30 hover:scale-105
                            transition-all duration-300 group">
                        <span class="text-sm font-medium">Add New Video</span>
                        <svg class="w-5 h-5"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4v16m8-8H4"/>
                        </svg>
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div class="sticky top-0 bg-white/90 backdrop-blur-lg border-b border-gray-200 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                {{-- tombol category --}}
                <div class="flex flex-wrap items-center gap-3">
                    <a href="{{ route('videos') }}" class="px-4 py-2 text-sm font-medium rounded-full transition-all duration-300 {{$active_category == 0 ? "bg-purple-900 text-white shadow-lg shadow-purple-900/20 hover:shadow-purple-900/30 hover:scale-105" : "bg-gray-50 text-gray-700 hover:bg-purple-50 hover:text-purple-900 hover:shadow-md"}}">
                        All Categories
                    </a>

                    @foreach ($categories as $category)
                        <a href="{{ route('videos', ['category_id'=>$category->id]) }}" class="px-4 py-2 text-sm font-medium rounded-full transition-all duration-300 {{$active_category == $category->id ? "bg-purple-900 text-white shadow-lg shadow-purple-900/20 hover:shadow-purple-900/30 hover:scale-105" : "bg-gray-50 text-gray-700 hover:bg-purple-50 hover:text-purple-900 hover:shadow-md"}}">
                            {{$category->category_name}}
                        </a>
                    @endforeach
                </div>

                {{-- buat search bar --}}
                <form action="{{ route('videos') }}" method="GET">
                    <div class="relative flex items-center w-full md:w-auto md:min-w-[320px] group">
                        <input type="text" name="search" value="{{request('search')}}"
                               placeholder="Search for video courses..."
                               class="w-full pl-12 pr-4 py-3.5 rounded-full bg-gray-50 border-2 border-gray-100 text-sm font-medium placeholder:text-gray-400
                                      focus:outline-none focus:border-purple-900/30 focus:ring-4 focus:ring-purple-900/10
                                      shadow-sm hover:border-purple-900/20 hover:shadow-md
                                      transition-all duration-300"
                        >
                        <div class="absolute left-4 text-gray-400 group-focus-within:text-purple-600 transition-colors duration-300">
                            <i class="fa-solid fa-magnifying-glass text-lg"></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 py-16">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($videos as $video)
                    <a href="{{ route('videoDetail', ['video'=>$video->id]) }}" class="group block transform hover:scale-[1.01] transition-all duration-500 h-full">
                        <div class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden border border-gray-100 h-full flex flex-col">
                            <div class="relative aspect-video overflow-hidden bg-gray-100">
                                <img src="{{ asset('storage/'.$video->thumbnail) }}"
                                    alt="Video Course Thumbnail"
                                    class="h-full w-full object-cover transition-all duration-700 group-hover:scale-105 group-hover:brightness-90"
                                >
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
            <div id="pagination-container">
                {{$videos->links()}}
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const paginationContainer = document.getElementById('pagination-container');

            if (paginationContainer) {
                paginationContainer.addEventListener('click', function(e) {
                    const link = e.target.closest('a');
                    if (link && link.href) {
                        e.preventDefault();

                        const currentScroll = window.scrollY;

                        fetch(link.href)
                            .then(response => response.text())
                            .then(html => {
                                const temp = document.createElement('div');
                                temp.innerHTML = html;

                                const booksGrid = temp.querySelector('.grid');
                                const newPagination = temp.querySelector('#pagination-container');

                                if (booksGrid && newPagination) {
                                    document.querySelector('.grid').innerHTML = booksGrid.innerHTML;
                                    paginationContainer.innerHTML = newPagination.innerHTML;

                                    window.history.pushState({}, '', link.href);

                                    window.scrollTo(0, currentScroll);
                                }
                            })
                            .catch(error => {
                                window.location.href = link.href;
                            });
                    }
                });
            }
        });
    </script>
@endsection
