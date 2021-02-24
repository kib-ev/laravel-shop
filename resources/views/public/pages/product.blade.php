@extends('public.layouts.default')

@section('sidebar')
    @include('public.layouts.includes.sidebar')
@endsection

@section('content')
    <div class="span9">

        @include('public.pages.includes.breadcrumbs')

        <div class="row">
            <div id="gallery" class="span3">
                <a href="{{ asset($product->image_path) }}" title="">
                    <img src="{{ asset($product->image_path) }}" alt=""/>
                </a>

                <div id="differentview" class="moreOptopm carousel slide" style="display: none;">
                    <div class="carousel-inner">
                        <div class="item active">
                            <a href="/themes/images/products/large/f1.jpg">
                                <img style="width:29%" src="/themes/images/products/large/f1.jpg" alt=""/></a>
                            <a href="/themes/images/products/large/f2.jpg">
                                <img style="width:29%" src="/themes/images/products/large/f2.jpg" alt=""/></a>
                            <a href="/themes/images/products/large/f3.jpg">
                                <img style="width:29%" src="/themes/images/products/large/f3.jpg" alt=""/></a>
                        </div>
                        <div class="item">
                            <a href="/themes/images/products/large/f3.jpg">
                                <img style="width:29%" src="/themes/images/products/large/f3.jpg" alt=""/></a>
                            <a href="/themes/images/products/large/f1.jpg">
                                <img style="width:29%" src="/themes/images/products/large/f1.jpg" alt=""/></a>
                            <a href="/themes/images/products/large/f2.jpg">
                                <img style="width:29%" src="/themes/images/products/large/f2.jpg" alt=""/></a>
                        </div>
                    </div>

                    <!--
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
                    -->
                </div>

                <div class="btn-toolbar" style="display: none;">
                    <div class="btn-group">
                        <span class="btn"><i class="icon-envelope"></i></span>
                        <span class="btn"><i class="icon-print"></i></span>
                        <span class="btn"><i class="icon-zoom-in"></i></span>
                        <span class="btn"><i class="icon-star"></i></span>
                        <span class="btn"><i class=" icon-thumbs-up"></i></span>
                        <span class="btn"><i class="icon-thumbs-down"></i></span>
                    </div>
                </div>
            </div>
            <div class="span6">
                <h3>{{ $product->name }}</h3>
                <small style="display: none;">- (14MP, 18x Optical Zoom) 3-inch LCD</small>
                <hr class="soft"/>
                <form class="form-horizontal qtyFrm" method="post"
                      action="{{ route('api.carts.products.add', $product->id) }}">
                    @csrf
                    <input type="hidden" name="redirect" value="{{ url()->current() }}">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="control-group">
                        <label class="control-label">
                            <span class="price-old"
                                  style="color: #999;text-decoration: line-through;">{{ $product->price_old }}{{ $product->price_old ? 'р.' : '' }}</span>
                            <span class="price-new">{{ $product->price }}р.</span>
                        </label>
                        <div class="controls">
                            <input name="count" type="number" class="span1" placeholder="{{ __('ui.'.'qty.') }}" min="1"
                                   value="1"/>
                            <button type="submit" class="btn btn-large btn-primary pull-right">
                                {{ __('ui.add_to_cart') }}
                            </button>
                        </div>
                    </div>
                </form>

                <hr class="soft" style="display: none;">
                <h4 style="display: none;">{{ __('ui.'.'items in stock', ['count' => $product->count]) }}</h4>
                <form class="form-horizontal qtyFrm pull-right" style="display: none;">
                    <div class="control-group">
                        <label class="control-label"><span>Color</span></label>
                        <div class="controls">
                            <select class="span2">
                                <option>Black</option>
                                <option>Red</option>
                                <option>Blue</option>
                                <option>Brown</option>
                            </select>
                        </div>
                    </div>
                </form>
               <!--<hr class="soft clr"/>
                <p>
                    14 Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos and 1280 x 720p HD
                    movie capture. ISO sensitivity ISO6400 at reduced resolution.
                    Tracking Auto Focus. Motion Panorama Mode. Face Detection technology with Blink detection
                    and Smile and shoot mode. 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm.
                    Weight 0.341kg (excluding battery and memory card). Weight 0.437kg (including battery and
                    memory card).

                </p>
                <a class="btn btn-small pull-right" href="#detail">More Details</a>
                <br class="clr"/>
                <a href="#" name="detail"></a>-->
                <hr class="soft"/>
            </div>

            <div class="span9">
                <ul id="productDetail" class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">{{ __('ui.product_details') }}</a></li>
                    <li><a href="#profile" data-toggle="tab">{{ __('ui.related_products') }}</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="home">
                        <h4>{{ __('ui.product_details') }}</h4>
                        <br>
                        {!! $product->description !!}
                    </div>

                    <div class="tab-pane fade" id="profile">
                        <div id="myTab" class="pull-right">
                            <a href="#blockView" data-toggle="tab">
                                <span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span>
                            </a>
                            <a href="#listView" data-toggle="tab">
                                <span class="btn btn-large"><i class="icon-list"></i></span>
                            </a>
                        </div>
                        <br class="clr"/>
                        <hr class="soft"/>

                        <div class="tab-content">
                            <div class="tab-pane active" id="blockView">
                                @include('public.pages.includes.products_block_pane', ['products' => $products ?? []])
                            </div>
                            <div class="tab-pane" id="listView">
                                @include('public.pages.includes.products_list_pane', ['products' => $products ?? []])
                            </div>
                        </div>
                        <hr class="soft"/>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
