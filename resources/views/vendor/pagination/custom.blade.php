@if($paginator->previousPageUrl() || $paginator->nextPageUrl())
    <div class="productBtns d-flex justify-content-between align-items-center">

        @if($paginator->previousPageUrl())
            <a href="{{ $paginator->previousPageUrl() }}" class="nextBtn text-center">Назад</a>
        @else
            <a href="#" class="prevBtn text-center" disabled="">Назад</a>
        @endif

        @if($paginator->nextPageUrl())
            <a href="{{ $paginator->nextPageUrl() }}" class="nextBtn text-center">Вперед</a>
        @else
            <a href="#" class="prevBtn text-center" disabled="">Вперед</a>
        @endif

    </div>
@endif
