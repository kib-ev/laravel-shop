@extends('public.layouts.default')

@section('sidebar')
    @include('public.layouts.includes.sidebar')
@endsection

@section('content')
    <div class="span9">
        <ul class="breadcrumb">
            <li><a href="/">Home</a> <span class="divider">/</span></li>
            <li class="active">Login</li>
        </ul>
        <h3> Login</h3>
        <hr class="soft"/>

        <div class="row">
            <div class="span4">
                <div class="well">
                    <h5>CREATE YOUR ACCOUNT</h5><br/>
                    Enter your e-mail address to create an account.<br/><br/><br/>

                    <form action="register.html">
                        <div class="control-group">
                            <label class="control-label" for="inputEmail0">{{ __('ui.'.'email') }}</label>
                            <div class="controls">
                                <input class="span3" type="text" id="inputEmail0" placeholder="Email">
                            </div>
                        </div>
                        <div class="controls">
                            <button type="submit" class="btn block">Create Your Account</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="span1"> &nbsp;</div>
            <div class="span4">
                <div class="well">
                    <h5>ALREADY REGISTERED ?</h5>

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="control-group">
                            <label class="control-label" for="inputEmail1">@lang('ui.email')</label>
                            <div class="controls">
                                <input name="email" class="span3" type="text" id="inputEmail1" placeholder="@lang('ui.email')" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword1">@lang('ui.password')</label>
                            <div class="controls">
                                <input name="password" type="password" class="span3" id="inputPassword1" placeholder="@lang('ui.password')">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox" name="remember" style="vertical-align: top;">
                                <span class="ml-2 text-sm text-gray-600">@lang('ui.remember')</span>
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn">@lang('ui.sign in')</button>
                                <a href="forgetpass.html">Forget password?</a>
                                <!-- {{ route('password.request') }} -->
                            </div>
                        </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
