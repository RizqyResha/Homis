<div class="flex items-center justify-center mb-5 ">
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="px-2 py-1 mr-2 text-gray-500 bg-gray-200 rounded-md cursor-not-allowed">&laquo; Previous</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="mr-2 px-2 py-1 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">&laquo; Previous</a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="mr-2 px-2 py-1 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">Next &raquo;</a>
            @else
                <span class="mr-2 px-2 py-1 text-gray-500 bg-gray-200 rounded-md cursor-not-allowed">Next &raquo;</span>
            @endif
        </nav>
    @endif
</div>
