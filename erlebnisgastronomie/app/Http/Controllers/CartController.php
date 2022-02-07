<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function showCart() {
        $cart = Session::get('cart');

        // cart is not empty
        if ($cart) {
            return view('shoppingcart', ['cartItems' => $cart]);
            //dump($cart);
        }
        // Cart is empty
        else {
            //echo 'cart is empty';
            return  redirect()->route('kaffee&products');
        }
    }

    public function deleteItemFromCart(Request $request, $product_id) {
        $cart = $request->session()->get('cart');
        if (array_key_exists($product_id, $cart->items)) {
            // delete Item from an array
            unset($cart->items[$product_id]);
        }

        $previousCart = $request->session()->get('cart');
        $updatedCart = new Cart($previousCart);
        $updatedCart->updatePriceAndQuantity();

        $request->session()->put('cart', $updatedCart);

        return redirect()->route('shoppingcart');
    }

}
