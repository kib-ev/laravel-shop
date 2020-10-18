@extends('public.layouts.default')

@section('sidebar')
    {!! page_element('sidebar') !!}
@endsection

@section('content')
    <div class="span9">
        <ul class="breadcrumb">
            <li><a href="{{ route('home') }}">{{ __('ui.home') }}</a><span class="divider"> / </span></li>
            <li class="active">{{ __('ui.login') }}</li>
        </ul>
        <h3>{{ __('ui.login') }}</h3>
        <hr class="soft"/>

        <div class="row">

            <div class="span4">
                <div class="well">
                    <h5 class="uppercase">{{ __('ui.already_registered') }}</h5><br/>

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="control-group">
                            <label class="control-label" for="inputEmail1">{{ __('ui.email') }}</label>
                            <div class="controls">
                                <input name="email" class="span3" type="text" id="inputEmail1" placeholder="{{ __('ui.email') }}" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword1">{{ __('ui.password') }}</label>
                            <div class="controls">
                                <input name="password" type="password" class="span3" id="inputPassword1" placeholder="{{ __('ui.password') }}">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox" name="remember" style="vertical-align: top;">
                                <span class="ml-2 text-sm text-gray-600">{{ __('ui.remember') }}</span>
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn">{{ __('ui.sign_in')  }}</button>
                                <a href="forgetpass.html">{{ __('ui.forget_password') }}</a>
                                <!-- {{ route('password.request') }} -->
                            </div>
                        </div>
                        @endif

                    </form>
                </div>
            </div>
            <div class="span1"></div>
            <div class="span4">
                <div class="well">
                    <h5 class="uppercase">{{ __('ui.create_account') }}</h5><br/>
                    @include('public.pages.includes.register_form')

                </div>
            </div>

        </div>
    </div>
@endsection
