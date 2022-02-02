<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegionalProductsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/warenkorb', function () {
    return view('warenkorb');
});



Route::get('/contactus',[ContactController::class,'contact']);

Route::post('/send-message',[ContactController::class,'sendEmail'])->name('contact.send');


//Route::get('/products',[ProductsController::class, 'index']);
//Route::get('/products',[ProductsController::class,'index'])->name('productsGet');
Route::get('/kaffee&products', [ProductsController::class, 'index']);





Auth::routes(['verify' => true]);

Route::get('/anmelden', [HomeController::class, 'index'])->name('/login');
Route::get('/registrieren', [HomeController::class, 'index'])->name('/register');




