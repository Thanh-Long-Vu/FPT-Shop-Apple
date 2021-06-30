@if ($paginator->hasPages())
    <div class="text-center text-md-left mb-3 mb-md-0">Showing {{$paginator->count()}} of {{$paginator->total()}} results</div>
    <ul class="pagination mb-0 pagination-shop justify-content-center justify-content-md-start">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item"><a class="page-link current" href="{{ $paginator->previousPageUrl() }}" rel="prev">Next</a></li>
        @endif
        @if ($paginator->hasMorePages())
            <li class="page-item "><a class="page-link current" href="{{ $paginator->nextPageUrl() }}" rel="next">Previous</a></li>
        @endif
    </ul>
@endif
