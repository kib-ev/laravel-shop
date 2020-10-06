<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\ProductCategory;
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

Route::post('login', [LoginController::class, 'login'])->name('auth.login');
Route::get('logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::get('/', function () {
    $products = Product::paginate(6);
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
    $products = Product::where('price_old', '!=', 0)->paginate(6);
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

Route::get('products_summary', [PageController::class, 'productSummaryPage'])
    ->name('cart.show');

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

        $cats = ProductCategory::where('parent_id', 0)->get();

        $catsWithSubCats = $cats->filter(function ($item) {
            return $item->childrenCategories()->get()->count();
        });
        foreach ($catsWithSubCats as $cat) {
            foreach ($cat->products()->get() as $product) {
                $product->delete();
            }
        }

        dd($cats, $catsWithSubCats);

    });

});
