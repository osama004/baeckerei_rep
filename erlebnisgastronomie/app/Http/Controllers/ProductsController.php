<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index():View
    {
        $sandwiches = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.category_id')
            ->where('products.category_id', '=', 1)
            ->get()->toArray();
           // -



        $sweets = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.category_id')
            ->where('products.category_id', '=', 2)
            ->get()->toArray();


        $breads = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.category_id')
            ->where('products.category_id', '=', 3)
            ->get()->toArray();

        $others = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.category_id')
            ->where('products.category_id', '=', 4)
            ->get()->toArray();


       // $products = Product::all();
        return view("kaffee&products", compact( "sandwiches", "breads", "sweets", "others"));

    }

    public function addProductToCart(Request $request,$product_id) {
        $previousCart = $request->session()->get('cart');
        $cart = new Cart($previousCart);

        $product = Product::query()->find($product_id);
        $cart->addItem($product_id, $product );
        // create the session ( it stores the new object of the cart in the session
        $request->session()->put('cart', $cart);

        // it shows the cart object (for debugging)
        dump($cart);




    }
}
