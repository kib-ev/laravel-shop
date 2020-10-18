@extends('public.layouts.default')

@section('carousel')
    @include('public.pages.includes.carousel')
@endsection

@section('sidebar')
    {!! page_element('sidebar') !!}
@endsection

@section('content')
    <div class="span9">
        @include('public.pages.includes.featured_products', [
            'title' => __('ui.featured_products')
        ])

        @include('public.pages.includes.products_block_pane', [
            'products' => $products ?? [],
            'title' => __('ui.random_products')
        ])

    </div>
@endsection
