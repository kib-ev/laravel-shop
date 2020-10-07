@extends('public.layouts.default')

@section('sidebar')
    @include('public.layouts.includes.sidebar')
@endsection

@section('content')
    <div class="span9">
        <ul class="breadcrumb">
            <li><a href="{{ url('/') }}">@lang('ui.home')</a> <span class="divider">/</span></li>
            <li class="active"> @lang('ui.shopping cart') </li>
        </ul>
        <h3>
            @lang('ui.shopping cart') [ <small>{{ cart()->products->count() }} Item(s) </small>]
            <a href="products.html" class="btn btn-large pull-right">
                <i class="icon-arrow-left"></i> @lang('ui.continue shopping')
            </a>
        </h3>
        <hr class="soft"/>

        @if(!auth()->id())
        <table class="table table-bordered">
            <tr>
                <th>{{ __('ui.'.'already registered') }}</th>
            </tr>
            <tr>
                <td>
                    <form class="form-horizontal" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="control-group">
                            <label class="control-label" for="inputUsername">{{ __('ui.email') }}</label>
                            <div class="controls">
                                <input name="email" type="text" id="inputUsername" placeholder="{{ __('ui.email') }}">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword1">{{ __('ui.password') }}</label>
                            <div class="controls">
                                <input name="password" type="password" id="inputPassword1" placeholder="{{ __('ui.password') }}">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn">@lang('ui.sign in')</button>
                                {{ __('ui.'.'or') }}
                                <a href="{{ route('register') }}" class="btn">@lang('ui.register')</a>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <a href="{{ route('password.request') }}"
                                   style="text-decoration:underline">{{ __('ui.'.'forgot password?') }}</a>
                            </div>
                        </div>
                    </form>
                </td>
            </tr>
        </table>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Product</th>
                <th>Description</th>
                <th>Quantity/Update</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Tax</th>
                <th>Total</th>
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

                            <form action="{{ route('api.carts.products.pivot.update', $product->pivot->id) }}" method="post" style="display: inline;">
                                @csrf
                                <input type="hidden" name="redirect" value="{{ url()->current() }}">
                                <input type="hidden" name="count" value="{{ $product->pivot->count - 1 }}">
                                <button class="btn" type="submit">
                                    <i class="icon-minus"></i>
                                </button>
                            </form>

                            <form action="{{ route('api.carts.products.pivot.update', $product->pivot->id) }}" method="post" style="display: inline;">
                                @csrf
                                <input type="hidden" name="redirect" value="{{ url()->current() }}">
                                <input type="hidden" name="count" value="{{ $product->pivot->count + 1 }}">
                                <button class="btn" type="submit">
                                    <i class="icon-plus"></i>
                                </button>
                            </form>

                            <form action="{{ route('api.carts.products.pivot.remove', $product->pivot->id) }}" method="post" style="display: inline;">
                                @csrf
                                <input type="hidden" name="redirect" value="{{ url()->current() }}">
                                <button class="btn btn-danger" type="submit">
                                    <i class="icon-remove icon-white"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                    <td>{{ $product->summary_price > 0 ? $product->summary_price : '--' }}</td>
                    <td>{{ $product->summary_discount > 0 ? $product->summary_discount : '--' }}</td>
                    <td>{{ $product->summary_tax > 0 ? $product->summary_tax : '--' }}</td>
                    <td>{{ $product->summary_total > 0 ? $product->summary_total : '--' }}</td>
                </tr>
            @endforeach
            <!--
            <tr>
                <td><img width="60" src="/themes/images/products/4.jpg" alt=""/></td>
                <td>MASSA AST<br/>Color : black, Material : metal</td>
                <td>
                    <div class="input-append"><input class="span1" style="max-width:34px" placeholder="1"
                                                     id="appendedInputButtons" size="16" type="text">
                        <button class="btn" type="button"><i class="icon-minus"></i></button>
                        <button class="btn" type="button"><i class="icon-plus"></i></button>
                        <button class="btn btn-danger" type="button"><i class="icon-remove icon-white"></i></button>
                    </div>
                </td>
                <td>$120.00</td>
                <td>$25.00</td>
                <td>$15.00</td>
                <td>$110.00</td>
            </tr>
            <tr>
                <td><img width="60" src="/themes/images/products/8.jpg" alt=""/></td>
                <td>MASSA AST<br/>Color : black, Material : metal</td>
                <td>
                    <div class="input-append"><input class="span1" style="max-width:34px" placeholder="1" size="16"
                                                     type="text">
                        <button class="btn" type="button"><i class="icon-minus"></i></button>
                        <button class="btn" type="button"><i class="icon-plus"></i></button>
                        <button class="btn btn-danger" type="button"><i class="icon-remove icon-white"></i></button>
                    </div>
                </td>
                <td>$7.00</td>
                <td>--</td>
                <td>$1.00</td>
                <td>$8.00</td>
            </tr>
            <tr>
                <td><img width="60" src="/themes/images/products/3.jpg" alt=""/></td>
                <td>MASSA AST<br/>Color : black, Material : metal</td>
                <td>
                    <div class="input-append"><input class="span1" style="max-width:34px" placeholder="1" size="16"
                                                     type="text">
                        <button class="btn" type="button"><i class="icon-minus"></i></button>
                        <button class="btn" type="button"><i class="icon-plus"></i></button>
                        <button class="btn btn-danger" type="button"><i class="icon-remove icon-white"></i></button>
                    </div>
                </td>
                <td>$120.00</td>
                <td>$25.00</td>
                <td>$15.00</td>
                <td>$110.00</td>
            </tr>
            -->

            <tr>
                <td colspan="6" style="text-align:right">Total Price:</td>
                <td>{{ cart()->summary_price }}</td>
            </tr>
            <tr>
                <td colspan="6" style="text-align:right">Total Discount:</td>
                <td>{{ cart()->summary_discount }}</td>
            </tr>
            <tr>
                <td colspan="6" style="text-align:right">Total Tax:</td>
                <td>{{ cart()->summary_tax }}</td>
            </tr>
            <tr>
                <td colspan="6" style="text-align:right"><strong>TOTAL ({{ cart()->summary_price }} - {{ cart()->summary_discount }} + {{ cart()->summary_tax }}) =</strong></td>
                <td class="label label-important" style="display:block"><strong>{{ cart()->summary_total }}</strong></td>
            </tr>
            </tbody>
        </table>


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

        <table class="table table-bordered">
            <tr>
                <th>ЛИЧНЫЕ ДАННЫЕ</th>
            </tr>
            <tr>
                <td>
                    <form class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label" for="inputCountry">Ваше имя </label>
                            <div class="controls">
                                <input type="text" id="inputCountry" placeholder="Country">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPost">E-mail </label>
                            <div class="controls">
                                <input type="text" id="inputPost" placeholder="Postcode">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPost">Телефон </label>
                            <div class="controls">
                                <input type="text" id="inputPost" placeholder="Postcode">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPost">Address </label>
                            <div class="controls">
                                <textarea type="text" id="inputPost" placeholder="address"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPost">Comment </label>
                            <div class="controls">
                                <textarea type="text" id="inputPost" placeholder="Comment"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn">ESTIMATE</button>
                            </div>
                        </div>
                    </form>
                </td>
            </tr>
        </table>
        <a href="/products" class="btn btn-large"><i class="icon-arrow-left"></i> {{ __('ui.'.'continue shopping') }}
        </a>
        <a href="/login" class="btn btn-large pull-right">{{ __('ui.'.'next step') }} <i
                class="icon-arrow-right"></i></a>
    </div>
@endsection
