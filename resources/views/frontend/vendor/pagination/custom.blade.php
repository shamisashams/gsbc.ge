@if ($paginator->hasPages())
    <div class="page-nums">
        <div class="nums">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">
                        <button class="arrow"><img src="/frontend-assets/gsbc/img/icons/arrows/left-arrow.svg"></button>
                    </span>
                </a>
            @else
                <a href="{{$paginator->previousPageUrl()}}">
                    <button class="arrow">
                        <img src="/frontend-assets/gsbc/img/icons/arrows/left-arrow.svg">
                    </button>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a class="disabled" aria-disabled="true"><span>{{ $element }}</span></a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="active" aria-current="page"><span>{{ $page }}</span></a>
                        @else
                            <a onclick="window.location.href='{{$url}}'">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{$paginator->nextPageUrl() }}"
                   aria-label="@lang('pagination.next')">
                    <button class="arrow">
                        <img src="/frontend-assets/gsbc/img/icons/arrows/right-arrow.svg">
                    </button>
                </a>
            @else
                <a aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">
                        <button class="arrow"><img src="/frontend-assets/gsbc/img/icons/arrows/right-arrow.svg"></button>
                    </span>
                </a>
            @endif
        </div>
    </div>
@endif
