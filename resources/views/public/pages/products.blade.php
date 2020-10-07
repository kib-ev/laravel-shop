@extends('public.layouts.default')

@section('sidebar')
    @include('public.layouts.includes.sidebar')
@endsection

@section('content')
    <div class="span9">
        <ul class="breadcrumb">
            <li><a href="/">{{ __('ui.home') }}</a><span class="divider"> / </span></li>
            <li class="active">{{ __('ui.products') }}</li>
        </ul>

        <h3>
            <span class="page-title">{{ __('ui.products') }}</span>
            <small class="pull-right">
                {{ __('ui.products are available', ['total' => @$products->total()]) }}
            </small>
        </h3>
        <!--<hr class="soft"/>
        <p>
            Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with
            the latest fashion tendencies - that is why our goods are so popular and we have a great number of faithful
            customers all over the country.
        </p>-->
        <hr class="soft"/>
        <form class="form-horizontal span6">
            <div class="control-group">
                <label class="control-label alignL">Sort By </label>
                <select>
                    <option>Product name A - Z</option>
                    <option>Product name Z - A</option>
                    <option>Product Stoke</option>
                    <option>Price Lowest first</option>
                </select>
            </div>
        </form>

        <div id="myTab" class="pull-right">
            <a href="#blockView" data-toggle="tab">
                <span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span>
            </a>
            <a href="#listView" data-toggle="tab">
                <span class="btn btn-large"><i class="icon-list"></i></span>
            </a>
        </div>
        <br class="clr"/>

        <div class="tab-content">
            <div class="tab-pane active" id="blockView">
                @include('public.pages.includes.products_block_pane', ['products' => $products ?? []])
            </div>
            <div class="tab-pane" id="listView">
                @include('public.pages.includes.products_list_pane', ['products' => $products ?? []])
            </div>
        </div>

        <hr class="soft"/>

        <!-- <a href="/compair.html" class="btn btn-large pull-right">Compare Product</a> -->

        <div class="pagination">
            {{ @$products->withQueryString()->onEachSide(2)->links() }}
        </div>


        <br class="clr"/>
    </div>
@endsection
