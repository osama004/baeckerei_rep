<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ItemNotFoundException;
use Throwable;

class CartController extends Controller
{
    public function showCart()
    {
        try {
            $cart = Session::get('cart');// cart is not empty
            if ($cart) {
                return view('shoppingcart', ['cartItems' => $cart]);
                //dump($cart);
            } else { //echo 'cart is empty';
                return view('shoppingcart', ['cartItems' => new Cart($cart)]);
            }
        } catch (ItemNotFoundException $e) {
            abort(404);
        } catch (Throwable $e) {
            abort(500);
        }
    }


    public function deleteItemFromCart(Request $request, $product_id)
    {

        try {
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
        } catch (ItemNotFoundException $e) {
            abort(404);
        } catch (Throwable $e) {
            abort(500);
        }
    }

}
