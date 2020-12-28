@if ($paginator->hasPages())
    <div class="page-nums">
        <div class="nums">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">
                                      <button class="arr">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" x="0" y="0" viewBox="0 0 492.004 492.004"
                         style="enable-background:new 0 0 512 512" xml:space="preserve"><g
                            transform="matrix(-1,1.2246467991473532e-16,-1.2246467991473532e-16,-1,492.00405883789074,492.0039672851562)">
                            <g xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path
                                        d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12    c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028    c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265    c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"
                                        fill="#000000" data-original="#000000" style=""/>
                                </g>
                            </g></svg>

                </button>
                    </span>
                </a>
            @else
                <a href="{{$paginator->previousPageUrl()}}">
                    <button class="arr">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                             xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" x="0" y="0"
                             viewBox="0 0 492.004 492.004"
                             style="enable-background:new 0 0 512 512" xml:space="preserve"><g
                                transform="matrix(-1,1.2246467991473532e-16,-1.2246467991473532e-16,-1,492.00405883789074,492.0039672851562)">
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path
                                            d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12    c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028    c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265    c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"
                                            fill="#000000" data-original="#000000" style=""/>
                                    </g>
                                </g></svg>

                    </button>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a class="disabled n" aria-disabled="true"><span>{{ $element }}</span></a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="active n" aria-current="page"><span>{{ $page }}</span></a>
                        @else
                            <a class="n" onclick="window.location.href='{{$url}}'">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{$paginator->nextPageUrl() }}"
                   aria-label="@lang('pagination.next')">
                    <button class="arr">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004;"
                             xml:space="preserve">
<g>
    <g>
        <path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12
            c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028
            c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265
            c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/>
    </g>
</g>
</svg>
                    </button>
                </a>
            @else
                <a aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">
                       <button class="arr">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 492.004 492.004" style="enable-background:new 0 0 492.004 492.004;"
                         xml:space="preserve">
<g>
    <g>
        <path d="M382.678,226.804L163.73,7.86C158.666,2.792,151.906,0,144.698,0s-13.968,2.792-19.032,7.86l-16.124,16.12
            c-10.492,10.504-10.492,27.576,0,38.064L293.398,245.9l-184.06,184.06c-5.064,5.068-7.86,11.824-7.86,19.028
            c0,7.212,2.796,13.968,7.86,19.04l16.124,16.116c5.068,5.068,11.824,7.86,19.032,7.86s13.968-2.792,19.032-7.86L382.678,265
            c5.076-5.084,7.864-11.872,7.848-19.088C390.542,238.668,387.754,231.884,382.678,226.804z"/>
    </g>
</g>
</svg>
                </button>
                    </span>
                </a>
            @endif
        </div>
    </div>
@endif
