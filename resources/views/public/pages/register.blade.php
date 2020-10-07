@extends('public.layouts.default')

@section('sidebar')
    @include('public.layouts.includes.sidebar')
@endsection

@section('content')
    <div class="span9">
        <ul class="breadcrumb">
            <li><a href="{{ route('home') }}">{{ __('ui.home') }}</a><span class="divider"> / </span></li>
            <li class="active">{{ __('ui.registration') }}</li>
        </ul>
        <h3>{{ __('ui.registration') }}</h3>
        <div class="well">
            <h4 class="uppercase">{{ __('ui.personal_information') }}</h4><br>
            <div class="form-horizontal">
                @include('public.pages.includes.register_form')
            </div>
        </div>
    </div>
@endsection
