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
            return  redirect()->route('shoppingcart');
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

    /*
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('kaffee&products', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
    */
}
