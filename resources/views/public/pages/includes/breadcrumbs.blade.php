<ul class="breadcrumb">
    <li><a href="/">{{ __('ui.'.'home') }}</a> <span class="divider">/</span></li>

    @if(request()->route()->getName() == 'products.categories.show')

        @if(isset($category))
            <li>
                <a href="{{ route('products.index') }}">
                    {{ __('ui.'.'products') }}
                </a>
                <span class="divider"> / </span>
            </li>

            @if($category->parent_id)
                <li>
                    <a href="{{ route('products.categories.show', $category->parent_id) }}">
                        {{ $category->parentCategory->name }}
                    </a>
                    <span class="divider"> / </span>
                </li>
            @endif

            <li class="active">
                {{ $category->name }}
            </li>
        @endif
    @endif

</ul>
