<div id="header">
    <div class="container">
        <div id="logoArea" class="navbar mt-10">
            <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-inner">
                <a class="brand" href="{{ url('/') }}">
                    <img src="{{ asset('/themes/images/logo.png') }}" alt="">
                </a>
                <form class="form-inline navbar-search" method="get" action="{{ route('products.index') }}">
                    <input name="search" id="srchFld" class="srchTxt" type="text" autocomplete="off" onclick="this.removeAttr('background')">
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
