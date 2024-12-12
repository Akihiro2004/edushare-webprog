@if ($paginator->hasPages())
    <nav id="pagination-container" role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-center mt-12">
        <div class="flex flex-wrap justify-center gap-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="px-4 py-2 text-sm font-medium rounded-full bg-gray-50 text-gray-400 opacity-50 cursor-not-allowed">
                    <i class="fa-solid fa-chevron-left mr-1"></i>
                    Previous
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 text-sm font-medium rounded-full bg-gray-50 text-gray-700 hover:bg-purple-50 hover:text-purple-900 hover:shadow-md transition-all duration-300">
                    <i class="fa-solid fa-chevron-left mr-1"></i>
                    Previous
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="px-4 py-2 text-sm font-medium rounded-full bg-gray-50 text-gray-400">
                        {{ $element }}
                    </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-4 py-2 text-sm font-medium rounded-full bg-blue-950 text-white shadow-lg shadow-blue-950/20 hover:shadow-blue-950/30 hover:scale-105 transition-all duration-300">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="px-4 py-2 text-sm font-medium rounded-full bg-gray-50 text-gray-700 hover:bg-purple-50 hover:text-purple-900 hover:shadow-md transition-all duration-300">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 text-sm font-medium rounded-full bg-gray-50 text-gray-700 hover:bg-purple-50 hover:text-purple-900 hover:shadow-md transition-all duration-300">
                    Next
                    <i class="fa-solid fa-chevron-right ml-1"></i>
                </a>
            @else
                <span class="px-4 py-2 text-sm font-medium rounded-full bg-gray-50 text-gray-400 opacity-50 cursor-not-allowed">
                    Next
                    <i class="fa-solid fa-chevron-right ml-1"></i>
                </span>
            @endif
        </div>
    </nav>
@endif
