<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegionalProductsController;
use Fruitcake\Cors\HandleCors;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use \App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\AllergenController;
use \App\Http\Controllers\Payment\PaymentsController;

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
Route::group(['middleware'=>'HtmlMinifier'], function(){
    Route::get('/', function () {
        return view('home');
    }) ->name('home');



    Route::get('/app', function () {
        return view('app');
    });
    Route::get('/regionales', [RegionalProductsController::class , 'index']) ->name('regionalProducts');

    Route::get('/kontakt', function () {
        return view('kontakt');
    });

    Route::get('/profile', function () {
        return view('userprofile');
    });
    Route::get('product/checkoutProducts', [ProductsController::class, 'checkoutProducts'])->name('CheckoutProducts');
    Route::get('product/weeklyProducts', [ProductsController::class, 'showWeeklyProducts'])->name('weeklyCart');
    /*Route::get('home', function () {
        return view('userprofile');
    });*/

// show cart items
//Route::get('/shoppingcart/items', [CartController::class, 'showCart']);
    Route::get('/shoppingcart', [CartController::class, 'showCart']) ->name('shoppingcart');

// delete item from cart
    Route::get('/kaffee&products/deleteItemFromCart/{product_id}', [CartController::class, 'deleteItemFromCart'])->name('DeleteItemFromCart');

    // increase single product in cart
    Route::get('product/increaseSingleProduct/{product_id}' ,[ProductsController::class,'increaseSingleProduct']) ->name('IncreaseSingleProduct');

    // decrease single product in cart
    Route::get('product/decreaseSingleProduct/{product_id}' ,[ProductsController::class,'decreaseSingleProduct']) ->name('DecreaseSingleProduct');

    Route::get('/contactus',[ContactController::class,'contact']);

    Route::post('/send-message',[ContactController::class,'sendEmail'])->name('contact.send');

    Route::get('/kaffee&products', [ProductsController::class, 'index']) ->name('kaffee&products')
        ->middleware(HandleCors::class);

    Route::get('/kaffee&products/addToCart/{product_id}', [ProductsController::class, 'addProductToCart'])->name('AddToCartProduct');

    //Route::get('product/createOrder/', [ProductsController::class, 'createOrder']) -> name('CreateOrder');
   // Route::get('product/createOrder/', [ProductsController::class, 'createOrder']) -> name('CreateOrder');
    Route::post('product/createOrder/', [ProductsController::class, 'createOrder']) -> name('CreateOrder');

    // payment page
    Route::get('payment/paymentpage' , [PaymentsController::class, 'showPaymentPage']) -> name('ShowPaymentPage');


    Auth::routes(['verify' => true]);

    Route::get('/anmelden', [HomeController::class, 'index'])->name('/login');
    Route::get('/userprofile', [HomeController::class, 'indexLogin'])->name('/userprofile');
    Route::get('/registrieren', [HomeController::class, 'indexRegister'])->name('/register');
    Route::get('/kontakt', [ContactController::class, 'contact'])->name('contact');
    // Admin Access only
    Route::group(['middleware' => 'restrictAccess'] , function() {
        //Admin Panel
        Route::get('admin/products',[AdminProductController::class, 'index'] )->name('adminDisplayProducts');
        //->middleware('restrictToAdmin');
        //display edit product image form
        Route::get('admin/editProductImageForm/{product_id}',[AdminProductController::class, 'editProductImageForm'] ) ->name('adminEditProductImageForm');
        //display edit product form
        Route::get('admin/editProductForm/{product_id}', [AdminProductController::class, 'editProductForm'] ) ->name('adminEditProductForm');
        //delete product
        Route::get('admin/deleteProduct/{product_id}',[AdminProductController::class, 'deleteProduct'] ) ->name('adminDeleteProduct');
        //display create product form
        Route::get('admin/createProductForm',[AdminProductController::class ,'createProductForm'] ) ->name('adminCreateProductForm');
        //orders control panel delivery
        Route::get('admin/ordersPanel/',[AdminProductController::class, 'ordersPanelDelivery'] ) ->name("OrdersPanelDelivery");
        //orders control panel pickup
        Route::get('admin/ordersPanelPickup/',[AdminProductController::class, 'ordersPanelPickup'] ) ->name("ordersPanelPickup");
        //update product image
        Route::post('admin/updateProductImage/{product_id}',[AdminProductController::class, 'updateProductImage']) ->name("adminUpdateProductImage");
        //update product data
        Route::post('admin/updateProduct/{product_id}',[AdminProductController::class, 'updateProduct'] )->name("adminUpdateProduct");
        //send new product data to database
        Route::post('admin/sendCreateProductForm/',[AdminProductController::class, 'sendCreateProductForm'] )->name("adminSendCreateProductForm");
        //display edit order form
        Route::get('admin/editOrderForm/{order_id}', [AdminProductController::class, 'editOrderForm']) ->name( "AdminEditOrderForm");
        //delete order
        Route::get('admin/deleteOrder/{order_id}',[AdminProductController::class, 'deleteOrder'] ) ->name("AdminDeleteOrder");
        //update order data
        Route::post('admin/updateOrder/{order_id}', [AdminProductController::class , 'updateOrder']) ->name( "AdminUpdateOrder");
    });

});
