<?php

use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MetaController;
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

Route::view('welcome', 'welcome');

Route::post('login', [LoginController::class, 'login'])->name('auth.login');
Route::get('logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::get('/', [PageController::class, 'index'])->name('home');

// default pages

Route::get('products', function () {
    return view('public.pages.products');
})->name('products.index');

Route::get('product_details.html', function () {
    return view('public.pages.product_details');
});

Route::get('forgetpass.html', function () {
    return redirect()->to('/forgot-password');
});

Route::get('compair.html', function () {
    return view('public.pages.compare');
});

Route::get('contact', function () {
    return view('public.pages.contact');
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

Route::name('admin.')->group(function () {

    // METAS
    Route::resource('metas', MetaController::class);

    // PAGES
    Route::resource('pages', PageController::class);
});


// ??
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect()->to('/');
    //return view('dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
    return view('admin.index');
});

Route::get('/sync', [ProductController::class, 'syncProducts'])->name('products.sync');

Route::fallback([PageController::class, 'show'])->name('pages.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
