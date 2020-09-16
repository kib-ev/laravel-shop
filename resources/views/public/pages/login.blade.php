@extends('public.layouts.default')

@section('sidebar')
    @include('public.layouts.includes.sidebar')
@endsection

@section('content')
    <div class="span9">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
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
                            <label class="control-label" for="inputEmail0">{{ __('ui.'.'E-mail address') }}</label>
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

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <x-jet-label value="Email" />
                            <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-jet-label value="Password" />
                            <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        </div>

                        <div class="block mt-4">
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-jet-button class="ml-4">
                                {{ __('Login') }}
                            </x-jet-button>
                        </div>
                    </form>
                    <form>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail1">{{ __('ui.'.'E-mail address') }}</label>
                            <div class="controls">
                                <input class="span3" type="text" id="inputEmail1" placeholder="Email">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword1">{{ __('ui.'.'Password') }}</label>
                            <div class="controls">
                                <input type="password" class="span3" id="inputPassword1" placeholder="Password">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn">Sign in</button>
                                <a href="forgetpass.html">Forget password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
