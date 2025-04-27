@if ($paginator->hasPages())
    <div class="pagination-wrapper">
        <ul class="pagination clearfix">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li><a class="disabled"><i class="fas fa-angle-left"></i></a></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}"><i class="fas fa-angle-left"></i></a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><a class="disabled">{{ $element }}</a></li>
                @endif

                {{-- Array of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="current">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}"><i class="fas fa-angle-right"></i></a></li>
            @else
                <li><a class="disabled"><i class="fas fa-angle-right"></i></a></li>
            @endif
        </ul>
    </div>
@endif
