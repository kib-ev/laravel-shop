@extends('public.layouts.default')

@section('sidebar')
    @include('public.layouts.includes.sidebar')
@endsection

@section('content')

    <div class="span9">
        <ul class="breadcrumb">
            <li><a href="{{ url('/') }}">@lang('ui.home')</a> <span class="divider"> / </span></li>
            <li class="active">@lang('ui.shopping_cart')</li>
        </ul>

        @if(session('message') ?? '')
            <div class="alert alert-success">
                @lang(session('message'))
            </div>
        @endif

        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    @lang($error)
                </div>
            @endforeach
        @endif

        <h3>
            @if(cart()->products->count())
                @lang('ui.shopping_cart')
            @else
                @lang('ui.cart.cart_empty')
            @endif

            [
            <small>@choice('ui.cart.products_count', cart()->products->count(), ['count' => cart()->products->count()])</small>
            ]
            <a href="{{ route('products.index') }}" class="btn btn-large pull-right">
                <i class="icon-arrow-left"></i> @lang('ui.continue_shopping')
            </a>
        </h3>
        <hr class="soft"/>

        @if(!auth()->id() && cart()->isNotEmpty())
            <table class="table table-bordered" style="display: none;">
                <tr>
                    <th>@lang('ui.already_registered')</th>
                </tr>
                <tr>
                    <td>
                        <form class="form-horizontal" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="control-group">
                                <label class="control-label" for="inputUsername">{{ __('ui.email') }}</label>
                                <div class="controls">
                                    <input name="email" type="text" id="inputUsername"
                                           placeholder="{{ __('ui.email') }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPassword1">{{ __('ui.password') }}</label>
                                <div class="controls">
                                    <input name="password" type="password" id="inputPassword1"
                                           placeholder="{{ __('ui.password') }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn">{{ __('ui.sign_in') }}</button>
                                    {{ __('ui.or') }}
                                    <a href="{{ route('register') }}" class="btn">{{ __('ui.register') }}</a>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <a href="{{ route('password.request') }}"
                                       style="text-decoration:underline">{{ __('ui.forget_password') }}</a>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            </table>
        @endif

        @if(cart()->isNotEmpty())

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>@lang('ui.cart.product')</th>
                    <th>@lang('ui.cart.description')</th>
                    <th>@lang('ui.cart.quantity_update')</th>
                    <th>@lang('ui.cart.price')</th>
                    <th>@lang('ui.cart.discount')</th>
                    <th>@lang('ui.cart.tax')</th>
                    <th>@lang('ui.cart.total')</th>
                </tr>
                </thead>
                <tbody>

                @foreach(cart()->products as $product)
                    <tr>
                        <td>
                            <img width="60" src="{{ asset($product->image_path) }}" alt=""/>
                        </td>
                        <td>{{ $product->name }}<br/><!-- Color : black, Material : metal--></td>
                        <td>
                            <div class="input-append">
                                <input value="{{ $product->pivot->count }}"
                                       style="max-width:34px" placeholder="1" class="span1"
                                       id="appendedInputButtons" size="16" type="text">

                                <form action="{{ route('api.carts.products.pivot.update', $product->pivot->id) }}"
                                      method="post" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="redirect" value="{{ url()->current() }}">
                                    <input type="hidden" name="count" value="{{ $product->pivot->count - 1 }}">
                                    <button class="btn" type="submit">
                                        <i class="icon-minus"></i>
                                    </button>
                                </form>

                                <form action="{{ route('api.carts.products.pivot.update', $product->pivot->id) }}"
                                      method="post" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="redirect" value="{{ url()->current() }}">
                                    <input type="hidden" name="count" value="{{ $product->pivot->count + 1 }}">
                                    <button class="btn" type="submit">
                                        <i class="icon-plus"></i>
                                    </button>
                                </form>

                                <form action="{{ route('api.carts.products.pivot.remove', $product->pivot->id) }}"
                                      method="post" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="redirect" value="{{ url()->current() }}">
                                    <button class="btn btn-danger" type="submit">
                                        <i class="icon-remove icon-white"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                        <td>{{ $product->pivot->summary_price > 0 ? number_format($product->pivot->summary_price, 2, '.', '') : '--' }}</td>
                        <td>{{ $product->pivot->summary_discount > 0 ? number_format($product->pivot->summary_discount, 2, '.', '') : '--' }}</td>
                        <td>{{ $product->pivot->summary_tax > 0 ? number_format($product->pivot->summary_tax, 2, '.', '') : '--' }}</td>
                        <td>{{ $product->pivot->summary_total > 0 ? number_format($product->pivot->summary_total, 2, '.', '') : '--' }}</td>
                    </tr>
                @endforeach

                <tr>
                    <td colspan="6" style="text-align:right">{{ __('ui.cart.total_price') }}:</td>
                    <td>{{ number_format(cart()->summary_price, 2, '.', '') }}</td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align:right">{{ __('ui.cart.total_discount') }}:</td>
                    <td>{{ number_format(cart()->summary_discount, 2, '.', '') }}</td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align:right">{{ __('ui.cart.total_tax') }}:</td>
                    <td>{{ number_format(cart()->summary_tax, 2, '.', '') }}</td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align:right"><strong class="uppercase">{{ __('ui.cart.total') }}
                            ({{ number_format(cart()->summary_price, 2, '.', '') }}
                            - {{ number_format(cart()->summary_discount, 2, '.', '') }}
                            + {{ number_format(cart()->summary_tax, 2, '.', '') }}) =</strong></td>
                    <td class="label label-important" style="display:block">
                        <strong>{{ number_format(cart()->summary_total, 2, '.', '') }}</strong></td>
                </tr>
                </tbody>
            </table>

            <!--
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td>
                        <form class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label"><strong> VOUCHERS CODE: </strong> </label>
                                <div class="controls">
                                    <input type="text" class="input-medium" placeholder="CODE">
                                    <button type="submit" class="btn"> ADD</button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>

                </tbody>
            </table>
            -->

            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th class="uppercase">@lang('ui.cart.delivery')</th>
                    <th class="uppercase">@lang('ui.cart.payment')</th>
                </tr>
                <tr>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>
                </tbody>
            </table>

            <table class="table table-bordered">
                <tr>
                    <th>ЛИЧНЫЕ ДАННЫЕ</th>
                </tr>
                <tr>
                    <td>
                        <form id="orderForm" class="form-horizontal pt-2" action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <br>
                            <div class="control-group">
                                <label class="control-label" for="inputCountry">{{ __('ui.name') }}</label>
                                <div class="controls">
                                    <input name="name" type="text" id="inputCountry" placeholder="{{ __('ui.name') }}"
                                           value="{{ auth()->id() ? auth()->user()->name : '' }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputCountry">{{ __('ui.last_name') }}</label>
                                <div class="controls">
                                    <input name="last_name" type="text" id="inputCountry"
                                           placeholder="{{ __('ui.last_name') }}"
                                           value="{{ auth()->id() ? auth()->user()->last_name : '' }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPost">{{ __('ui.email') }}</label>
                                <div class="controls">
                                    <input name="email" type="text" id="inputPost" placeholder="{{ __('ui.email') }}"
                                           value="{{ auth()->id() ? auth()->user()->email : '' }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPost">{{ __('ui.phone') }}</label>
                                <div class="controls">
                                    <input name="phone" type="text" id="inputPost" placeholder="{{ __('ui.phone') }}"
                                           value="{{ auth()->id() ? auth()->user()->phone : '' }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPost">{{ __('ui.cart.address') }}</label>
                                <div class="controls">
                                <textarea name="address" type="text" id="inputPost"
                                          placeholder="{{ __('ui.cart.address') }}"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPost">{{ __('ui.cart.comment') }}</label>
                                <div class="controls">
                                <textarea name="comment" type="text" id="inputPost"
                                          placeholder="{{ __('ui.cart.comment') }}"></textarea>
                                </div>
                            </div>

                        </form>
                    </td>
                </tr>
            </table>
        @endif

        <a href="{{ route('products.index') }}" class="btn btn-large">
            <i class="icon-arrow-left"></i> {{ __('ui.continue_shopping') }}
        </a>

        @if(cart()->products->count())
            <a href="#" class="btn btn-success btn-large pull-right"
               onclick="document.getElementById('orderForm').submit();">
                {{ __('ui.cart.checkout') }}
                <i class="icon-arrow-right"></i>
            </a>
        @endif

    </div>
@endsection
