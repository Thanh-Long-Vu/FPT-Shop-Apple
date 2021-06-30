@if ($paginator->hasPages())
<div class="text-center text-md-left mb-3 mb-md-0">Showing {{$paginator->count()}} of {{$paginator->total()}} results</div>
    <ul class="pagination mb-0 pagination-shop justify-content-center justify-content-md-start">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" ><a class="page-link current" >&laquo;</a></li>
        @else
            <li class="page-item"><a class="page-link current" href="{{ $paginator->toArray()['first_page_url'] }}">First</a></li>
            <li class="page-item"><a class="page-link current" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
         @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item  disabled"><a class="page-link ">{{ $page }}</a></li>
                    @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                        <li class="page-item current"><a class="page-link current" href="{{ $url }}">{{ $page }}</a></li>
                    @elseif ($page == $paginator->lastPage() - 1)
                        <li class="page-item current">...</li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page --}}
        @if ($paginator->hasMorePages())
            <li class="page-item "><a class="page-link current" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
            <li class="page-item "><a class="page-link current" href="{{ $paginator->toArray()['last_page_url'] }}">Last</a></li>
        @else
            <li class="page-item disabled"><a class="page-link current" rel="next">&raquo;</a></li>
        @endif
    </ul>
@endif