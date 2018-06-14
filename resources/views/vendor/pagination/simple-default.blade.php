@if ($paginator->hasPages())
    {{--<ul class="pagination">
        --}}{{-- Previous Page Link --}}{{--
        @if ($paginator->onFirstPage())
            <li class="pagination__disabled"><span>Назад</span></li>
        @else
            <li><a class="pagination__link" href="{{ $paginator->previousPageUrl() }}" rel="prev">Назад</a></li>
        @endif

        --}}{{-- Next Page Link --}}{{--
        @if ($paginator->hasMorePages())
            <li><a class="pagination__link" href="{{ $paginator->nextPageUrl() }}" rel="next">Далее</a></li>
        @else
            <li class="pagination__disabled"><span>Далее</span></li>
        @endif
    </ul>--}}
    <div class="row pagination">
        <div class="col-6" style="text-align: right; padding-right: 10px">
            @if ($paginator->onFirstPage())
                <span class="pagination__disabled">Назад</span>
            @else
                <a class="pagination__link" href="{{ $paginator->previousPageUrl() }}" rel="prev">Назад</a>
            @endif
        </div>
        <div class="col-6" style="text-align: left; padding-left: 10px">
            @if ($paginator->hasMorePages())
               <a class="pagination__link" href="{{ $paginator->nextPageUrl() }}" rel="next">Далее</a>
            @else
                <span class="pagination__disabled">Далее</span>
            @endif
        </div>
    </div>
@endif
