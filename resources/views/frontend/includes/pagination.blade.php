
<style>
    .pagination.pagination-ar li{
        float: right;

    }
    .pagination.pagination-ar>li:last-child>a, .pagination.pagination-ar>li:last-child>span{
        border-radius: 4px 0 0 4px;        
    }
    .pagination.pagination-ar>li:first-child>a, .pagination.pagination-ar>li:first-child>span {
        border-radius: 0 4px 4px 0;        
    }
</style>

  @if ($paginator->hasPages())
    <ul class="pagination pagination-ar">    
        @if ($paginator->onFirstPage())            
            <li class="page-item disabled">
                <span class="page-link">السابق</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">السابق</a>
            </li>            
        @endif


        
        {{-- @foreach ($elements as $element)
            
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif
            
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())                        
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach --}}


        
        @if ($paginator->hasMorePages())            
            <li class="page-item">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-link">المزيد</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">المزيد</span>
            </li>
        @endif
    </ul>
@endif