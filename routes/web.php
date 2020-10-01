<?php

use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $products = \App\Models\Product::paginate(6);
    return view('public.pages.index', compact('products'));
});

// default pages
Route::get('contacts', function () {
    return view('public.pages.contact');
});
Route::get('about', function () {
    return view('public.pages.about');
});
Route::get('delivery', function () {
    return view('public.pages.delivery');
});
Route::get('payment', function () {
    return view('public.pages.payment');
});
Route::get('blog', function () {
    return view('public.pages.blog');
});
Route::get('special_offer', function () {
    $products = \App\Models\Product::where('price_old', '!=', 0)->paginate(6);
    return view('public.pages.special_offer', compact('products'));
});
Route::get('products', function () {
    return view('public.pages.products');
});
Route::get('faq.html', function () {
    return view('public.pages.faq');
});

Route::get('legal_notice.html', function () {
    return view('public.pages.legal_notice');
});

Route::get('product_details.html', function () {
    return view('public.pages.product_details');
});

Route::get('login.html', function () {
    return redirect()->to('/login');
});

Route::get('product_summary.html', [\App\Http\Controllers\PageController::class, 'productSummaryPage']);

Route::get('forgetpass.html', function () {
    return redirect()->to('/forgot-password');
});

Route::get('compair.html', function () {
    return view('public.pages.compare');
});

// temp
Route::get('components.html', function () {
    return view('public.pages.components');
});

Route::resource('products', ProductController::class)->only([
    'index', 'show'
]);

Route::resource('product-categories', ProductCategoryController::class)->only([
    'index', 'show'
]);

// redirect
Route::get('products.html', function () {
    return redirect()->to('products');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect()->to('/');
    //return view('dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
    return view('admin.index');
});


Route::prefix('admin')->group(function () {
    Route::get('test', function () {
//        return (new \App\Classes\Parser\WebParser())->run();

       $cats =\App\Models\ProductCategory::where('parent_id', 0)->get();

       $catsWithSubCats = $cats->filter(function ($item) {
           return $item->childrenCategories()->get()->count();
       });
       foreach($catsWithSubCats as $cat) {
           foreach($cat->products()->get() as $product) {
               $product->delete();
           }
       }

       dd($cats, $catsWithSubCats);

    });

});
