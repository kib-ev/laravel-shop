@if(isset($product))
    <div class="row">
        <div class="span2">
            <a href="{{ route('products.show', $product->id) }}">
                <img src="{{ $product->image_path }}" alt=""/>
            </a>
        </div>
        <div class="span4">
            <h4>{{ $product->name }}</h4>
            <hr class="soft"/>
            <h5>
                <a href="{{ route('product-categories.show', $product->category->id) }}">
                    {{ $product->category->name }}
                </a>
            </h5>
            <p>
                {{ $product->excerpt }}
            </p>
            <a class="btn btn-small pull-right" href="{{ route('products.show', $product->id) }}">View Details</a>
            <br class="clr"/>
        </div>
        <div class="span3 alignR">
            <form class="form-horizontal qtyFrm">
                <p class="price" style="text-align: right;font-size: 22px; font-weight: bold;">
                    <span class="price-old"
                          style="color: #999;text-decoration: line-through;">{{ $product->price_old }}</span>
                    <span class="price-new">{{ $product->price }}</span>
                </p>
                <label class="checkbox">
                    <input type="checkbox"> Adds product to compair
                </label><br/>

                <a href="{{ route('products.show', $product->id) }}" class="btn btn-large btn-primary">{{ __('ui.'.'Add to cart') }}</a>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-large"><i class="icon-zoom-in"></i></a>

            </form>
        </div>
    </div>
@endif
