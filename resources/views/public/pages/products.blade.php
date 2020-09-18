@extends('public.layouts.default')

@section('sidebar')
    @include('public.layouts.includes.sidebar')
@endsection

@section('content')
    <div class="span9">
        @include('public.pages.includes.breadcrumbs')

        <h3>Products Name <small class="pull-right">{{ __('ui.'.'products are available', ['total' => @$products->total()]) }}</small></h3>
        <hr class="soft"/>
        <p>
            Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with
            the latest fashion tendencies - that is why our goods are so popular and we have a great number of faithful
            customers all over the country.
        </p>
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
            <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
            <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
        </div>
        <br class="clr"/>
        <div class="tab-content">
            <div class="tab-pane" id="listView">
                @foreach($products ?? [] as $product)
                    @include('public.pages.includes.product_list_item', ['product' => $product])
                @endforeach
            </div>

            <div class="tab-pane  active" id="blockView">
                <ul class="thumbnails">
                    @foreach($products ?? [] as $product)
                        @include('public.pages.includes.product_block_item', ['product' => $product])
                    @endforeach
                </ul>
                <hr class="soft"/>
            </div>
        </div>

        <a href="/compair.html" class="btn btn-large pull-right">Compair Product</a>
        <div class="pagination">
            {{ @$products->withQueryString()->onEachSide(2)->links() }}
        </div>


        <br class="clr"/>
    </div>
@endsection
