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
Route::get('/index.html', function () {
    return redirect()->to('/');
});

// default pages
Route::get('contact.html', function () {
    return view('public.pages.contact');
});
Route::get('about', function () {
    return view('public.pages.about');
});
Route::get('delivery.html', function () {
    return view('public.pages.delivery');
});
Route::get('payment', function () {
    return view('public.pages.payment');
});
Route::get('blog', function () {
    return view('public.pages.blog');
});
Route::get('special_offer.html', function () {
    $products = \App\Models\Product::paginate(6);
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
Route::get('product_summary.html', function () {
    return view('public.pages.product_summary');
});
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

