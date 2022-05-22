<?php

//use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Foundation\Application;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;
use Laravel\Nova\Nova;

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
//Route::get('/cart', [CartController::class, 'getCart'])->name('checkout.cart');

//Route named products is not actually used anywhere, like its controller. It seems
//to have been referenced somewhere, as commenting it out throws an error.
Route::get('/products', [ProductController::class, 'index'])->name('products')->middleware('auth');


//The View routes for dashboard, single product view, category (multi product) view, and the user cart
Route::get('/dashboard', [LandingController::class, 'index'])->name('dashboard');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/cart', [CartController::class, 'show'])->name('cart.show')->middleware('auth')->middleware('auth');

//The Cart controll routes
Route::get('/cart/item/{id}/remove', [CartController::class, 'removeItem'])->name('checkout.cart.remove')->middleware('auth');
Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('checkout.cart.clear')->middleware('auth');
Route::post('/product/add/cart', [ProductController::class, 'addToCart'])->name('product.add.cart')->middleware('auth');

//The checkout controll routes
Route::get('/checkout', [CheckoutController::class, 'getCheckout'])->name('checkout.index')->middleware('auth');
Route::post('/checkout/order', [CheckoutController::class, 'placeOrder'])->name('checkout.place.order')->middleware('auth');


//Route::get('/test', function () {
//    return Inertia::render('Test');
//})->name('test');


Route::get('/welcome', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return Redirect::route('dashboard');
    });
});

