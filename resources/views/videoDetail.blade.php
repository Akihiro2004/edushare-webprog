@extends('layout')
@section('content')
    <div class="relative bg-gradient-to-br from-[#2d0d47] to-[#1c2654] flex-1">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZGVmcz48cGF0dGVybiBpZD0iZ3JpZCIgd2lkdGg9IjIwIiBoZWlnaHQ9IjIwIiBwYXR0ZXJuVW5pdHM9InVzZXJTcGFjZU9uVXNlIj48cGF0aCBkPSJNIDIwIDAgTCAwIDAgMCAyMCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSJ3aGl0ZSIgc3Ryb2tlLW9wYWNpdHk9IjAuMSIgc3Ryb2tlLXdpZHRoPSIxIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+PC9zdmc+')] opacity-20"></div>
        <div class="max-w-7xl mx-auto px-6 py-8 relative">
            <a href="{{ route('videos') }}" class="inline-flex items-center text-purple-100 mb-6 group hover:text-purple-200 transition-all duration-300">
                <i class="fa-solid fa-arrow-left mr-2 transform group-hover:-translate-x-1 transition-transform duration-300"></i>
                Back to Videos
            </a>

            <!-- Video Section - Centered with max width -->
            <div class="flex justify-center mb-12">
                <div class="w-full max-w-3xl">
                    <div class="group relative aspect-video rounded-xl bg-white/5 backdrop-blur-sm shadow-xl ring-1 ring-white/10 overflow-hidden">
                        <iframe
                            class="w-full h-full"
                            src="{{$video->embed_url}}"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>

            <div class="max-w mx-auto">
                <div class="text-center mb-8">
                    <h1 class="text-4xl font-bold text-white mb-3 hover:text-purple-100 transition-colors duration-300">{{$video->title}}</h1>
                    <p class="text-xl text-purple-100">by {{$video->creator}}</p>
                </div>

                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div class="group bg-white/10 backdrop-blur-sm rounded-xl p-5 transition-all duration-300 hover:-translate-y-1 hover:bg-white/15">
                        <p class="text-sm text-purple-200 mb-2">Published</p>
                        <p class="text-lg font-medium text-white group-hover:text-purple-100 transition-colors">{{$video->publish_date->format('d F, Y')}}</p>
                    </div>
                    <div class="group bg-white/10 backdrop-blur-sm rounded-xl p-5 transition-all duration-300 hover:-translate-y-1 hover:bg-white/15">
                        <p class="text-sm text-purple-200 mb-2">Category</p>
                        <p class="text-lg font-medium text-white group-hover:text-purple-100 transition-colors">{{$video->category->category_name}}</p>
                    </div>
                </div>

                <div class="bg-white/5 backdrop-blur-sm rounded-xl p-6 transition-all duration-300">
                    <h2 class="text-xl font-bold text-white mb-4 flex items-center group">
                        About this video
                        <i class="fa-solid fa-circle-info ml-2 text-purple-200 opacity-0 group-hover:opacity-100 transition-opacity duration-300 fa-bounce"></i>
                    </h2>
                    <p class="text-purple-100 leading-relaxed transition-colors duration-300 hover:text-purple-50">
                        {{$video->description}}
                    </p>
                </div>

                @if (auth()->user() && auth()->user()->role === 'admin')
                    <div class="mt-8 flex justify-end gap-4">
                        <a href="{{ route('editVideoPage', ['video' => $video->id]) }}"
                        class="group inline-flex items-center gap-2 px-6 py-2.5
                                bg-white/5 hover:bg-blue-500/20
                                rounded-xl border border-white/10 hover:border-blue-500/30
                                text-white/70 hover:text-blue-400
                                shadow-lg shadow-black/20
                                hover:shadow-blue-900/20 hover:scale-[1.02]
                                backdrop-blur-sm
                                transition-all duration-300">
                            <i class="fa-solid fa-edit text-sm"></i>
                            <span class="text-sm font-medium">Edit Video</span>
                        </a>

                        <form action="{{ route('deleteVideo', ['video' => $video->id]) }}"
                            method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this video? This action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="group inline-flex items-center gap-2 px-6 py-2.5
                                        bg-white/5 hover:bg-red-500/10
                                        rounded-xl border border-white/10 hover:border-red-500/20
                                        text-white/70 hover:text-red-300
                                        shadow-lg shadow-black/20
                                        hover:shadow-red-900/20 hover:scale-[1.02]
                                        backdrop-blur-sm
                                        transition-all duration-300">
                                <i class="fa-solid fa-trash text-sm"></i>
                                <span class="text-sm font-medium">Delete Video</span>
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
