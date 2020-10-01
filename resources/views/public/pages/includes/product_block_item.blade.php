@if(isset($product))
    <li class="span3">
        <div class="thumbnail">
            <a href="{{ route('products.show', $product->id) }}">
                <img src="{{ $product->image_path }}" alt=""/>
            </a>
            <div class="caption">
                <h5>{{ $product->name }}</h5>
                <p>
                    {{ $product->excerpt }}
                </p>
                <p class="price" style="text-align:center;font-size: 18px; font-weight: bold;">
                    <span class="price-old"
                          style="color: #999;text-decoration: line-through;">{{ $product->price_old }}</span>
                    <span class="price-new">{{ $product->price }}</span>
                </p>
                <h4 style="text-align:center">
                    <a class="btn" href="{{ route('products.show', $product->id) }}"><i class="icon-zoom-in"></i></a>
                    <a class="btn btn-primary"
                       href="{{ route('api.carts.products.add', ['product_id' => $product->id, 'redirect' => url()->current()]) }}">
                        {{--                    <i class="icon-shopping-cart" style="vertical-align: middle;"></i> --}}
                        {{ __('ui.'.'Add to cart') }}
                    </a>

                </h4>
            </div>
        </div>
    </li>
@endif
