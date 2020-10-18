<div id="sidebar" class="span3">

    <div class="well well-small">
        <a id="myCart" href="{{ route('carts.show') }}">
            <img src="{{ asset('/themes/images/ico-cart.png') }}" alt="@lang('ui.shopping_cart')">

            @choice('ui.cart.products_count', cart()->products->count(), ['count' => cart()->products->count()])

            <span class="badge badge-warning pull-right">
                {{ number_format(cart()->summary_total, 2, '.', '') }}
            </span>
        </a>
    </div>

    {!! page_element('sidebar-menu') !!}
</div>
