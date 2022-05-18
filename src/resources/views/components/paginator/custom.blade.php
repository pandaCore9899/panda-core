<div class="panda-list__table__pagination width-80" style="display:flex;justify-content: flex-end;">
    {{-- {{ $data->onEachSide(1)->render()}} --}}
    @if ($data->hasPages())
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if (!$data->onFirstPage())
                <li><a href="{{ $data->appends(request()->query->all())->previousPageUrl() }}" rel="prev">{{ __('Prev') }}</a></li>
            @endif
            <a><b>{{ 'Page ' . $data->currentPage() . '  of  ' . $data->lastPage() }}</b></a>
            {{-- Next Page Link --}}
            @if ($data->hasMorePages())
                <li><a href="{{ $data->appends(request()->query->all())->nextPageUrl() }}" rel="next">{{ __('Next') }}</a></li>
            @endif
        </ul>
    @endif
</div>
