<!--Pagination-->
@php
    $currentPage = $pagination->currentPage();
    $lastPage = $pagination->lastPage();
@endphp

<div class="col-12 center-box">
    <nav>
        <ul class="pagination">
        @if($lastPage < 6)
            @for($page=1; $page <=$lastPage; $page++)
                @if($page==$currentPage)
                    <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $pagination->url($page) }}">{{ $page }}</a>
                    </li>
                @endif
            @endfor

        @else
            @if($currentPage - 1 < 2)
                @for($page=1; $page <=4; $page++)
                    @if($page==$currentPage)
                        <li class="page-item active">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $pagination->url($page) }}">{{ $page }}</a>
                        </li>
                    @endif
                @endfor
                <li class="page-item">
                    <span class="page-link pagination-three-dots disabled">...</span>
                </li>
                <li class="page-item">
                    <a class="page-link" href="{{ $pagination->url($lastPage) }}">{{ $lastPage }}</a>
                </li>

            @elseif($lastPage - $currentPage < 2) 
                <li class="page-item">
                    <a class="page-link" href="{{ $pagination->url(1) }}">1</a>
                </li>
                <li class="page-item">
                    <span class="page-link pagination-three-dots disabled">...</span>
                </li>

                @for($page = $lastPage - 3; $page <= $lastPage; $page++) 
                    @if($page==$currentPage) 
                        <li class="page-item active">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $pagination->url($page) }}">{{ $page }}</a>
                        </li>
                    @endif
                @endfor

            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $pagination->url(1) }}">1</a>
                </li>
                <li class="page-item">
                    <span class="page-link pagination-three-dots disabled">...</span>
                </li>
                <li class="page-item">
                    <a class="page-link" href="{{ $pagination->url($currentPage-1) }}">{{ $currentPage-1 }}</a>
                </li>
                <li class="page-item active">
                    <span class="page-link">{{ $currentPage }}</span>
                </li>
                <li class="page-item">
                    <a class="page-link" href="{{ $pagination->url($currentPage+1) }}">{{ $currentPage+1 }}</a>
                </li>
                <li class="page-item">
                    <span class="page-link pagination-three-dots disabled">...</span>
                </li>
                <li class="page-item">
                    <a class="page-link" href="{{ $pagination->url($lastPage) }}">{{ $lastPage }}</a>
                </li>
            @endif
        @endif
        </ul>
    </nav>
</div>
