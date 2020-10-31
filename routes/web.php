<?php

use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
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

Route::post('login', [LoginController::class, 'login'])->name('auth.login');
Route::get('logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::get('/', [PageController::class, 'showHomePage'])->name('home');

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

// ------------- PUBLIC ROUTES

// PRODUCTS
Route::resource('products', ProductController::class)->only([
    'index', 'show'
]);

// CATEGORIES
Route::name('products.')->prefix('products')->group(function () {
    Route::resource('categories', ProductCategoryController::class)->only([
        'show', // route: /products/categories/{id}
    ]);
});

// CARTS
Route::name('carts.')->prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'show'])->name('show');
});

// ORDERS
Route::resource('orders', OrderController::class)->only([
    'show', 'store'
]);

// PARSER
Route::prefix('admin/parser/')->group(function () {
    Route::get('parse/categories', [ParserController::class, 'parseCategories']);
    Route::get('parse/products', [ParserController::class, 'parseProducts']);
});

// ??
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect()->to('/');
    //return view('dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
    return view('admin.index');
});
