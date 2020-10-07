@foreach ($errors->all() as $error)
    <div class="alert alert-block alert-error fade in">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $error }}</strong>
    </div>
@endforeach

<!--
            <div class="alert alert-info fade in">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
             </div>
            <div class="alert fade in">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
             </div>
             <div class="alert alert-block alert-error fade in">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
             </div> -->

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="control-group">
        <label class="control-label" for="inputName2">{{ __('ui.name') }} <span class="required-marker">*</span></label>
        <div class="controls">
            <input name="name" class="span3" type="text" id="inputName2" placeholder="{{ __('ui.name') }}" value="{{ old('name') }}" autocomplete="off">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputLastName2">{{ __('ui.last_name') }}</label>
        <div class="controls">
            <input name="last_name" class="span3" type="text" id="inputLastName2" placeholder="{{ __('ui.last_name') }}" value="{{ old('last_name') }}" autocomplete="off">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputEmail2">{{ __('ui.email') }} <span class="required-marker">*</span></label>
        <div class="controls">
            <input name="email" class="span3" type="text" id="inputEmail2" placeholder="{{ __('ui.email') }}" value="{{ old('email') }}" autocomplete="off">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputPhone2">{{ __('ui.phone') }}</label>
        <div class="controls">
            <input name="phone" class="span3" type="text" id="inputPhone2" placeholder="{{ __('ui.phone') }}" value="{{ old('phone') }}" autocomplete="off">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputPassword2">{{ __('ui.password') }} <span class="required-marker">*</span></label>
        <div class="controls">
            <input name="password" class="span3" type="password" id="inputPassword2" placeholder="{{ __('ui.password') }}" value="{{ old('password') }}" autocomplete="new-password">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="inputConfirmPassword2">{{ __('ui.confirm_password') }} <span class="required-marker">*</span></label>
        <div class="controls">
            <input name="password_confirmation" class="span3" type="password" id="inputConfirmPassword2" placeholder="{{ __('ui.confirm_password') }}" value="{{ old('password_confirmation') }}" autocomplete="off">
        </div>
    </div>
    &nbsp;
    @if (Route::has('register'))
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn">{{ __('ui.register') }}</button>
            </div>
        </div>
    @endif
</form>
