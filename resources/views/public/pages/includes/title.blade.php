@if(isset($category))
    {{ $category->name }}
@elseif(isset($product))
    {{ $product->name }}
@endif