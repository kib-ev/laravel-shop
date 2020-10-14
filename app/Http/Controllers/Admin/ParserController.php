<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Parser\WebParser1000Stroy;
use App\Classes\Parser\WebParserPostroykaBy;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;

class ParserController extends Controller
{

    public function parseCategories()
    {
        if (ProductCategory::all()->count() == 0) {
            WebParserPostroykaBy::collectCategories();
        }

        return back();
    }

    public function parseProducts()
    {
        if (Product::all()->count() == 0) {
            WebParserPostroykaBy::collectProducts();
        }

        return back();
    }
}
