<ul id="sideManu" class="nav nav-tabs nav-stacked">
    @foreach($categories->filter(function ($item) { return $item->parent_id == 0; }) as $category)
        <li class="{{ $category->hasChildren() ? 'subMenu' : '' }} {{ $categoryCssClass[$category->id] }}">
            <a href="{{ route('products.categories.show', $category->id) }}">
                {{ ($category->name) }} [{{ $category->productsCount(0)  }}]

                @if($category->hasChildren())
                    <i class="fa fa-angle-left pull-right"></i>
                @endif
            </a>

            @if($category->childrenCategories)
                <ul style="display: {{ $categoryCssClass[$category->id] ? 'block' : 'none' }};">
                    @foreach($category->childrenCategories as $childrenCategory)
                        <li>
                            <a href="{{ route('products.categories.show', $childrenCategory->id) }}" class="">
                                <i class="icon-chevron-right"></i>
                                {{ $childrenCategory->name }} ({{ $childrenCategory->productsCount() }})
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>
