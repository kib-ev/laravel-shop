@extends('public.layouts.common')

@section('carousel')
    @include('public.pages.includes.carousel')
@endsection

@section('sidebar')
    @include('public.layouts.includes.sidebar')
@endsection

@section('content')
    <section id="diagramm">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <img src="img/diagramm.png" alt="diagramm" class="img-fluid">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <h2 class="diagramm__title">Take a competitive<br /> advantage with<br /> PERIPARTS:</h2>
                    <ul>
                        <li class="diagramm__txt">
                            <i>
                                <svg viewBox="64 64 896 896" focusable="false" class="" data-icon="check"
                                     width="1em" height="1em" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M912 190h-69.9c-9.8 0-19.1 4.5-25.1 12.2L404.7 724.5 207 474a32 32 0 0 0-25.1-12.2H112c-6.7 0-10.4 7.7-6.3 12.9l273.9 347c12.8 16.2 37.4 16.2 50.3 0l488.4-618.9c4.1-5.1.4-12.8-6.3-12.8z">
                                    </path>
                                </svg>
                            </i>
                            <span>More than 100 parts manufacturers in one place</span>
                        </li>
                        <li class="diagramm__txt">
                            <i>
                                <svg viewBox="64 64 896 896" focusable="false" class="" data-icon="check"
                                     width="1em" height="1em" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M912 190h-69.9c-9.8 0-19.1 4.5-25.1 12.2L404.7 724.5 207 474a32 32 0 0 0-25.1-12.2H112c-6.7 0-10.4 7.7-6.3 12.9l273.9 347c12.8 16.2 37.4 16.2 50.3 0l488.4-618.9c4.1-5.1.4-12.8-6.3-12.8z">
                                    </path>
                                </svg>
                            </i>
                            <span>Worldwide shipping with the most progressive rates</span>
                        </li>
                        <li class="diagramm__txt">
                            <i>
                                <svg viewBox="64 64 896 896" focusable="false" class="" data-icon="check"
                                     width="1em" height="1em" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M912 190h-69.9c-9.8 0-19.1 4.5-25.1 12.2L404.7 724.5 207 474a32 32 0 0 0-25.1-12.2H112c-6.7 0-10.4 7.7-6.3 12.9l273.9 347c12.8 16.2 37.4 16.2 50.3 0l488.4-618.9c4.1-5.1.4-12.8-6.3-12.8z">
                                    </path>
                                </svg>
                            </i>
                            <span>Professional support available 24/7</span>
                        </li>
                    </ul>
                    <div class="diagramm__btn">
                        <a href="#">Learn more
                            <svg class="btn__svg">
                                <rect class="btn__rect" width="100%" height="100%"></rect>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="categories">
        <div class="container">
            <h2 class="categories__title text-center">Top categories</h2>
            <div class="categories__container">
                <div class="categories__block block1">
                    <a href="#">
                        <img src="img/category1.jpg" class="img-fluid" alt="category1">
                        <h3 class="catgories__block__title">Mining & <br />Drilling</h3>
                    </a>
                </div>
                <div class="categories__block block2">
                    <a href="#">
                        <img src="img/category2.webp" class="img-fluid" alt="category1">
                        <h3 class="catgories__block__title">Construction <br />& Industrial</h3>
                    </a>
                </div>
                <div class="categories__block block3">
                    <a href="#">
                        <img src="img/category3.webp" class="img-fluid" alt="category1">
                        <h3 class="catgories__block__title construction">Construction <br />& Industrial</h3>
                    </a>
                </div>
                <div class="categories__block block4">
                    <a href="#">
                        <img src="img/category4.webp" class="img-fluid" alt="category1">
                        <h3 class="catgories__block__title">Agricultural & <br />Forestry</h3>
                    </a>
                </div>
                <div class="categories__block block5">
                    <a href="#">
                        <img src="img/category5.webp" class="img-fluid" alt="category1">
                        <h3 class="catgories__block__title">Engines & <br />Transmissions</h3>
                    </a>
                </div>
                <div class="categories__block block6">
                    <a href="#">
                        <img src="img/category6.webp" class="img-fluid" alt="category1">
                        <h3 class="catgories__block__title">Marine parts</h3>
                    </a>
                </div>
                <div class="categories__block block7">
                    <a href="#">
                        <img src="img/category7.webp" class="img-fluid" alt="category1">
                        <h3 class="catgories__block__title">Forklift parts</h3>
                    </a>
                </div>
                <div class="categories__block block8">

                    <a href="#">
                        <img src="img/category8.webp" class="img-fluid" alt="category1">
                        <h3 class="catgories__block__title">Crane parts</h3>
                    </a>
                </div>
                <div class="categories__block block9">
                    <a href="#">
                        <img src="img/category9.webp" class="img-fluid" alt="category1">
                        <h3 class="catgories__block__title">Truck parts</h3>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section id="brands">
        <div class="container">
            <h2 class="categories__title text-center">Top brands</h2>
            <div class="row justify-content-center">
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="brands">
                        <a href="#"><img src="img/brands1.webp" alt="" class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="brands">
                        <a href="#"><img src="img/brands2.webp" alt="" class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="brands">
                        <a href="#"><img src="img/brands3.webp" alt="" class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="brands">
                        <a href="#"><img src="img/brands4.webp" alt="" class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="brands">
                        <a href="#"><img src="img/brands5.webp" alt="" class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="brands">
                        <a href="#"><img src="img/brands6.webp" alt="" class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="brands">
                        <a href="#"><img src="img/brands7.webp" alt="" class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="brands">
                        <a href="#"><img src="img/brands8.webp" alt="" class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="brands">
                        <a href="#"><img src="img/brands9.webp" alt="" class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="brands">
                        <a href="#"><img src="img/brands10.webp" alt="" class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="brands">
                        <a href="#"><img src="img/brands11.webp" alt="" class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="brands">
                        <a href="#"><img src="img/brands12.webp" alt="" class="img-fluid"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

{{--    <div class="span9">--}}
{{--        @include('public.pages.includes.featured_products', [--}}
{{--            'title' => __('ui.featured_products')--}}
{{--        ])--}}

{{--        @include('public.pages.includes.products_block_pane', [--}}
{{--            'products' => $products ?? [],--}}
{{--            'title' => __('ui.random_products')--}}
{{--        ])--}}

{{--    </div>--}}
@endsection
