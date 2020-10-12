<div id="header">
    <div class="container">
        <div id="welcomeLine" class="row">
            <div class="span6">
                @lang('ui.welcome')

                @php
                    //dump(auth()->logout());
                @endphp

                @if(is_null(auth()->id()))
                    <a href="{{ url('/login') }}"><strong>{{ __('ui.guest') }}</strong></a>
                @else

                    @if(auth()->id())
                    <a href="{{ url('/admin') }}">
                        <strong>{{ auth()->user()->name }}</strong>
                    </a>
                    @else
                        <strong>{{ auth()->user()->name }}</strong>
                    @endif

                    <a class="btn btn-mini btn-primary"  href="{{ route('auth.logout') }}">{{ __('ui.logout') }}</a>
                @endif
            </div>
            <div class="span6">
                <div class="pull-right" style="font-size: 12px;">

                    @foreach(config('app.available_locales') as $locale)
                        @if(app()->getLocale() == $locale)
                            <span class="btn btn-mini btn-primary">{{ strtoupper($locale) }}</span>
                        @else
                            <a href="{{ set_locale_url($locale) }}">
                                <span class="btn btn-mini">{{ strtoupper($locale) }}</span>
                            </a>
                        @endif
                    @endforeach

                    <?php /**
                    <span>&nbsp;</span>
                    @foreach(['byn', 'rub', 'usd'] as $currency)
                        @if(session()->get('currency') == $currency)
                            <span class="btn btn-mini btn-primary">{{ strtoupper($currency) }}</span>
                        @else
                            <a href="{{ set_currency_url($currency) }}">
                                <span class="btn btn-mini">{{ strtoupper($currency) }}</span>
                            </a>
                        @endif
                    @endforeach

                    <span>&nbsp;</span>
                     */ ?>

                <!--<a href="{{ route('carts.show') }}">
                        <span class="btn btn-mini btn-primary">
                            <i class="icon-shopping-cart icon-white"></i> [ {{ cart()->products->count() }} ] Items in your cart
                        </span>

                        <span class="alert-danger">cart_id:{{ cart()->id }}</span>
                    </a>-->
                </div>
            </div>
        </div>
        <!-- Navbar ================================================== -->
        <div id="logoArea" class="navbar">
            <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-inner">
                <a class="brand" href="{{ url('/') }}">
                    <img src="{{ asset('/themes/images/logo.png') }}" alt="Bootsshop"/>
                </a>
                <form class="form-inline navbar-search" method="get" action="{{ route('products.index') }}">
                    <input name="search" id="srchFld" class="srchTxt" type="text" autocomplete="off"/>
                    <select class="srchTxt">
                        <option>{{ __('ui.all_categories') }}</option>
                    </select>
                    <button type="submit" id="submitButton" class="btn btn-primary">{{ __('ui.find') }}</button>
                </form>
                <ul id="topMenu" class="nav pull-right">
                    <li class="">
                        <a href="{{ route('products.index', ['only_discounted' => '1']) }}">{{ __('ui.special_offer') }}</a>
                    </li>
                    <li class="">
                        <a href="{{ url('/delivery') }}">{{ __('ui.delivery') }}</a>
                    </li>
                    <li class="">
                        <a href="{{ url('/contacts') }}">{{ __('ui.contacts') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
