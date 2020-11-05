@extends('public.layouts.default')

@section('sidebar')
    @include('public.layouts.includes.sidebar')
@endsection

@section('content')
    <div class="span9">
        <ul class="breadcrumb">
            <li><a href="/">{{ __('ui.'.'home') }}</a><span class="divider"> / </span></li>
            <li class="active">{{ $page->name }}</li>
        </ul>
        <h3>{{ $page->name }}</h3>
        <hr class="soft"/>
        <div class="justify">
            {!! $page->content !!}
        </div>
    </div>
@endsection
