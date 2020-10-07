<div class="well well-small">
    @if(isset($title))
        <h4>{{ $title }} <small class="pull-right">200+ featured products</small></h4>
    @endif

    <div class="row-fluid">
        <div id="featured" class="carousel slide">
            <div class="carousel-inner">

                <div class="item active">
                    <ul class="thumbnails">
                        @foreach(\App\Models\Product::featured()->offset(0)->limit(4)->get() as $featuredProduct)
                            <li class="span3">
                                <div class="thumbnail">
                                    @if($featuredProduct->price_old)
                                        <i class="tag"></i>
                                    @endif

                                    <a href="{{ route('products.show', $featuredProduct->id) }}">
                                        <img src="{{ url($featuredProduct->image_path) }}" alt=""></a>
                                    <div class="caption">
                                        <h5>{{ $featuredProduct->name }}</h5>
                                        <h4 >
                                            <span class="text-center">{{ $featuredProduct->price }}р.</span>
                                        </h4>

                                        <h4 style="text-align:center">
                                            <a class="btn" href="{{ route('products.show', $featuredProduct->id) }}"><i class="icon-zoom-in"></i></a>
                                            <a class="btn btn-primary" href="{{ route('api.carts.products.add', $featuredProduct->id) }}/?redirect={{ url()->current() }}">
                                                {{ __('ui.add_to_cart') }}
                                            </a>

                                        </h4>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="item">
                    <ul class="thumbnails">
                        @foreach(\App\Models\Product::featured()->offset(4)->limit(4)->get() as $featuredProduct)
                            <li class="span3">
                                <div class="thumbnail">
                                    @if($featuredProduct->price_old)
                                        <i class="tag"></i>
                                    @endif

                                    <a href="{{ route('products.show', $featuredProduct->id) }}">
                                        <img src="{{ url($featuredProduct->image_path) }}" alt=""></a>
                                    <div class="caption">
                                        <h5>{{ $featuredProduct->name }}</h5>
                                        <h4>
                                            <a class="btn" href="{{ route('products.show', $featuredProduct->id) }}">
                                                {{ __('ui.view_product') }}
                                            </a>
                                            <span class="pull-right">{{ $featuredProduct->price }}</span>
                                        </h4>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>


            </div>
            <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
            <a class="right carousel-control" href="#featured" data-slide="next">›</a>
        </div>
    </div>
</div>
