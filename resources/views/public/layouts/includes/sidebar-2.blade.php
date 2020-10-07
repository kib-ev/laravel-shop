@php
    $categories = \App\Models\ProductCategory::with('products', 'childrenCategories.products')->get();
@endphp

<style>
    .sidebar-menu {
        list-style: none;
        margin: 0;
        padding: 0;
        background-color: #222d32; }
    .sidebar-menu > li {
        position: relative;
        margin: 0;
        padding: 0; }
    .sidebar-menu > li > a {
        padding: 12px 5px 12px 15px;
        display: block;
        border-left: 3px solid transparent;
        color: #b8c7ce; }
    .sidebar-menu > li > a > .fa {
        width: 20px; }
    .sidebar-menu > li:hover > a, .sidebar-menu > li.active > a {
        color: #fff;
        background: #1e282c;
        border-left-color: #3c8dbc; }
    .sidebar-menu > li > .treeview-menu {
        margin: 0 1px;
        background: #2c3b41; }
    .sidebar-menu > li .label,
    .sidebar-menu > li .badge {
        margin-top: 3px;
        margin-right: 5px; }
    .sidebar-menu li.header {
        padding: 10px 25px 10px 15px;
        font-size: 12px;
        color: #4b646f;
        background: #1a2226; }
    .sidebar-menu li > a > .fa-angle-left {
        width: auto;
        height: auto;
        padding: 0;
        margin-right: 10px;
        margin-top: 3px; }
    .sidebar-menu li.active > a > .fa-angle-left {
        transform: rotate(-90deg); }
    .sidebar-menu li.active > .treeview-menu {
        display: block; }
    .sidebar-menu a {
        color: #b8c7ce;
        text-decoration: none; }
    .sidebar-menu .treeview-menu {
        display: none;
        list-style: none;
        padding: 0;
        margin: 0;
        padding-left: 5px; }
    .sidebar-menu .treeview-menu .treeview-menu {
        padding-left: 20px; }
    .sidebar-menu .treeview-menu > li {
        margin: 0; }
    .sidebar-menu .treeview-menu > li > a {
        padding: 5px 5px 5px 15px;
        display: block;
        font-size: 14px;
        color: #8aa4af; }
    .sidebar-menu .treeview-menu > li > a > .fa {
        width: 20px; }
    .sidebar-menu .treeview-menu > li > a > .fa-angle-left,
    .sidebar-menu .treeview-menu > li > a > .fa-angle-down {
        width: auto; }
    .sidebar-menu .treeview-menu > li.active > a, .sidebar-menu .treeview-menu > li > a:hover {
        color: #fff; }
    #sidebar li a {
        background: #fff;
        border: 1px solid #ccc;
        margin-bottom: -1px;
    }
</style>

<div id="sidebar" class="span3">
    <div class="well well-small"><a id="myCart" href="{{ route('cart.show') }}">
            <img src="{{ asset('/themes/images/ico-cart.png') }}" alt="cart">
            {{ __('ui.items in cart', ['count' => cart()->products->count()]) }} <span class="badge badge-warning pull-right">
                {{ number_format(cart()->summary_total, 2, '.', '') }}
            </span>
        </a>
    </div>

    <ul class="sidebar-menu">
        @foreach($categories->filter(function ($item) { return $item->parent_id == 0; }) as $category)
            <li class="treeview">
                <a href="{{ route('products.categories.show', $category->id) }}">
                    {{ ($category->name) }} [{{ $category->productsCount(0)  }}]

                    @if($category->hasChildren())
                        <i class="fa fa-angle-left pull-right"></i>
                    @endif
                </a>

                @if($category->childrenCategories)
                    @foreach($category->childrenCategories as $childrenCategory)
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('products.categories.show', $childrenCategory->id) }}">
                                    <i class="icon-chevron-right"></i>
                                    {{ $childrenCategory->name }} ({{ $childrenCategory->productsCount() }})
                                </a>
                            </li>
                        </ul>
                    @endforeach
                @endif
            </li>
        @endforeach
    </ul>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    $.sidebarMenu = function(menu) {
        var animationSpeed = 300;

        $(menu).on('click', 'li a', function(e) {
            var $this = $(this);
            var checkElement = $this.next();

            if (checkElement.is('.treeview-menu') && checkElement.is(':visible')) {
                checkElement.slideUp(animationSpeed, function() {
                    checkElement.removeClass('menu-open');
                });
                checkElement.parent("li").removeClass("active");
            }

            //If the menu is not visible
            else if ((checkElement.is('.treeview-menu')) && (!checkElement.is(':visible'))) {
                //Get the parent menu
                var parent = $this.parents('ul').first();
                //Close all open menus within the parent
                var ul = parent.find('ul:visible').slideUp(animationSpeed);
                //Remove the menu-open class from the parent
                ul.removeClass('menu-open');
                //Get the parent li
                var parent_li = $this.parent("li");

                //Open the target menu and add the menu-open class
                checkElement.slideDown(animationSpeed, function() {
                    //Add the class active to the parent li
                    checkElement.addClass('menu-open');
                    parent.find('li.active').removeClass('active');
                    parent_li.addClass('active');
                });
            }
            //if this isn't a link, prevent the page from being redirected
            if (checkElement.is('.treeview-menu')) {
                e.preventDefault();
            }
        });
    }

    $.sidebarMenu($('.sidebar-menu'))
</script>
