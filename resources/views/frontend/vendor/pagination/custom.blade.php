@if ($paginator->hasPages())
    <div class="page-numbers">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <button  aria-label="@lang('pagination.previous')">
                <span aria-hidden="true">&lsaquo;</span>
            </button>
        @else
            <button onclick="window.location.href='{{$paginator->previousPageUrl()}}'">
                &lsaquo;
            </button>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <button class="disabled" aria-disabled="true"><span>{{ $element }}</span></button>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <button class="active" aria-current="page"><span>{{ $page }}</span></button>
                    @else
                        <button onclick="window.location.href='{{$url}}'">{{ $page }}</button>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <button onclick="window.location.href='{{$paginator->nextPageUrl() }}'"
                    aria-label="@lang('pagination.next')">
                &rsaquo;
            </button>
        @else
            <button aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true">&rsaquo;</span>
            </button>
        @endif
    </div>
@endif
