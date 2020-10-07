<div id="header">
    <div class="container">
        <div id="welcomeLine" class="row">
            <div class="span6">
                {{ __('ui.'.'welcome') }}
                @if(!auth()->id())
                    <a href="/login"><strong>{{ __('ui.'.'guest') }}</strong></a>
                @else
                    <a href="/user"><strong>{{ auth()->user()->name }}</strong></a>
                    <a  class="btn btn-mini btn-primary"  href="{{ route('auth.logout') }}">@lang('ui.logout')</a>
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

                <!--<a href="{{ route('cart.show') }}">
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
                <a class="brand" href="/"><img src="/themes/images/logo.png" alt="Bootsshop"/></a>
                <form class="form-inline navbar-search" method="post" action="/products">
                    <input id="srchFld" class="srchTxt" type="text"/>
                    <select class="srchTxt">
                        <option>All</option>
                        <option>CLOTHES</option>
                        <option>FOOD AND BEVERAGES</option>
                        <option>HEALTH & BEAUTY</option>
                        <option>SPORTS & LEISURE</option>
                        <option>BOOKS & ENTERTAINMENTS</option>
                    </select>
                    <button type="submit" id="submitButton" class="btn btn-primary">{{ __('ui.'.'Find') }}</button>
                </form>
                <ul id="topMenu" class="nav pull-right">
                    <li class=""><a href="/special_offer">{{ __('ui.'.'special offer') }}</a></li>
                    <li class=""><a href="/delivery">{{ __('ui.'.'delivery') }}</a></li>
                    <li class=""><a href="/contacts">{{ __('ui.'.'contacts') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
