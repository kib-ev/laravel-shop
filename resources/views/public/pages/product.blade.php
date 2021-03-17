@extends('public.layouts.common')

@section('sidebar')
    @include('public.layouts.includes.sidebar')
@endsection

@section('content')
    <section id="product">

        <div class="product__header d-flex justify-content-start align-items-center">
            <a href="/" class="product__links">{{ __('ui.home') }}</a>
            <span>/</span>
            <a href="{{ route('products.index') }}" class="product__links">Каталог фильтров</a>
            <span>/</span>
            <a href="#" class="product__links">
                @if($product->category->name == 'OIL FILTER')
                    Маслянные фильтры
                @else
                    Другие
                @endif
            </a>
            <span>/</span>
            <a href="#" class="product__links">
                {{ $product->brand->name }}
            </a>
            <span>/</span>
            <p class="product__links">{{ $product->name }}</p>
        </div>

        <div class="col-lg-11 m-auto">
            <div class="product__cont">
                <div class="prod__content d-flex justify-content-center">
                    <div class="col-lg-6 col-md-12 text-center">
                        <img src="{{ get_image_url_by_product_id($product->id) }}" alt="Product image" class="img-fluid product__img" style="width: 300px; margin-top: 100px;">
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="product__headerBlock">
                            <div class="product__title">
                                <p class="product__num">{{ $product->name }}</p>
                                <p class="product__name">{{ $product->category->name }}</p>
                                <p class="product__brand">{{ $product->brand->name }}</p>
                            </div>
{{--                            <div class="tags__block d-flex justify-content-start align-items-center">--}}
{{--                                <h3 class="tags">Tags:</h3>--}}
{{--                                <a href="#" class="tags__btn">Original</a>--}}
{{--                                <a href="#" class="tags__btn">WASHER- LOCK 1/4</a>--}}
{{--                            </div>--}}
                        </div>
                        <div class="product__content">

                            <form class="form-horizontal qtyFrm" method="post"
                                  action="{{ route('api.carts.products.add', $product->id) }}">
                                @csrf
                                <input type="hidden" name="redirect" value="{{ url()->current() }}">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">


                            <div class="product__price">
                                <strong>{{ __('ui.price') }}: </strong>
                                <span style="font-size: 1.2em;">
                                    @if($product->_remote->price != '0.00')
                                        {{ $product->_remote->price }} {{ $product->_remote->currency }}
                                    @else
                                        {{ __('ui.on_request') }}
                                    @endif
                                </span>
                            </div>
                            <div class="product__button d-flex justify-content-start align-items-center">
                                <div class="productBlock d-flex justify-content-start align-items-center">
                                    <input name="count" type="number" class="calc search__input" placeholder="1" min="1">

                                    <button type="submit" class="calc__btn">
                                       {{ __('ui.add_to_cart') }}
                                    </button>

                                </div>
                                <div class="product__block d-flex justify-content-start align-items-center">
{{--                                    <div class="active__txt">Share on:</div>--}}
{{--                                    <div>--}}
{{--                                        <a href="#">--}}
{{--                                            <svg class="product__svg" viewBox="0 0 1024 1024" width="1em" height="1em" aria-hidden="true" focusable="false"><defs><style></style></defs><path d="M1024 512C1024 229.236 794.764 0 512 0S0 229.236 0 512s229.236 512 512 512 512-229.236 512-512zm-977.455 0C46.545 254.93 254.93 46.545 512 46.545c257.07 0 465.455 208.384 465.455 465.455 0 257.07-208.384 465.455-465.455 465.455C254.93 977.455 46.545 769.07 46.545 512z"></path><path d="M531.642 807.517V512h97.513l15.406-97.932H531.642v-49.105c0-25.554 8.378-49.943 45.056-49.943h73.31v-97.746H545.931c-87.506 0-111.384 57.623-111.384 137.495v59.253h-60.043V512h60.043v295.517h97.094z" fill="#828282"></path>--}}
{{--                                            </svg>--}}
{{--                                        </a>--}}
{{--                                        <a href="#">--}}
{{--                                            <svg class="product__svg" viewBox="0 0 1024 1024" width="1em" height="1em" aria-hidden="true" focusable="false"><defs><style></style></defs><path d="M731.555 410.205c0-5.166-.093-10.286-.326-15.36 22.11-16.477 41.286-37.097 56.46-60.695-20.294 9.123-42.077 15.22-64.978 17.78 23.366-14.382 41.286-37.376 49.757-64.977-21.876 13.265-46.08 22.76-71.82 27.694-20.619-23.459-50.036-38.4-82.57-38.958-62.465-1.024-113.106 51.758-113.106 117.9 0 9.402.977 18.524 2.932 27.322-94.068-6.051-177.431-55.017-233.193-128.838-9.728 17.687-15.313 38.353-15.313 60.509 0 41.89 19.968 79.127 50.315 101.097-18.571-.838-35.98-6.47-51.246-15.686v1.536c0 58.554 39.005 107.613 90.764 119.063-9.496 2.7-19.503 4.096-29.79 4.05a103.402 103.402 0 01-21.27-2.328c14.382 47.989 56.18 83.037 105.657 84.2-38.725 32.117-87.505 51.294-140.474 51.154a215.57 215.57 0 01-26.996-1.722c50.083 34.35 109.521 54.365 173.428 54.365 208.012.047 321.769-181.015 321.769-338.106z"></path><path d="M1024 512C1024 229.236 794.764 0 512 0S0 229.236 0 512s229.236 512 512 512 512-229.236 512-512zm-977.455 0C46.545 254.93 254.93 46.545 512 46.545c257.07 0 465.455 208.384 465.455 465.455 0 257.07-208.384 465.455-465.455 465.455C254.93 977.455 46.545 769.07 46.545 512z" fill="#828282"></path>--}}
{{--                                            </svg>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                                <br/>
                                <br/>
                            <div class="product__char d-flex justify-content-start align-items-start">
                                @php

                                    $remoteProduct = \App\Models\RemoteProduct::find($product->id);
                                @endphp

                                <div class="productBlock productBlock2">
                                    <div class="active__txt active__txt2 d-flex">
                                        <strong>{{ __('ui.article') }}:</strong>
                                        <span>{{ $product->name }}</span>
                                    </div><br/>
                                    <div class="active__txt active__txt2 d-flex">
                                        <strong>{{ __('ui.weight') }}:</strong>

                                        @if($product->_remote->weight != '0.000')
                                            <span>{{ $remoteProduct->group->weight }}</span>
                                        @else
                                            <span>...</span>
                                        @endif

                                    </div><br/>
                                    <div class="active__txt active__txt2 d-flex">
                                        <strong>{{ __('ui.volume') }}:</strong>
                                        @if($product->_remote->volume != '0.000000')
                                            <span>{{ $product->_remote->volume }}</span>
                                        @else
                                            <span>...</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="product__block">
                                    <div class="active__txt active__txt2 d-flex">
                                        <strong>{{ __('ui.brand') }}:</strong>
                                        <span>{{ $product->brand->name }}</span>
                                    </div><br/>
                                    <div class="active__txt active__txt2 d-flex">
                                        <strong>{{ __('ui.country') }}:</strong>

                                        @if($product->_remote->brand_country_code)
                                            <span>
                                                <span class="flag-icon flag-icon-{{ strtolower($product->_remote->brand_country_code) }}"></span>
                                                {{ $product->_remote->brand_country_code }}
                                            </span>
                                        @else
                                            <span>...</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="product__lastCont col-lg-11 m-auto d-flex justify-content-end align-items-start">
                    <div class="col-lg-6">
                        <div class="d-flex align-items-center">
                            <div class="product__block33 d-flex align-items-center">
                                <svg width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false" class=""><g clip-path="url(#availability_svg__clip0)" fill="#BDBDBD"><path d="M12.616 12.593c.037.11.092.2.146.274.073.073.146.127.238.182a.757.757 0 00.292.055.694.694 0 00.53-.22.502.502 0 00.145-.273c.037-.091.037-.2.037-.329v-.456c.11 0 .2-.018.274-.037a.72.72 0 00.274-.11c.164-.109.255-.291.255-.529a.625.625 0 00-.073-.328.464.464 0 00-.255-.238.992.992 0 00-.274-.073c-.073-.018-.128-.018-.22-.018V7.809c0-.274-.072-.511-.2-.657-.146-.165-.347-.256-.621-.256a.583.583 0 00-.256.055c-.073.036-.146.073-.219.146-.055.036-.11.11-.164.182-.055.073-.128.147-.183.238l-1.953 2.666c-.037.054-.055.073-.073.09 0 .02-.019.037-.055.074a.321.321 0 01-.073.091c-.018.037-.037.055-.055.091l-.055.11c-.036.037-.054.073-.054.091-.019.037-.019.073-.037.11 0 .036-.018.073-.018.11 0 .127.018.237.055.346.036.11.11.201.2.293.165.146.402.237.713.237h1.643v.438c0 .11.018.22.036.329zm-.876-2.118l.858-1.169v1.169h-.858zM7.777 9.16a.634.634 0 01-.11.164c-.036.073-.09.128-.163.201-.055.073-.128.128-.201.201-.073.073-.165.128-.256.201a3.69 3.69 0 00-.256.2c-.09.092-.219.183-.346.311-.128.128-.274.256-.439.42-.146.146-.31.31-.474.493a1.28 1.28 0 00-.146.183c-.037.073-.092.146-.128.237-.037.091-.073.164-.092.237-.018.092-.036.165-.036.22 0 .11.018.2.055.292a.605.605 0 00.182.255.794.794 0 00.292.183c.11.036.22.055.329.055h2.775c.11 0 .22-.019.293-.055a.62.62 0 00.255-.164c.055-.073.11-.146.146-.22a.644.644 0 00.055-.255c0-.11-.018-.201-.055-.292a.752.752 0 00-.182-.238.967.967 0 00-.274-.146 1.635 1.635 0 00-.329-.036H7.248l.11-.11c.127-.128.292-.255.474-.402.165-.146.329-.273.475-.401.146-.128.256-.22.347-.292.091-.073.182-.183.274-.292.091-.11.164-.238.255-.366a1.55 1.55 0 00.201-.474c.037-.165.073-.329.073-.512 0-.11-.018-.219-.036-.346-.019-.11-.055-.22-.092-.33-.036-.109-.09-.2-.164-.31a2.613 2.613 0 00-.2-.273 1.472 1.472 0 00-.256-.22.926.926 0 00-.293-.164c-.146-.073-.328-.11-.51-.146a3.022 3.022 0 00-.585-.055c-.164 0-.329.019-.493.037a1.54 1.54 0 00-.438.128c-.128.054-.256.11-.365.182-.11.073-.22.146-.31.238a3.174 3.174 0 00-.238.273c-.073.11-.128.201-.165.31-.036.11-.073.22-.11.311-.017.11-.036.22-.036.329 0 .11.019.2.055.274.037.091.091.164.146.237.073.073.146.11.22.146a.757.757 0 00.566 0 .557.557 0 00.237-.182.631.631 0 00.128-.22 3.58 3.58 0 00.11-.255c.036-.073.054-.146.072-.183a.735.735 0 01.237-.237.6.6 0 01.31-.073c.056 0 .11 0 .165.018.055.018.092.037.146.055a.327.327 0 01.128.091.484.484 0 01.091.11c.019.036.037.091.055.146.018.055.018.11.018.164 0 .055 0 .11-.018.165-.018.054-.036.127-.055.182z"></path><path d="M.676 10.676A.674.674 0 001.35 10c0-2.355.95-4.473 2.502-6.025a8.515 8.515 0 0110.772-1.06 8.561 8.561 0 012.32 2.338l-.768-.292a.661.661 0 00-.858.383.661.661 0 00.383.858l2.41.95a.624.624 0 00.512 0 .693.693 0 00.383-.402l.95-2.41a.661.661 0 00-.384-.858.661.661 0 00-.858.383l-.401 1.04a9.635 9.635 0 00-2.94-3.067A9.763 9.763 0 009.878.158a9.75 9.75 0 00-6.957 2.885A9.707 9.707 0 000 10c0 .365.31.676.676.676zM19.299 9.324a.674.674 0 00-.676.676c0 2.355-.95 4.473-2.501 6.025a8.515 8.515 0 01-10.773 1.06 8.561 8.561 0 01-2.319-2.338l.767.292a.661.661 0 00.858-.383.661.661 0 00-.383-.858l-2.41-.95a.623.623 0 00-.512 0 .693.693 0 00-.383.402l-.913 2.41a.661.661 0 00.383.858.661.661 0 00.859-.383l.401-1.04a9.636 9.636 0 002.94 3.067 9.764 9.764 0 005.496 1.68 9.75 9.75 0 006.956-2.885A9.782 9.782 0 0019.974 10a.686.686 0 00-.675-.676z"></path></g><defs><clipPath id="availability_svg__clip0"><path fill="#fff" d="M0 0h20v20H0z"></path></clipPath></defs>
                                </svg>
                                <div class="product__title33">{{ __('ui.availability') }}:</div>
                            </div>
                            <div class="product__txt33">{{ __('ui.on_request') }}</div>
                        </div>
                        <div class="marg__top d-flex align-items-center">
                            <div class="product__block33 d-flex align-items-center">
                                <svg width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false" class=""><mask id="shipping_svg__a" maskUnits="userSpaceOnUse" x="0" y="0" width="26" height="17" fill="#000"><path fill="#fff" d="M0 0h26v17H0z"></path><path d="M23.053 7.359l-.614-2.456a.371.371 0 00.294-.363v-.396c0-.86-.7-1.56-1.56-1.56h-2.797v-.817A.768.768 0 0017.61 1H3.351a.768.768 0 00-.767.767V8.5a.371.371 0 00.743 0V1.767c0-.013.01-.024.024-.024H17.61c.014 0 .025.01.025.024V8.5a.371.371 0 10.742 0v-.42H22.758c.54 0 .997.353 1.154.84h-1.154a.371.371 0 00-.372.372v.792c0 .642.522 1.164 1.163 1.164h.421v1.633H23a2.355 2.355 0 00-2.223-1.584 2.355 2.355 0 00-2.222 1.584h-.179v-2.797a.371.371 0 00-.742 0v2.797H9.93a2.355 2.355 0 00-2.222-1.584 2.355 2.355 0 00-2.222 1.584H3.35a.025.025 0 01-.024-.024v-.817h1.609a.371.371 0 100-.743H1.37a.371.371 0 100 .743h1.213v.817c0 .423.344.767.768.767h2.005v.024A2.354 2.354 0 007.707 16a2.354 2.354 0 002.351-2.351v-.025h8.367v.024A2.354 2.354 0 0020.777 16a2.354 2.354 0 002.352-2.351v-.025h1.213a.371.371 0 00.371-.372v-3.96c0-.978-.721-1.79-1.66-1.933zm-4.677-4.032h2.797c.45 0 .817.366.817.817v.024h-3.614v-.841zm0 4.01V4.91h3.3l.606 2.426h-3.906zm-10.668 7.92a1.61 1.61 0 01-1.609-1.608 1.61 1.61 0 011.609-1.61 1.61 1.61 0 011.609 1.61 1.61 1.61 0 01-1.609 1.609zm13.07 0a1.61 1.61 0 01-1.61-1.608 1.61 1.61 0 011.61-1.61 1.61 1.61 0 011.608 1.61 1.61 1.61 0 01-1.609 1.609zm3.192-4.752h-.42a.421.421 0 01-.421-.42v-.422h.841v.842z"></path><path d="M7.708 12.881a.768.768 0 10.002 1.537.768.768 0 00-.002-1.537zM20.777 12.881a.768.768 0 10.002 1.537.768.768 0 00-.002-1.537zM16.42 11.297h-5.544a.371.371 0 000 .743h5.545a.371.371 0 000-.743zM6.916 9.713H2.163a.371.371 0 000 .743h4.753a.371.371 0 000-.743zM13.911 4.673a.371.371 0 00-.525 0l-3.302 3.302-1.717-1.718a.371.371 0 10-.526.525l1.98 1.98a.37.37 0 00.526 0l3.564-3.564a.371.371 0 000-.525z"></path></mask><path d="M23.053 7.359l-.614-2.456a.371.371 0 00.294-.363v-.396c0-.86-.7-1.56-1.56-1.56h-2.797v-.817A.768.768 0 0017.61 1H3.351a.768.768 0 00-.767.767V8.5a.371.371 0 00.743 0V1.767c0-.013.01-.024.024-.024H17.61c.014 0 .025.01.025.024V8.5a.371.371 0 10.742 0v-.42H22.758c.54 0 .997.353 1.154.84h-1.154a.371.371 0 00-.372.372v.792c0 .642.522 1.164 1.163 1.164h.421v1.633H23a2.355 2.355 0 00-2.223-1.584 2.355 2.355 0 00-2.222 1.584h-.179v-2.797a.371.371 0 00-.742 0v2.797H9.93a2.355 2.355 0 00-2.222-1.584 2.355 2.355 0 00-2.222 1.584H3.35a.025.025 0 01-.024-.024v-.817h1.609a.371.371 0 100-.743H1.37a.371.371 0 100 .743h1.213v.817c0 .423.344.767.768.767h2.005v.024A2.354 2.354 0 007.707 16a2.354 2.354 0 002.351-2.351v-.025h8.367v.024A2.354 2.354 0 0020.777 16a2.354 2.354 0 002.352-2.351v-.025h1.213a.371.371 0 00.371-.372v-3.96c0-.978-.721-1.79-1.66-1.933zm-4.677-4.032h2.797c.45 0 .817.366.817.817v.024h-3.614v-.841zm0 4.01V4.91h3.3l.606 2.426h-3.906zm-10.668 7.92a1.61 1.61 0 01-1.609-1.608 1.61 1.61 0 011.609-1.61 1.61 1.61 0 011.609 1.61 1.61 1.61 0 01-1.609 1.609zm13.07 0a1.61 1.61 0 01-1.61-1.608 1.61 1.61 0 011.61-1.61 1.61 1.61 0 011.608 1.61 1.61 1.61 0 01-1.609 1.609zm3.192-4.752h-.42a.421.421 0 01-.421-.42v-.422h.841v.842z" fill="#BDBDBD"></path><path d="M7.708 12.881a.768.768 0 10.002 1.537.768.768 0 00-.002-1.537zM20.777 12.881a.768.768 0 10.002 1.537.768.768 0 00-.002-1.537zM16.42 11.297h-5.544a.371.371 0 000 .743h5.545a.371.371 0 000-.743zM6.916 9.713H2.163a.371.371 0 000 .743h4.753a.371.371 0 000-.743zM13.911 4.673a.371.371 0 00-.525 0l-3.302 3.302-1.717-1.718a.371.371 0 10-.526.525l1.98 1.98a.37.37 0 00.526 0l3.564-3.564a.371.371 0 000-.525z" fill="#BDBDBD"></path><path d="M23.053 7.359l-.614-2.456a.371.371 0 00.294-.363v-.396c0-.86-.7-1.56-1.56-1.56h-2.797v-.817A.768.768 0 0017.61 1H3.351a.768.768 0 00-.767.767V8.5a.371.371 0 00.743 0V1.767c0-.013.01-.024.024-.024H17.61c.014 0 .025.01.025.024V8.5a.371.371 0 10.742 0v-.42H22.758c.54 0 .997.353 1.154.84h-1.154a.371.371 0 00-.372.372v.792c0 .642.522 1.164 1.163 1.164h.421v1.633H23a2.355 2.355 0 00-2.223-1.584 2.355 2.355 0 00-2.222 1.584h-.179v-2.797a.371.371 0 00-.742 0v2.797H9.93a2.355 2.355 0 00-2.222-1.584 2.355 2.355 0 00-2.222 1.584H3.35a.025.025 0 01-.024-.024v-.817h1.609a.371.371 0 100-.743H1.37a.371.371 0 100 .743h1.213v.817c0 .423.344.767.768.767h2.005v.024A2.354 2.354 0 007.707 16a2.354 2.354 0 002.351-2.351v-.025h8.367v.024A2.354 2.354 0 0020.777 16a2.354 2.354 0 002.352-2.351v-.025h1.213a.371.371 0 00.371-.372v-3.96c0-.978-.721-1.79-1.66-1.933zm-4.677-4.032h2.797c.45 0 .817.366.817.817v.024h-3.614v-.841zm0 4.01V4.91h3.3l.606 2.426h-3.906zm-10.668 7.92a1.61 1.61 0 01-1.609-1.608 1.61 1.61 0 011.609-1.61 1.61 1.61 0 011.609 1.61 1.61 1.61 0 01-1.609 1.609zm13.07 0a1.61 1.61 0 01-1.61-1.608 1.61 1.61 0 011.61-1.61 1.61 1.61 0 011.608 1.61 1.61 1.61 0 01-1.609 1.609zm3.192-4.752h-.42a.421.421 0 01-.421-.42v-.422h.841v.842h0z" stroke="#BDBDBD" stroke-width="0.6" mask="url(#shipping_svg__a)"></path><path d="M7.708 12.881a.768.768 0 10.002 1.537.768.768 0 00-.002-1.537zM20.777 12.881a.768.768 0 10.002 1.537.768.768 0 00-.002-1.537zM16.42 11.297h-5.544a.371.371 0 000 .743h5.545a.371.371 0 000-.743zM6.916 9.713H2.163a.371.371 0 000 .743h4.753a.371.371 0 000-.743zM13.911 4.673a.371.371 0 00-.525 0l-3.302 3.302-1.717-1.718a.371.371 0 10-.526.525l1.98 1.98a.37.37 0 00.526 0l3.564-3.564a.371.371 0 000-.525z" stroke="#BDBDBD" stroke-width="0.6" mask="url(#shipping_svg__a)"></path>
                                </svg>
                                <div class="product__title33">{{ __('ui.shipping') }}:</div>
                            </div>
                            <div class="product__txt33">
                                Срок поставки от 7-14 дней.<br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product__cont product__info">
                <div class="productInfo__header d-flex justify-content-start align-items-center">
                    <div class="info__txt info__txt1 activeInfo">Опиание</div>
                    <div class="info__txt info__txt2">Применяемость</div>

                </div>
                <div class="info__content">
                    <p class="desc__content desc__content1 activeInfo">
                        @if($product->category->description)
                            {!! $product->category->description !!}
                        @else
                            Нет информации
                        @endif
                    </p>
                    <p class="desc__content desc__content2">
                        Нет информации
                    </p>

                </div>
            </div>

        </div>


        <div class="col-lg-9 m-auto" style="display: none;"> {{-- TODO  --}}

            <div class="recommended__products">
                <h2 class="rec__title">Recommended Products</h2>
            </div>

            <div class="row justify-content-center align-items-center">

                <div class="categoryBlock">
                    <a href="#" class="productCard__link">
                        <div class="product__card">
                            <div class="productCard__header">CENUINE</div>
                            <div>
                                <img class="img-fluid productCard__img" src="/img/category.webp" alt="category">
                            </div>
                            <div class="productCard__num">29537665</div>
                        </div>
                        <div class="productCard__name">
                            <p class="productCard__txt1">ALLISON</p>
                            <p class="productCard__txt2">1000RM</p>
                            <p class="productCard__price">Price on Request</p>
                        </div>
                    </a>
                    <button class="categoryBtn">Add to Quote</button>
                </div>
                <div class="categoryBlock">
                    <a href="#" class="productCard__link">
                        <div class="product__card">
                            <div class="productCard__header">CENUINE</div>
                            <div>
                                <img class="img-fluid productCard__img" src="/img/category.webp" alt="category">
                            </div>
                            <div class="productCard__num">29537665</div>
                        </div>
                        <div class="productCard__name">
                            <p class="productCard__txt1">ALLISON</p>
                            <p class="productCard__txt2">1000RM</p>
                            <p class="productCard__price">Price on Request</p>
                        </div>
                    </a>
                    <button class="categoryBtn">Add to Quote</button>
                </div>
                <div class="categoryBlock">
                    <a href="#" class="productCard__link">
                        <div class="product__card">
                            <div class="productCard__header">CENUINE</div>
                            <div>
                                <img class="img-fluid productCard__img" src="/img/category.webp" alt="category">
                            </div>
                            <div class="productCard__num">29537665</div>
                        </div>
                        <div class="productCard__name">
                            <p class="productCard__txt1">ALLISON</p>
                            <p class="productCard__txt2">1000RM</p>
                            <p class="productCard__price">Price on Request</p>
                        </div>
                    </a>
                    <button class="categoryBtn">Add to Quote</button>
                </div>
                <div class="categoryBlock">
                    <a href="#" class="productCard__link">
                        <div class="product__card">
                            <div class="productCard__header">CENUINE</div>
                            <div>
                                <img class="img-fluid productCard__img" src="/img/category.webp" alt="category">
                            </div>
                            <div class="productCard__num">29537665</div>
                        </div>
                        <div class="productCard__name">
                            <p class="productCard__txt1">ALLISON</p>
                            <p class="productCard__txt2">1000RM</p>
                            <p class="productCard__price">Price on Request</p>
                        </div>
                    </a>
                    <button class="categoryBtn">Add to Quote</button>
                </div>
                <div class="categoryBlock">
                    <a href="#" class="productCard__link">
                        <div class="product__card">
                            <div class="productCard__header">CENUINE</div>
                            <div>
                                <img class="img-fluid productCard__img" src="/img/category.webp" alt="category">
                            </div>
                            <div class="productCard__num">29537665</div>
                        </div>
                        <div class="productCard__name">
                            <p class="productCard__txt1">ALLISON</p>
                            <p class="productCard__txt2">1000RM</p>
                            <p class="productCard__price">Price on Request</p>
                        </div>
                    </a>
                    <button class="categoryBtn">Add to Quote</button>
                </div>
                <div class="categoryBlock">
                    <a href="#" class="productCard__link">
                        <div class="product__card">
                            <div class="productCard__header">CENUINE</div>
                            <div>
                                <img class="img-fluid productCard__img" src="/img/category.webp" alt="category">
                            </div>
                            <div class="productCard__num">29537665</div>
                        </div>
                        <div class="productCard__name">
                            <p class="productCard__txt1">ALLISON</p>
                            <p class="productCard__txt2">1000RM</p>
                            <p class="productCard__price">Price on Request</p>
                        </div>
                    </a>
                    <button class="categoryBtn">Add to Quote</button>
                </div>
            </div>
        </div>
    </section>
@endsection
