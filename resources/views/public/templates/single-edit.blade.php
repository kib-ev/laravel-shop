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
            <h3><input type="text" name="name" value="{{ $page->name }}" style="width: 100%;"></h3>
            <hr class="soft"/>
            <div class="justify">
                <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
                <textarea name="content" style="width: 100%; height: 500px;">{{ $page->content }}</textarea>
                <script>
                    CKEDITOR.replace( 'content' );
                </script>
            </div>

            <input type="submit" value="save">
        </form>
    </div>
@endsection
