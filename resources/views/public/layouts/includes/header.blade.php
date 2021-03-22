<div class="modalWindow">
    <div class="modalContent">
        <form action="/login" method="post">
            @csrf
            @method('post')

            <h3 class="modalTitle">{{ __('ui.'.'sign_in') }}</h3>
            <span class="closeModal">&times;</span>
            <div class="modalField1 modalField d-flex justify-content-between align-items-center">
                <span class="modalInput">Email</span>
                <input name="email" class="search__input modalSearch" type="email" placeholder="E-mail address">
            </div>
            <div class="modalField d-flex justify-content-between align-items-center">
                <span class="modalInput">Password</span>
                <input name="password" class="search__input modalSearch" type="password" placeholder="Password">
            </div>
            <div class="modalLink d-flex justify-content-end align-items-center">
                <a href="#">Forgot password</a>
                <span>&nbsp; or &nbsp;</span>
                <a href="#">create new account</a>
            </div>
            <div class="modalBtns d-flex justify-content-end align-items-center">
                <button class="modalButton">Отменить</button>
                <button class="modalButton">{{ __('ui.'.'sign_in') }}</button>
            </div>
        </form>
    </div>
</div>

<header id="header">
    <div class="menu">
        <div class="header__top justify-content-between align-items-center">
            <div class="search--extra phone col-lg-4">
                <a href="tel://+17187172524">+7 (499) 490-79-56</a>
            </div>
            <div class="search--extra txt col-lg-4 text-center">Бесплатная доставка при заказе от 50 000 рублей!</div>
            <ul class="search--extra col-lg-4 d-flex justify-content-end align-items-center">
{{--                <li><a href="#" class="nav__menu">About us</a></li>--}}
                <li><a href="/contact" class="nav__menu">{{ __('ui.contacts') }}</a></li>
{{--                <li><a href="#" class="nav__menu">Customer service</a></li>--}}
{{--                <li><a href="#" class="nav__menu">Payment</a></li>--}}
            </ul>
        </div>
    </div>
    <div class="header__nav d-flex justify-content-between align-items-center">
        <div class="search--extra order--1 d-flex justify-content-between align-items-center">
            <div class="burger__menu">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
            <a href="./" class="logo">
                <img src="{{ asset('/img/logo.png') }}" alt="" class="img-fluid">
            </a>
            <a href="{{ route('products.index') }}" class="shop__categories">Каталог фильтров
{{--                <svg viewBox="0 0 1024 1024" focusable="false" class="" data-icon="caret-down" width="1em"--}}
{{--                     height="1em" fill="currentColor" aria-hidden="true">--}}
{{--                    <path--}}
{{--                        d="M840.4 300H183.6c-19.7 0-30.7 20.8-18.5 35l328.4 380.8c9.4 10.9 27.5 10.9 37 0L858.9 335c12.2-14.2 1.2-35-18.5-35z">--}}
{{--                    </path>--}}
{{--                </svg>--}}
            </a>
        </div>

        <div class="search--extra order--2">
            @include('public.layouts.includes.search')
        </div>

        <div class="search--extra order--3">
            <div class="header__right d-flex align-items-center justify-content-between">

                @if(auth()->id())
                    <a href="#" class="sign__in d-flex align-items-center">
                        <svg viewBox="64 64 896 896" focusable="false" class="" data-icon="user" width="1em"
                             height="1em" fill="currentColor" aria-hidden="true">
                            <path
                                d="M858.5 763.6a374 374 0 0 0-80.6-119.5 375.63 375.63 0 0 0-119.5-80.6c-.4-.2-.8-.3-1.2-.5C719.5 518 760 444.7 760 362c0-137-111-248-248-248S264 225 264 362c0 82.7 40.5 156 102.8 201.1-.4.2-.8.3-1.2.5-44.8 18.9-85 46-119.5 80.6a375.63 375.63 0 0 0-80.6 119.5A371.7 371.7 0 0 0 136 901.8a8 8 0 0 0 8 8.2h60c4.4 0 7.9-3.5 8-7.8 2-77.2 33-149.5 87.8-204.3 56.7-56.7 132-87.9 212.2-87.9s155.5 31.2 212.2 87.9C779 752.7 810 825 812 902.2c.1 4.4 3.6 7.8 8 7.8h60a8 8 0 0 0 8-8.2c-1-47.8-10.9-94.3-29.5-138.2zM512 534c-45.9 0-89.1-17.9-121.6-50.4S340 407.9 340 362c0-45.9 17.9-89.1 50.4-121.6S466.1 190 512 190s89.1 17.9 121.6 50.4S684 316.1 684 362c0 45.9-17.9 89.1-50.4 121.6S557.9 534 512 534z">
                            </path>
                        </svg>
                        <span>{{ auth()->user()->email }}</span>
                    </a>

                @else
                    <a href="#" class="sign__in d-flex align-items-center">
                        <svg viewBox="64 64 896 896" focusable="false" class="" data-icon="user" width="1em"
                             height="1em" fill="currentColor" aria-hidden="true">
                            <path
                                d="M858.5 763.6a374 374 0 0 0-80.6-119.5 375.63 375.63 0 0 0-119.5-80.6c-.4-.2-.8-.3-1.2-.5C719.5 518 760 444.7 760 362c0-137-111-248-248-248S264 225 264 362c0 82.7 40.5 156 102.8 201.1-.4.2-.8.3-1.2.5-44.8 18.9-85 46-119.5 80.6a375.63 375.63 0 0 0-80.6 119.5A371.7 371.7 0 0 0 136 901.8a8 8 0 0 0 8 8.2h60c4.4 0 7.9-3.5 8-7.8 2-77.2 33-149.5 87.8-204.3 56.7-56.7 132-87.9 212.2-87.9s155.5 31.2 212.2 87.9C779 752.7 810 825 812 902.2c.1 4.4 3.6 7.8 8 7.8h60a8 8 0 0 0 8-8.2c-1-47.8-10.9-94.3-29.5-138.2zM512 534c-45.9 0-89.1-17.9-121.6-50.4S340 407.9 340 362c0-45.9 17.9-89.1 50.4-121.6S466.1 190 512 190s89.1 17.9 121.6 50.4S684 316.1 684 362c0 45.9-17.9 89.1-50.4 121.6S557.9 534 512 534z">
                            </path>
                        </svg>
                        <span>{{ __('ui.'.'sign_in') }}</span>
                    </a>

                @endif

                <br />
                <div class="header__btns">
                    <!-- <button id="request__btn" class="header__btn">Request a Quote</button> -->
                    <div id="quote__btn">
                        @if(cart()->isNotEmpty())
                            <span>{{ cart()->products->count() }}</span>
                        @endif
                        <form action="/cart" method="get">
                            <button type="submit" class="header__btn">{{ __('ui.shopping_cart') }}</button>
                        </form>

                        @if(cart()->isNotEmpty())
                            <div class="korzina__container">
                                <div class="korzina__modal">
                                    <h4 class="korzina__title">
                                        @choice('ui.cart.products_count', cart()->products->count(), ['count' => cart()->products->count()])
                                    </h4>

                                    @foreach(cart()->products as $cartProduct)
                                    <div class="product__info d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <div>
                                                <img src="img/placeholder_categoy.png" alt="" class="product__infoImg">
                                            </div>
                                            <div class="korzina__product__name d-flex align-items-center">
                                                {{ $cartProduct->name }} {{ $cartProduct->brand->name }}
                                            </div>
                                        </div>
                                        <div class="korzina__btns d-flex justify-content-end align-items-center">
                                            <div class="korzina__cancle d-flex d-flex align-items-center">
                                                &times;&nbsp;<p>{{ $cartProduct->pivot->count }}</p>
                                            </div>
                                            <div class="korzina__delete d-flex align-items-center">
                                                <svg viewBox="64 64 896 896" focusable="false" class="" data-icon="delete" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M360 184h-8c4.4 0 8-3.6 8-8v8h304v-8c0 4.4 3.6 8 8 8h-8v72h72v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80h72v-72zm504 72H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32zM731.3 840H292.7l-24.2-512h487l-24.2 512z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    <div class="goto__btn">
                                        <form action="/cart" method="get">
                                            <button type="submit" class="go__to__quote">{{ __('ui.checkout') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
{{--                        <svg viewBox="0 0 1024 1024" focusable="false" class="korzina" data-icon="shopping-cart" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M922.9 701.9H327.4l29.9-60.9 496.8-.9c16.8 0 31.2-12 34.2-28.6l68.8-385.1c1.8-10.1-.9-20.5-7.5-28.4a34.99 34.99 0 0 0-26.6-12.5l-632-2.1-5.4-25.4c-3.4-16.2-18-28-34.6-28H96.5a35.3 35.3 0 1 0 0 70.6h125.9L246 312.8l58.1 281.3-74.8 122.1a34.96 34.96 0 0 0-3 36.8c6 11.9 18.1 19.4 31.5 19.4h62.8a102.43 102.43 0 0 0-20.6 61.7c0 56.6 46 102.6 102.6 102.6s102.6-46 102.6-102.6c0-22.3-7.4-44-20.6-61.7h161.1a102.43 102.43 0 0 0-20.6 61.7c0 56.6 46 102.6 102.6 102.6s102.6-46 102.6-102.6c0-22.3-7.4-44-20.6-61.7H923c19.4 0 35.3-15.8 35.3-35.3a35.42 35.42 0 0 0-35.4-35.2zM305.7 253l575.8 1.9-56.4 315.8-452.3.8L305.7 253zm96.9 612.7c-17.4 0-31.6-14.2-31.6-31.6 0-17.4 14.2-31.6 31.6-31.6s31.6 14.2 31.6 31.6a31.6 31.6 0 0 1-31.6 31.6zm325.1 0c-17.4 0-31.6-14.2-31.6-31.6 0-17.4 14.2-31.6 31.6-31.6s31.6 14.2 31.6 31.6a31.6 31.6 0 0 1-31.6 31.6z"></path>--}}
{{--                        </svg>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <div class="hidden__menu">--}}
{{--        <div class="drop__down">--}}
{{--            <div class="dropdown__menu dropdown__menu222">--}}
{{--                <a href="#" class="dropdown__link dropdown__link11">--}}
{{--                    Top Selling Brands--}}
{{--                </a>--}}
{{--                <svg viewBox="64 64 896 896" focusable="false" class="dropdown__subBtn dropdown__arrow" data-icon="down" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M884 256h-75c-5.1 0-9.9 2.5-12.9 6.6L512 654.2 227.9 262.6c-3-4.1-7.8-6.6-12.9-6.6h-75c-6.5 0-10.3 7.4-6.5 12.7l352.6 486.1c12.8 17.6 39 17.6 51.7 0l352.6-486.1c3.9-5.3.1-12.7-6.4-12.7z"></path>--}}
{{--                </svg>--}}
{{--            </div>--}}
{{--            <div id="dropdown__sub" class="dropdown__sub dropdown__subExtra">--}}
{{--                <div class="dropdown__sub__block">--}}
{{--                    <div>--}}
{{--                        <div class="dropdown__menu">--}}
{{--                            <a href="#" class="dropdown__link">--}}
{{--                                Construction & <br/>Industrial--}}
{{--                            </a>--}}
{{--                            <svg viewBox="64 64 896 896" focusable="false" class="vektor__down dropdown__arrow" data-icon="down" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M884 256h-75c-5.1 0-9.9 2.5-12.9 6.6L512 654.2 227.9 262.6c-3-4.1-7.8-6.6-12.9-6.6h-75c-6.5 0-10.3 7.4-6.5 12.7l352.6 486.1c12.8 17.6 39 17.6 51.7 0l352.6-486.1c3.9-5.3.1-12.7-6.4-12.7z"></path>--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <div class="dropdown__sub__link">--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Caterpillar--}}
{{--                            </a></br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Komatsu--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Hitachi--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Volvo CE--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                JCB--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Bobcat--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="dropdown__menu">--}}
{{--                            <a href="#" class="dropdown__link">--}}
{{--                                Minning & Drilling--}}
{{--                            </a>--}}
{{--                            <svg viewBox="64 64 896 896" focusable="false" class="vektor__down dropdown__arrow" data-icon="down" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M884 256h-75c-5.1 0-9.9 2.5-12.9 6.6L512 654.2 227.9 262.6c-3-4.1-7.8-6.6-12.9-6.6h-75c-6.5 0-10.3 7.4-6.5 12.7l352.6 486.1c12.8 17.6 39 17.6 51.7 0l352.6-486.1c3.9-5.3.1-12.7-6.4-12.7z"></path>--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <div class="dropdown__sub__link">--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Atlas Corco--}}
{{--                            </a></br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Sandvik--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Liebherr--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Terex--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Boart Longyear--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Gradall--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="dropdown__menu">--}}
{{--                            <a href="#" class="dropdown__link">--}}
{{--                                Agrycultureral & <br/>Forestry--}}
{{--                            </a>--}}
{{--                            <svg viewBox="64 64 896 896" focusable="false" class="vektor__down dropdown__arrow" data-icon="down" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M884 256h-75c-5.1 0-9.9 2.5-12.9 6.6L512 654.2 227.9 262.6c-3-4.1-7.8-6.6-12.9-6.6h-75c-6.5 0-10.3 7.4-6.5 12.7l352.6 486.1c12.8 17.6 39 17.6 51.7 0l352.6-486.1c3.9-5.3.1-12.7-6.4-12.7z"></path>--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <div class="dropdown__sub__link">--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                CNH--}}
{{--                            </a></br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                John Deere--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Tigercat--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Buhler Versatile--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Agco--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Claas--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="dropdown__menu">--}}
{{--                            <a href="#" class="dropdown__link">--}}
{{--                                Gas & Oil<br/> Industry--}}
{{--                            </a>--}}
{{--                            <svg viewBox="64 64 896 896" focusable="false" class="vektor__down dropdown__arrow" data-icon="down" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M884 256h-75c-5.1 0-9.9 2.5-12.9 6.6L512 654.2 227.9 262.6c-3-4.1-7.8-6.6-12.9-6.6h-75c-6.5 0-10.3 7.4-6.5 12.7l352.6 486.1c12.8 17.6 39 17.6 51.7 0l352.6-486.1c3.9-5.3.1-12.7-6.4-12.7z"></path>--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <div class="dropdown__sub__link">--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Waukesha--}}
{{--                            </a></br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                JSON--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Dresser-Rand--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Generac--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Arrow--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="dropdown__menu">--}}
{{--                            <a href="#" class="dropdown__link">--}}
{{--                                Engines &<br/> Transmissions--}}
{{--                            </a>--}}
{{--                            <svg viewBox="64 64 896 896" focusable="false" class="vektor__down dropdown__arrow" data-icon="down" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M884 256h-75c-5.1 0-9.9 2.5-12.9 6.6L512 654.2 227.9 262.6c-3-4.1-7.8-6.6-12.9-6.6h-75c-6.5 0-10.3 7.4-6.5 12.7l352.6 486.1c12.8 17.6 39 17.6 51.7 0l352.6-486.1c3.9-5.3.1-12.7-6.4-12.7z"></path>--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <div class="dropdown__sub__link">--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Cummins--}}
{{--                            </a></br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                MTU--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Detroit diesel--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Kubota--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Perkins--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Allison--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="drop__down">--}}
{{--            <div class="dropdown__menu dropdown__menu222">--}}
{{--                <a href="#" class="dropdown__link dropdown__link22">--}}
{{--                    Other Brands--}}
{{--                </a>--}}
{{--                <svg id="dropdown2" viewBox="64 64 896 896" focusable="false" class="dropdown__subBtn dropdown__arrow" data-icon="down" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M884 256h-75c-5.1 0-9.9 2.5-12.9 6.6L512 654.2 227.9 262.6c-3-4.1-7.8-6.6-12.9-6.6h-75c-6.5 0-10.3 7.4-6.5 12.7l352.6 486.1c12.8 17.6 39 17.6 51.7 0l352.6-486.1c3.9-5.3.1-12.7-6.4-12.7z"></path>--}}
{{--                </svg>--}}
{{--            </div>--}}
{{--            <div id="other__sub" class="dropdown__sub dropdown__subExtra">--}}
{{--                <div class="dropdown__sub__block">--}}
{{--                    <div>--}}
{{--                        <div class="dropdown__menu">--}}
{{--                            <a href="#" class="dropdown__link">--}}
{{--                                Forklift Parts--}}
{{--                            </a>--}}
{{--                            <svg viewBox="64 64 896 896" focusable="false" class="vektor__down dropdown__arrow" data-icon="down" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M884 256h-75c-5.1 0-9.9 2.5-12.9 6.6L512 654.2 227.9 262.6c-3-4.1-7.8-6.6-12.9-6.6h-75c-6.5 0-10.3 7.4-6.5 12.7l352.6 486.1c12.8 17.6 39 17.6 51.7 0l352.6-486.1c3.9-5.3.1-12.7-6.4-12.7z"></path>--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <div class="dropdown__sub__link">--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Manitou--}}
{{--                            </a></br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Yale--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Genie--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                JLG--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Doosan--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Top Selling Brands--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="dropdown__menu">--}}
{{--                            <a href="#" class="dropdown__link">--}}
{{--                                Crane Parts--}}
{{--                            </a>--}}
{{--                            <svg viewBox="64 64 896 896" focusable="false" class="vektor__down dropdown__arrow" data-icon="down" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M884 256h-75c-5.1 0-9.9 2.5-12.9 6.6L512 654.2 227.9 262.6c-3-4.1-7.8-6.6-12.9-6.6h-75c-6.5 0-10.3 7.4-6.5 12.7l352.6 486.1c12.8 17.6 39 17.6 51.7 0l352.6-486.1c3.9-5.3.1-12.7-6.4-12.7z"></path>--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <div class="dropdown__sub__link">--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Kato--}}
{{--                            </a></br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Tadano--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Grove--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                LINK-BELT--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Broderson--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Manitowok--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="dropdown__menu">--}}
{{--                            <a href="#" class="dropdown__link">--}}
{{--                                Marine Parts--}}
{{--                            </a>--}}
{{--                            <svg viewBox="64 64 896 896" focusable="false" class="vektor__down dropdown__arrow" data-icon="down" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M884 256h-75c-5.1 0-9.9 2.5-12.9 6.6L512 654.2 227.9 262.6c-3-4.1-7.8-6.6-12.9-6.6h-75c-6.5 0-10.3 7.4-6.5 12.7l352.6 486.1c12.8 17.6 39 17.6 51.7 0l352.6-486.1c3.9-5.3.1-12.7-6.4-12.7z"></path>--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <div class="dropdown__sub__link">--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Volvo Penta--}}
{{--                            </a></br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Yanmar--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                YAMAHA--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Mercury--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                OMC--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Johnsone Evinrude--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="dropdown__menu">--}}
{{--                            <a href="#" class="dropdown__link">--}}
{{--                                Truck Parts--}}
{{--                            </a>--}}
{{--                            <svg viewBox="64 64 896 896" focusable="false" class="vektor__down dropdown__arrow" data-icon="down" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M884 256h-75c-5.1 0-9.9 2.5-12.9 6.6L512 654.2 227.9 262.6c-3-4.1-7.8-6.6-12.9-6.6h-75c-6.5 0-10.3 7.4-6.5 12.7l352.6 486.1c12.8 17.6 39 17.6 51.7 0l352.6-486.1c3.9-5.3.1-12.7-6.4-12.7z"></path>--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <div class="dropdown__sub__link">--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Navistar<br/>International--}}
{{--                            </a></br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Freightliner--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Isuzu Trucks--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Mack--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Kenworth--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Volvo Trucks--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="dropdown__menu">--}}
{{--                            <a href="#" class="dropdown__link">--}}
{{--                                More...--}}
{{--                            </a>--}}
{{--                            <svg viewBox="64 64 896 896" focusable="false" class="vektor__down dropdown__arrow" data-icon="down" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M884 256h-75c-5.1 0-9.9 2.5-12.9 6.6L512 654.2 227.9 262.6c-3-4.1-7.8-6.6-12.9-6.6h-75c-6.5 0-10.3 7.4-6.5 12.7l352.6 486.1c12.8 17.6 39 17.6 51.7 0l352.6-486.1c3.9-5.3.1-12.7-6.4-12.7z"></path>--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <div class="dropdown__sub__link">--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Denso--}}
{{--                            </a></br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Delphy--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Bosch--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                DEUTZ--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                NEXIQ--}}
{{--                            </a><br/>--}}
{{--                            <a href="#" class="dropdown__link2">--}}
{{--                                Linkcoln Industrial--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="drop__down">--}}
{{--            <div class="dropdown__menu">--}}
{{--                <a href="#" class="dropdown__link">--}}
{{--                    Aftermarket Parts--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="drop__down">--}}
{{--            <div class="dropdown__menu">--}}
{{--                <a href="#" class="dropdown__link">--}}
{{--                    Special offers--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</header>
