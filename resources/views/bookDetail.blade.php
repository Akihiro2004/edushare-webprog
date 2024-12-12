@extends('layout')
@section('content')
    <div class="relative bg-gradient-to-br from-blue-950 to-slate-900 flex-1">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZGVmcz48cGF0dGVybiBpZD0iZ3JpZCIgd2lkdGg9IjIwIiBoZWlnaHQ9IjIwIiBwYXR0ZXJuVW5pdHM9InVzZXJTcGFjZU9uVXNlIj48cGF0aCBkPSJNIDIwIDAgTCAwIDAgMCAyMCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSJ3aGl0ZSIgc3Ryb2tlLW9wYWNpdHk9IjAuMSIgc3Ryb2tlLXdpZHRoPSIxIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+PC9zdmc+')] opacity-20"></div>
        <div class="max-w-7xl mx-auto px-6 py-8 relative">
            <a href="{{ route('books') }}" class="inline-flex items-center text-blue-100 mb-6 group hover:text-blue-200 transition-all duration-300">
                <i class="fa-solid fa-arrow-left mr-2 transform group-hover:-translate-x-1 transition-transform duration-300"></i>
                Back to Books
            </a>

            <div class="grid md:grid-cols-12 gap-8">
                <div class="md:col-span-4">
                    <div class="group relative aspect-[3/4] rounded-xl bg-white/5 backdrop-blur-sm shadow-xl ring-1 ring-white/10 overflow-hidden mb-6">
                        <img src="{{ asset('storage/'.$book->thumbnail) }}" alt="Book Cover" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                    </div>

                    <a href="{{ route('downloadBook', ['book'=>$book->id]) }}" class="group w-full px-8 py-4 bg-white/10 hover:bg-white/20 backdrop-blur-sm text-blue-200 rounded-xl font-medium transition-all duration-300 ring-1 ring-white/20 hover:ring-white/30 flex items-center justify-center relative overflow-hidden hover:-translate-y-1">
                        <i class="fa-solid fa-download mr-2 group-hover:fa-bounce"></i>
                        Download Book
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                    </a>
                </div>

                <div class="md:col-span-8">
                    <div class="flex justify-between items-start mb-4">
                        <span class="inline-block px-4 py-1 text-sm font-medium text-blue-100 bg-white/10 backdrop-blur-sm rounded-full hover:bg-white/20 transition-colors duration-300">{{$book->category->category_name}}</span>
                    </div>

                    <h1 class="text-4xl font-bold text-white mb-3 hover:text-blue-100 transition-colors duration-300">{{$book->title}}</h1>
                    <p class="text-xl text-blue-100 mb-6">{{$book->author}}</p>

                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-6">
                        <div class="group bg-white/10 backdrop-blur-sm rounded-xl p-4 transition-all duration-300 hover:-translate-y-1 hover:bg-white/15">
                            <p class="text-sm text-blue-200 mb-1">Published</p>
                            <p class="text-lg font-medium text-white group-hover:text-blue-100 transition-colors">{{$book->publish_date->format('d F, Y')}}</p>
                        </div>
                        <div class="group bg-white/10 backdrop-blur-sm rounded-xl p-4 transition-all duration-300 hover:-translate-y-1 hover:bg-white/15">
                            <p class="text-sm text-blue-200 mb-1">Pages</p>
                            <p class="text-lg font-medium text-white group-hover:text-blue-100 transition-colors">{{$page_count}}</p>
                        </div>
                        <div class="group bg-white/10 backdrop-blur-sm rounded-xl p-4 transition-all duration-300 hover:-translate-y-1 hover:bg-white/15">
                            <p class="text-sm text-blue-200 mb-1">File Size</p>
                            <p class="text-lg font-medium text-white group-hover:text-blue-100 transition-colors">{{$file_size}} MB</p>
                        </div>
                    </div>

                    <h2 class="text-xl font-bold text-white mb-4 flex items-center group">
                        About this book
                        <i class="fa-solid fa-circle-info ml-2 text-blue-200 opacity-0 group-hover:opacity-100 transition-opacity duration-300 fa-bounce"></i>
                    </h2>

                    <div class="relative">
                        <p class="text-blue-100 leading-relaxed mb-6 transition-colors duration-300 hover:text-blue-50">
                            {{$book->description}}
                        </p>
                    </div>

                    @if (auth()->user() && auth()->user()->role === 'admin')
                        <div class="flex gap-4">
                            <a href="{{ route('editBookPage', ['book' => $book->id]) }}"
                                class="group inline-flex items-center gap-2 px-6 py-2.5
                                    bg-white/5 hover:bg-blue-500/20
                                    rounded-xl border border-white/10 hover:border-blue-500/30
                                    text-white/70 hover:text-blue-400
                                    shadow-lg shadow-black/20
                                    hover:shadow-blue-900/20 hover:scale-[1.02]
                                    backdrop-blur-sm
                                    transition-all duration-300">
                                <i class="fa-solid fa-edit text-sm"></i>
                                <span class="text-sm font-medium">Edit Book</span>
                            </a>

                            <form action="{{ route('deleteBook', ['book' => $book->id]) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this book? This action cannot be undone.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="group inline-flex items-center gap-2 px-6 py-2.5
                                            bg-white/5 hover:bg-red-500/20
                                            rounded-xl border border-white/10 hover:border-red-500/30
                                            text-white/70 hover:text-red-400
                                            shadow-lg shadow-black/20
                                            hover:shadow-red-900/20 hover:scale-[1.02]
                                            backdrop-blur-sm
                                            transition-all duration-300">
                                    <i class="fa-solid fa-trash text-sm"></i>
                                    <span class="text-sm font-medium">Delete Book</span>
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
