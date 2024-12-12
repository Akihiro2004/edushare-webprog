@extends('layout')
@section('content')
    <div class="relative bg-gradient-to-br from-blue-950 to-slate-900 overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZGVmcz48cGF0dGVybiBpZD0iZ3JpZCIgd2lkdGg9IjIwIiBoZWlnaHQ9IjIwIiBwYXR0ZXJuVW5pdHM9InVzZXJTcGFjZU9uVXNlIj48cGF0aCBkPSJNIDIwIDAgTCAwIDAgMCAyMCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSJ3aGl0ZSIgc3Ryb2tlLW9wYWNpdHk9IjAuMSIgc3Ryb2tlLXdpZHRoPSIxIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+PC9zdmc+')] opacity-20"></div>
        <div class="max-w-7xl mx-auto px-6 py-16 relative">
            <div class="relative">
                <div class="max-w-3xl">
                    <span class="inline-block px-4 py-1 mb-6 text-sm font-medium text-blue-100 bg-white/10 backdrop-blur-sm rounded-full">Educational Resources</span>
                    <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">Discover Knowledge Through Books</h1>
                    <p class="text-xl text-blue-100 leading-relaxed">Explore our carefully curated collection of educational books across various subjects. Unlock your potential with free access to quality resources.</p>
                </div>

                @if(auth()->user() && auth()->user()->role === 'admin')
                    <a href="{{ route('addBookPage') }}"
                    class="absolute bottom-0 right-0 flex items-center gap-2 px-6 py-3.5
                            bg-white/10 hover:bg-white/20 text-white
                            rounded-full backdrop-blur-sm
                            shadow-lg shadow-black/20
                            hover:shadow-black/30 hover:scale-105
                            transition-all duration-300 group">
                        <span class="text-sm font-medium">Add New Book</span>
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
                {{-- opsi kategori --}}
                <div class="flex flex-wrap items-center gap-3">
                    <a href="{{ route('books') }}" class="px-4 py-2 text-sm font-medium rounded-full transition-all duration-300 {{$active_category == 0 ? "bg-blue-950 text-white shadow-lg shadow-blue-950/20 hover:shadow-blue-950/30 hover:scale-105" : "bg-gray-50 text-gray-700 hover:bg-purple-50 hover:text-purple-900 hover:shadow-md"}}">
                        All Categories
                    </a>

                    @foreach ($categories as $category)
                        <a href="{{ route('books', ['category_id'=>$category->id]) }}" class="px-4 py-2 text-sm font-medium rounded-full transition-all duration-300 {{$active_category == $category->id ? "bg-blue-950 text-white shadow-lg shadow-blue-950/20 hover:shadow-blue-950/30 hover:scale-105" : "bg-gray-50 text-gray-700 hover:bg-purple-50 hover:text-purple-900 hover:shadow-md"}}">
                            {{$category->category_name}}
                        </a>
                    @endforeach
                </div>

                {{-- Search Bar --}}
                <form action="{{ route('books') }}" method="GET">
                    <div class="relative flex items-center w-full md:w-auto md:min-w-[320px] group">
                        <input type="text" name="search" value="{{request('search')}}"
                               placeholder="Search for books..."
                               class="w-full pl-12 pr-4 py-3.5 rounded-full bg-gray-50 border-2 border-gray-100 text-sm font-medium placeholder:text-gray-400
                                      focus:outline-none focus:border-blue-900/30 focus:ring-4 focus:ring-blue-900/10
                                      shadow-sm hover:border-blue-900/20 hover:shadow-md
                                      transition-all duration-300"
                        >
                        <div class="absolute left-4 text-gray-400 group-focus-within:text-blue-800 transition-colors duration-300">
                            <i class="fa-solid fa-magnifying-glass text-lg"></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 py-16">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach ($books as $book)
                    <a href="{{ route('bookDetail', ['book'=>$book->id]) }}" class="block group">
                        <div class="relative h-[400px] rounded-xl bg-white shadow-sm ring-1 ring-black/5 overflow-hidden transition-all duration-300 hover:shadow-lg hover:ring-black/10">
                            <div class="absolute inset-0">
                                <img src="{{ asset('storage/'.$book->thumbnail) }}"
                                    alt="Book Cover"
                                    class="h-full w-full object-cover transition-all duration-700 ease-out group-hover:scale-105">
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
                                    <span class="inline-block px-2 py-1 text-sm font-medium text-white bg-blue-950 rounded-full mb-3 w-fit opacity-0 transition-all delay-200 duration-300 group-hover:opacity-100">
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
                                        <div class="flex items-center text-blue-950 opacity-0 transition-all delay-200 duration-300 group-hover:opacity-100">
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
            <div id="pagination-container">
                {{$books->links()}}
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
