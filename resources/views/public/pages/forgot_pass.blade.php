@extends('public.layouts.default')

@section('sidebar')
    {!! page_element('sidebar') !!}
@endsection

@section('content')
    <div class="span9">
        <ul class="breadcrumb">
            <li><a href="/">Home</a> <span class="divider">/</span></li>
            <li class="active">Forget password?</li>
        </ul>
        <h3> FORGET YOUR PASSWORD?</h3>
        <hr class="soft"/>

        <div class="row">
            <div class="span9" style="min-height:900px">
                <div class="well">
                    <h5>Reset your password</h5><br/>
                    Please enter the email address for your account. A verification code will be sent to you. Once you
                    have received the verification code, you will be able to choose a new password for your
                    account.<br/><br/><br/>

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <label class="control-label" for="inputEmail1"> {{ __('ui.'.'E-mail address') }}</label>
                        <div class="controls">
                            <input name="email" class="span3" type="text" id="inputEmail1" placeholder="Email">
                        </div>

                        <div class="control-group">
                            <button type="submit" class="btn block">
                                {{ __('ui.'.'Submit') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
