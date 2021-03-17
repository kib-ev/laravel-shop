@extends('public.layouts.common')

@section('sidebar')
    @include('public.layouts.includes.sidebar')
@endsection

@section('content')
    <section id="catalog">
        <div class="catalog__container justify-content-start align-items-start">
            <div class="catalog__title__mobile justify-content-start align-items-center">
                <div class="filterBtn d-flex justify-content-center align-items-center">
                    <svg viewBox="64 64 896 896" focusable="false" class="catalog__filter" data-icon="filter" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M349 838c0 17.7 14.2 32 31.8 32h262.4c17.6 0 31.8-14.3 31.8-32V642H349v196zm531.1-684H143.9c-24.5 0-39.8 26.7-27.5 48l221.3 376h348.8l221.3-376c12.1-21.3-3.2-48-27.7-48z"></path>
                    </svg>
                </div>

                <h1 class="cataog__title ">Results in Top Selling Brands</h1>

            </div>
            <div class="catalog__accordeon">
                <div class="catalog__item d-flex justify-content-between align-items-center">
                    <div class="catalog__txt">Category</div>
                    <div class="catalog__icon">
                        <div class="line1"></div>
                        <div class="line2"></div>
                    </div>
                </div>
                <div class="accordeon__hidden active">
                    <a class="accordeon__link" href="#">Construction & Industrial</a><br/>
                    <a class="accordeon__link" href="#">Mining & Drilling</a><br/>
                    <a class="accordeon__link" href="#">Agricultural & Forestry</a><br/>
                    <a class="accordeon__link" href="#">Gas & Oil Industry</a><br/>
                    <a class="accordeon__link" href="#">Engines & Transmissions</a>
                </div>
                <div class="catalog__item d-flex justify-content-between align-items-center">
                    <div class="catalog__txt">Brand</div>
                    <div class="catalog__icon">
                        <div class="line1"></div>
                        <div class="line2"></div>
                    </div>
                </div>
                <div class="accordeon__hidden">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="accordeonLeft accordeon__link">
                                <span>
                                    <input type="checkbox" id="selectIt" class="selectInput">
                                    <label class="labelCheck" for="selectIt">Case New <br/>Holland</label>
                                </span>
                        </div>
                        <div class="accordeonRight accordeon__link">
                            1000+
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="accordeonLeft accordeon__link">
                                <span>
                                    <input type="checkbox" id="selectIt" class="selectInput">
                                    <label class="labelCheck" for="selectIt">Komatsu</label>
                                </span>
                        </div>
                        <div class="accordeonRight accordeon__link">
                            1000+
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="accordeonLeft accordeon__link">
                                <span>
                                    <input type="checkbox" id="selectIt" class="selectInput">
                                    <label class="labelCheck" for="selectIt">Agco</label>
                                </span>
                        </div>
                        <div class="accordeonRight accordeon__link">
                            1000+
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="accordeonLeft accordeon__link">
                                <span>
                                    <input type="checkbox" id="selectIt" class="selectInput">
                                    <label class="labelCheck" for="selectIt">Caterpillar</label>
                                </span>
                        </div>
                        <div class="accordeonRight accordeon__link">
                            1000+
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="accordeonLeft accordeon__link">
                                <span>
                                    <input type="checkbox" id="selectIt" class="selectInput">
                                    <label class="labelCheck" for="selectIt">John Deere</label>
                                </span>
                        </div>
                        <div class="accordeonRight accordeon__link">
                            1000+
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="accordeonLeft accordeon__link">
                                <span>
                                    <input type="checkbox" id="selectIt" class="selectInput">
                                    <label class="labelCheck" for="selectIt">Jcb</label>
                                </span>
                        </div>
                        <div class="accordeonRight accordeon__link">
                            1000+
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="accordeonLeft accordeon__link">
                                <span>
                                    <input type="checkbox" id="selectIt" class="selectInput">
                                    <label class="labelCheck" for="selectIt">Bobcat</label>
                                </span>
                        </div>
                        <div class="accordeonRight accordeon__link">
                            1000+
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="accordeonLeft accordeon__link">
                                <span>
                                    <input type="checkbox" id="selectIt" class="selectInput">
                                    <label class="labelCheck" for="selectIt">Claas</label>
                                </span>
                        </div>
                        <div class="accordeonRight accordeon__link">
                            1000+
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="accordeonLeft accordeon__link">
                                <span>
                                    <input type="checkbox" id="selectIt" class="selectInput">
                                    <label class="labelCheck" for="selectIt">Volvo Ce</label>
                                </span>
                        </div>
                        <div class="accordeonRight accordeon__link">
                            1000+
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="accordeonLeft accordeon__link">
                                <span>
                                    <input type="checkbox" id="selectIt" class="selectInput">
                                    <label class="labelCheck" for="selectIt">Mtu Detroit Diesel</label>
                                </span>
                        </div>
                        <div class="accordeonRight accordeon__link">
                            1000+
                        </div>
                    </div>
                </div>
                <div class="catalog__item d-flex justify-content-between align-items-center">
                    <div class="catalog__txt">Manufacturer</div>
                    <div class="catalog__icon">
                        <div class="line1"></div>
                        <div class="line2"></div>
                    </div>
                </div>
                <div class="accordeon__hidden">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="accordeonLeft accordeon__link">
                                <span>
                                    <input type="checkbox" id="selectIt33" class="selectInput">
                                    <label class="labelCheck" for="selectIt33">Genuine</label>
                                </span>
                        </div>
                        <div class="accordeonRight accordeon__link">
                            1000+
                        </div>
                    </div>
                </div>
                <div class="catalog__item d-flex justify-content-between align-items-center">
                    <div class="catalog__txt">Condition</div>
                    <div class="catalog__icon">
                        <div class="line1"></div>
                        <div class="line2"></div>
                    </div>
                </div>
                <div class="accordeon__hidden">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="accordeonLeft accordeon__link">
                                <span>
                                    <input type="checkbox" id="selectIt34" class="selectInput">
                                    <label class="labelCheck" for="selectIt34">New</label>
                                </span>
                        </div>
                        <div class="accordeonRight accordeon__link">
                            1000+
                        </div>
                    </div>
                </div>
            </div>
            <div class="catalog__products">


                @if(request('search'))
                    <h1 class="cataog__title ">
                        Результаты поиска: {{ request('search') }}
                    </h1>
                @else
                    <h1 class="cataog__title ">
                        Случайные фильтры из каталога
                    </h1>
                @endif


                <div class="row align-items-center">
                    @foreach($products as $product)
                    <div class="categoryBlock">
                        <a href="{{ route('products.show', $product->id) }}" class="productCard__link">
                            <div class="product__card">
                                <div class="productCard__header" style="display: none;">CENUINE</div>
                                <div>
                                    <img style="padding: 30px;" class="img-fluid productCard__img" src="{{ get_image_url_by_product_id($product->id) }}" alt="category">
                                </div>
                                <div class="productCard__num">{{ $product->name }}</div>
                            </div>
                            <div class="productCard__name">
                                <p class="productCard__txt1">{{ @$product->brand->name }}</p>
                                <p class="productCard__txt2">{{ @$product->category->name != '' ? $product->category->name : '-' }}</p>

                                @if($product->price)
                                    <p class="productCard__price">{{ $product->_remote->price }}</p>
                                @else
                                    <p class="productCard__price">Цена: по запросу</p>
                                @endif
                            </div>
                        </a>
                        <button class="categoryBtn">{{ __('ui.add_to_cart') }}</button>
                    </div>
                    @endforeach

                </div>
                <div class="productBtns d-flex justify-content-between align-items-center">
                    <a href="#" class="prevBtn text-center">Previous</a>
                    <a href="#" class="nextBtn text-center">Next</a>
                </div>
            </div>
        </div>
    </section>
@endsection
