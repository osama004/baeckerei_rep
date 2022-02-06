<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegionalProductsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AllergenController;

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
    // if user NOT!!! logged in
    /*
    if (!Auth::check()){
        return redirect('/login');
    }
    */
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/wochenkarte', function () {
    return view('wochenkarte');
});

Route::get('/app', function () {
    return view('app');
});
/*
Route::get('/regionales', function () {
    return view('regionaleprodukte');
});
*/

Route::get('/regionales', [RegionalProductsController::class , 'index']);

Route::get('/kontakt', function () {
    return view('kontakt');
});

Route::get('/profile', function () {
    return view('userprofile');
});

//Route::get('/shoppingcart', function () { return view('shoppingcart');}) ->name('shoppingcart');

// show cart items
//Route::get('/shoppingcart/items', [CartController::class, 'showCart']);
Route::get('/shoppingcart', [CartController::class, 'showCart']) ->name('shoppingcart');

// delete item from cart
Route::get('/kaffee&products/deleteItemFromCart/{product_id}', [CartController::class, 'deleteItemFromCart'])->name('DeleteItemFromCart');


Route::get('/contactus',[ContactController::class,'contact']);

Route::post('/send-message',[ContactController::class,'sendEmail'])->name('contact.send');


//Route::get('/products',[ProductsController::class, 'index']);
//Route::get('/products',[ProductsController::class,'index'])->name('productsGet');
Route::get('/kaffee&products', [ProductsController::class, 'index']) ->name('kaffee&products');
//Route::get('/kaffee&products', [AllergenController::class, 'index']) ->name('productsAllergen');
Route::get('/kaffee&products/addToCart/{product_id}', [ProductsController::class, 'addProductToCart'])->name('AddToCartProduct');






Auth::routes(['verify' => true]);

Route::get('/anmelden', [HomeController::class, 'index'])->name('/login');
Route::get('/userprofile', [HomeController::class, 'indexLogin'])->name('/userprofile');
Route::get('/registrieren', [HomeController::class, 'index'])->name('/register');





