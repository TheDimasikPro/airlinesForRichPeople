@if ($paginator->hasPages())
    
<ul class="pagination">
        @if ($paginator->onFirstPage())
            {{-- <li class="disabled"><span><i class="fas fa-angle-left"></i></span></li> --}}
        @else
            <li>
                <a href="<?php echo explode('?', $_SERVER['REQUEST_URI'])[0] ?>" rel="next">
                    <i class="fas fa-angle-double-left"></i>
                </a>
            </li>
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <i class="fas fa-angle-left"></i>
                </a>
            </li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else        
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                    <i class="fas fa-angle-right"></i>
                </a>
            </li>
            <li>
                <a href="<?php echo explode('?', $_SERVER['REQUEST_URI'])[0] ?>?page={{ $paginator->lastPage() }}" rel="next">
                    <i class="fas fa-angle-double-right"></i>
                </a>
            </li>
        @else
            {{-- <li class="disabled"><span><i class="fas fa-angle-right"></i></span></li> --}}
        @endif
        
    </ul>
@endif
