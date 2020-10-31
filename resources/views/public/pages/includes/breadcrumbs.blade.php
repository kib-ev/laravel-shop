<ul class="breadcrumb">
    <li><a href="/">{{ __('ui.'.'home') }}</a> <span class="divider">/</span></li>

    @if(isset($product))
        @php
            $category = $product->category;
        @endphp
    @endif

    @if(isset($category))
        <li>
            <a href="{{ route('products.index') }}">
                {{ __('ui.products') }}
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
    @endif

    @if(isset($product))
        <li>
            <a href="{{ route('products.categories.show', $category->id) }}">
                {{ $category->name }}
            </a>
            <span class="divider"> / </span>
        </li>
        <li class="active">{{ $product->name }}</li>
    @elseif(isset($category))
        <li class="active">{{ $category->name }}</li>
    @endif

</ul>
