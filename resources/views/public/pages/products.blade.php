@extends('public.layouts.default')

@section('sidebar')
    {!! page_element('sidebar') !!}
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
                @choice('ui.products_are_available', $products->total(), ['total' => $products->total()])
            </small>
        </h3>
        <!--<hr class="soft"/>
        <p>
            Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with
            the latest fashion tendencies - that is why our goods are so popular and we have a great number of faithful
            customers all over the country.
        </p>-->
        <hr class="soft"/>
        <form class="form-horizontal span6"> {{-- TODO: add sort --}}
          <div class="control-group">
              <label class="control-label alignL">{{ __('ui.sort_by') }}</label>
              <select>
                  <option>По наименованию А - Я</option>
                  <option>По наименованию Я - А</option>
                  <option>По цене - сначала дешевые</option>
                  <option>По цене - сначала дорогие</option>
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
