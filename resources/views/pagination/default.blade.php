@if ($paginator->hasPages())
<ul class="pagination">
    @if ($paginator->onFirstPage())
    <li class="pagination__item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
        <span aria-hidden="true">«</span>
    </li>
    @else
    <li class="pagination__item">
        <a class="pagination__link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">«</a>
    </li>
    @endif

    @foreach ($elements as $element)
    @if (is_string($element))
    <li class="pagination__item disabled" aria-disabled="true">
        <span>{{ $element }}</span>
    </li>
    @endif

    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <li class="active pagination__item" aria-current="page"><span>{{ $page }}</span></li>
    @else
    <li class="pagination__item">
        <a class="pagination__link" href="{{ $url }}">{{ $page }}</a>
    </li>
    @endif
    @endforeach
    @endif
    @endforeach

    @if ($paginator->hasMorePages())
    <li class="pagination__item">
        <a class="pagination__link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">»</a>
    </li>
    @else
    <li class="disabled pagination__item" aria-disabled="true" aria-label="@lang('pagination.next')">
        <span aria-hidden="true">»</span>
    </li>
    @endif
</ul>
@endif
