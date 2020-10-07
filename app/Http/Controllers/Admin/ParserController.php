<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Parser\WebParser;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;

class ParserController extends Controller
{

    public function parseCategories()
    {
        if (ProductCategory::all()->count() == 0) {
            WebParser::collectCategories();
        }

        return redirect()->back()   ;
    }

    public function parseProducts()
    {
        if (Product::all()->count() == 0) {
            WebParser::collectProducts();
        }

        return redirect()->back()   ;
    }
}
