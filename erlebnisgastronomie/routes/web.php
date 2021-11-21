<?php

use Illuminate\Support\Facades\Auth;
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



Route::get('/kaffee', function () {

    return view('kaffee');
});

Route::get('/wochenkarte', function () {
    return view('wochenkarte');
});

Route::get('/app', function () {
    return view('app');
});

Route::get('/regionales', function () {
    return view('regionaleprodukte');
});

Route::get('/kontakt', function () {
    return view('kontakt');
});







Auth::routes();

Route::get('/anmelden', [App\Http\Controllers\HomeController::class, 'index'])->name('/login');
Route::get('/registrieren', [App\Http\Controllers\HomeController::class, 'index'])->name('/register');


