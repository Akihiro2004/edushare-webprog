@extends('layout')
@section('content')
<div class="bg-gradient-to-br from-blue-950 to-slate-900 min-h-screen">
    <div class="max-w-6xl mx-auto px-6 py-20 relative">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZGVmcz48cGF0dGVybiBpZD0iZ3JpZCIgd2lkdGg9IjIwIiBoZWlnaHQ9IjIwIiBwYXR0ZXJuVW5pdHM9InVzZXJTcGFjZU9uVXNlIj48cGF0aCBkPSJNIDIwIDAgTCAwIDAgMCAyMCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSJ3aGl0ZSIgc3Ryb2tlLW9wYWNpdHk9IjAuMSIgc3Ryb2tlLXdpZHRoPSIxIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+PC9zdmc+')] opacity-20"></div>

        <div class="absolute top-0 left-1/4 w-[40rem] h-[40rem] bg-blue-500/20 rounded-full blur-3xl opacity-20 animate-pulse"></div>
        <div class="absolute bottom-0 right-1/4 w-[40rem] h-[40rem] bg-purple-500/20 rounded-full blur-3xl opacity-20 animate-pulse delay-1000"></div>

        <div class="relative text-center mb-12">
            <span class="inline-block px-4 py-1.5 mb-4 text-sm font-medium text-blue-100 bg-white/10 backdrop-blur-sm rounded-full">
                Library Management
            </span>
            <h1 class="text-4xl font-bold text-white mb-4">Add New Book</h1>
            <p class="text-gray-300 max-w-2xl mx-auto">
                Enrich our library collection by adding a new book. Please fill in all the required information to ensure proper cataloging.
            </p>
        </div>

        <form action="{{ route('storeBook') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="relative backdrop-blur-xl bg-white/5 rounded-3xl border border-white/10 overflow-hidden">
                <div class="p-10 space-y-12">
                    <div class="grid grid-cols-12 gap-10">
                        <div class="col-span-12 lg:col-span-4">
                            <div class="space-y-3">
                                <label class="block text-sm font-medium text-gray-200">Book Cover Image</label>
                                <div class="relative group aspect-[3/4] border-2 border-dashed border-white/20 rounded-2xl
                                            hover:border-white/40 transition-all duration-300
                                            hover:bg-white/5 overflow-hidden"
                                     id="coverPreviewContainer">
                                    <input type="file" name="thumbnail" accept="image/*"
                                           class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                           onchange="handleCoverUpload(this)">

                                    <div id="defaultUploadContent" class="absolute inset-0 flex flex-col items-center justify-center p-6">
                                        <svg class="w-12 h-12 text-white/40 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <p class="text-sm text-white/80 text-center">Drop your book cover here or <span class="text-white underline">browse</span></p>
                                        <p class="text-xs text-white/50 mt-2 text-center">Recommended: 800x1200px (JPG, PNG)</p>
                                        <p class="text-xs text-white/50 mt-1 text-center">Maximum size: 2MB</p>
                                    </div>

                                    <div id="previewContainer" class="hidden absolute inset-0">
                                        <img id="imagePreview"
                                             class="w-full h-full object-cover"
                                             alt="Book cover preview">

                                        <div class="absolute bottom-0 inset-x-0 bg-black/50 p-3 text-center">
                                            <p id="fileName" class="text-sm text-white truncate"></p>
                                        </div>
                                    </div>

                                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                        <p class="text-white text-sm font-medium">Change Cover</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @error('thumbnail')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <div class="col-span-12 lg:col-span-8 space-y-8">
                            <div class="grid grid-cols-2 gap-6">
                                <div class="col-span-2 space-y-3">
                                    <label class="block text-sm font-medium text-gray-200">Book Title</label>
                                    <input type="text" name="title" required placeholder="Enter the complete title of the book"
                                           class="w-full px-4 py-3.5 rounded-xl bg-white/5 border border-white/10
                                                  text-white placeholder:text-white/30
                                                  focus:outline-none focus:border-white/30 focus:ring-4 focus:ring-white/10
                                                  hover:border-white/20 hover:bg-white/[0.075]
                                                  transition-all duration-300">
                                </div>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="col-span-2 md:col-span-1 space-y-3">
                                    <label class="block text-sm font-medium text-gray-200">Author</label>
                                    <input type="text" name="author" required placeholder="Full name of the author"
                                           class="w-full px-4 py-3.5 rounded-xl bg-white/5 border border-white/10
                                                  text-white placeholder:text-white/30
                                                  focus:outline-none focus:border-white/30 focus:ring-4 focus:ring-white/10
                                                  hover:border-white/20 hover:bg-white/[0.075]
                                                  transition-all duration-300">
                                </div>
                                @error('author')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="col-span-2 md:col-span-1 space-y-3">
                                    <label class="block text-sm font-medium text-gray-200">Category</label>
                                    <select name="category_id" required
                                            class="w-full px-4 py-3.5 rounded-xl bg-white/5 border border-white/10
                                                   text-white/80
                                                   focus:outline-none focus:border-white/30 focus:ring-4 focus:ring-white/10
                                                   hover:border-white/20 hover:bg-white/[0.075]
                                                   transition-all duration-300">
                                        <option value="" class="bg-slate-900">Select the book's category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" class="bg-slate-900">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="space-y-3">
                                <label class="block text-sm font-medium text-gray-200">Description</label>
                                <textarea name="description" required
                                          placeholder="Provide a brief summary of the book's content"
                                          rows="4"
                                          class="w-full px-4 py-3.5 rounded-xl bg-white/5 border border-white/10
                                                 text-white placeholder:text-white/30
                                                 focus:outline-none focus:border-white/30 focus:ring-4 focus:ring-white/10
                                                 hover:border-white/20 hover:bg-white/[0.075]
                                                 transition-all duration-300"></textarea>
                            </div>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <div class="grid grid-cols-2 gap-6">
                                <div class="col-span-2 md:col-span-1 space-y-3">
                                    <label class="block text-sm font-medium text-gray-200">Publish Date</label>
                                    <input type="date" name="publish_date" required
                                           class="w-full px-4 py-3.5 rounded-xl bg-white/5 border border-white/10
                                                  text-white/80
                                                  focus:outline-none focus:border-white/30 focus:ring-4 focus:ring-white/10
                                                  hover:border-white/20 hover:bg-white/[0.075]
                                                  transition-all duration-300">
                                </div>
                                @error('publish_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <div class="col-span-2 md:col-span-1 space-y-3">
                                    <label class="block text-sm font-medium text-gray-200">Book File</label>
                                    <input type="file" name="book_path" accept=".pdf,.epub,.mobi" required
                                           class="block w-full text-sm text-white/60
                                                  file:mr-4 file:py-3.5 file:px-4
                                                  file:rounded-xl file:border file:border-white/10
                                                  file:text-sm file:font-medium
                                                  file:bg-white/10 file:text-white
                                                  file:hover:bg-white/20
                                                  transition-all duration-300">
                                    <p class="text-xs text-white/50">Accepted formats: PDF, EPUB, MOBI (max 50MB)</p>
                                </div>
                                @error('book_path')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative mt-4">
                    <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/5 to-white/0"></div>
                    <div class="px-10 py-6 relative flex items-center justify-between">
                        <p class="text-sm text-white/50">All fields are required for complete book information</p>
                        <button type="submit"
                                class="group inline-flex items-center gap-3 px-8 py-3.5
                                       bg-white/10 hover:bg-white/20
                                       rounded-xl border border-white/10 hover:border-white/30
                                       shadow-lg shadow-black/20
                                       hover:shadow-black/30 hover:scale-[1.02]
                                       backdrop-blur-sm
                                       transition-all duration-300">
                            <span class="text-sm font-medium text-white">Add to Library</span>
                            <svg class="w-5 h-5 text-white transform transition-transform duration-300 group-hover:translate-x-1"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function handleCoverUpload(input) {
        const defaultContent = document.getElementById('defaultUploadContent');
        const previewContainer = document.getElementById('previewContainer');
        const imagePreview = document.getElementById('imagePreview');
        const fileNameElement = document.getElementById('fileName');

        if (input.files && input.files[0]) {
            const file = input.files[0];

            fileNameElement.textContent = file.name;

            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                defaultContent.classList.add('hidden');
                previewContainer.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            defaultContent.classList.remove('hidden');
            previewContainer.classList.add('hidden');
        }
    }
</script>
@endsection
