@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-between">
        <div class="d-flex justify-content-between flex-fill d-sm-none">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">@lang('pagination.previous')</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">@lang('pagination.next')</span>
                    </li>
                @endif
            </ul>
        </div>

        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
            <div>
                <p class="small text-muted">
                    {!! __('Showing') !!}
                    <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="fw-semibold">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">&rsaquo;</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif
<style>
.pagination-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 20px 0;
}

.pagination-info {
    margin-bottom: 10px;
    font-size: 14px;
    color: #555;
    text-align: center;
    width: 100%;
    padding-bottom: 10px;
}

.pagination {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
}

.pagination .page-item {
    margin: 0 8px;
}

.pagination .page-link {
    display: inline-block;
    padding: 12px 20px;
    color: #fff;
    background-color: #e0e0e0; /* Grey for inactive pages */
    border-radius: 50%;
    text-decoration: none;
    transition: all 0.3s;
}

.pagination .page-link:hover {
    background-color: #ff6f61; /* Hover color for links */
    color: #fff;
}

.pagination .page-item.active .page-link {
    background-color: #1e90ff; /* Blue for active page */
    color: white;
    font-weight: bold;
}

.pagination .page-item.disabled .page-link {
    background-color: #ccc; /* Grey for disabled pages */
    color: #888;
    cursor: not-allowed;
}

.pagination .page-item a {
    display: inline-block;
    font-weight: normal;
}

.pagination .page-item:first-child .page-link {
    background-color: #e0e0e0;
    color: #555;
}

.pagination .page-item:last-child .page-link {
    background-color: #e0e0e0;
    color: #555;
}

.pagination .page-item .page-link[aria-label="Previous"],
.pagination .page-item .page-link[aria-label="Next"] {
    background-color: #ff6f61; /* Red for previous/next buttons */
    color: white;
    border-radius: 50%;
    padding: 12px 16px;
}

.pagination .page-item .page-link[aria-label="Previous"]:hover,
.pagination .page-item .page-link[aria-label="Next"]:hover {
    background-color: #d04f42; /* Darker red on hover */
}

</style>