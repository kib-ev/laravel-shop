@extends('public.layouts.default')

@section('sidebar')
    @include('public.layouts.includes.sidebar')
@endsection

@section('content')
    <div class="span9">
        <form action="{{ route('admin.pages.update', $page->id) }}" method="post">
            @csrf
            @method('patch')

            <ul class="breadcrumb">
                <li><a href="/">{{ __('ui.'.'home') }}</a><span class="divider"> / </span></li>
                <li class="active">{{ $page->name }}</li>
            </ul>
            <h3><input type="text" name="name" value="{{ $page->name }}"></h3>
            <hr class="soft"/>
            <div class="justify">
                <textarea name="content">{{ $page->content }}</textarea>
            </div>

            <input type="submit">
        </form>
    </div>
@endsection
