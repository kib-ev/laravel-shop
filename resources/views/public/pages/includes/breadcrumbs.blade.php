<ul class="breadcrumb">
    <li><a href="/">{{ __('ui.'.'home') }}</a> <span class="divider">/</span></li>

    @if(isset($category))
        <li class="active">{{ $category->name }}</li>
    @elseif(isset($product))
        <li><a href="/products">{{ __('ui.'.'products') }}</a> <span class="divider">/</span></li>
        <li class="active">{{ __('ui.'.'Product Details') }} </li>
    @endif
</ul>
