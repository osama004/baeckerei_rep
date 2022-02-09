<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductsController extends Controller
{
    /**
     * @return Renderable
     */
    public function index():View
    {


       $sandwiches = Product::with('Category')->where('products.category_id', '=', 1)->get();
       $sweets = Product::with('Category')->where('products.category_id', '=', 2)->get();
       $breads = Product::with('Category')->where('products.category_id', '=', 3)->get();
       $others = Product::with('Category')->where('products.category_id', '=', 4)->get();


        $allergens = DB::table('allergens')
            ->join('ingredients_allergens', 'allergens.allergen_id', 'ingredients_allergens.allergen_id')
            ->join('ingredients', 'ingredients_allergens.ingredient_id', 'ingredients.ingredient_id')
            ->join('products_ingredients', 'ingredients.ingredient_id', 'products_ingredients.ingredient_id')
            ->groupBy(['ingredients.name', 'allergens.type', 'allergens.describe_type', 'products_ingredients.product_id'])
            ->get( ['ingredients.name', 'allergens.type', 'allergens.describe_type' , 'products_ingredients.product_id'])
            ->toArray();



        return view("kaffee&products", compact( "sandwiches", "breads", "sweets", "others", "allergens"));

    }

    public function addProductToCart(Request $request,$product_id) {
       // print_r($product_id);

        //$request->session()->forget('cart');
       // $request->session()->flash('cart') ;


        $previousCart = $request->session()->get('cart');
        $cart = new Cart($previousCart);

        $product = Product::query()->findOrFail($product_id);
        $cart->addItem($product_id, $product );
        // create the session ( it stores the new object of the cart in the session
        $request->session()->put('cart', $cart);
        // it shows the cart object (for debugging)
        // dump($cart);

       //return redirect()->route('kaffee&products');
        return response()->json(['totalQuantity',$cart->totalQuantity]);

    }

 public function increaseSingleProduct(Request $request,$product_id) {

        $previousCart = $request->session()->get('cart');
        $cart = new Cart($previousCart);

        $product = Product::query()->findOrFail($product_id);
        $cart->addItem($product_id, $product );
        $request->session()->put('cart', $cart);

     // dump($cart);
       return redirect()->route('shoppingcart');

    }

    public function decreaseSingleProduct(Request $request,$product_id) {

        $previousCart = $request->session()->get('cart');
        $cart = new Cart($previousCart);
        // becasue of the arrayKey undefined to catch
        if (array_key_exists($product_id, $cart->items)) {
            if ($cart->items[$product_id]['quantity'] > 1) {
                $product = Product::query()->findOrFail($product_id);
                $cart->items[$product_id]['quantity']--;
                $cart->items[$product_id]['totalSinglePrice'] = $cart->items[$product_id]['quantity'] * $product['price'];
                $cart->updatePriceAndQuantity();
                $request->session()->put('cart', $cart);
            } else if ($cart->items[$product_id]['quantity'] == 1) {

                // delete Item from an array
                unset($cart->items[$product_id]);

                $cart->updatePriceAndQuantity();
                $request->session()->put('cart', $cart);
            }
        }
        // dump($cart);
        return redirect()->route('shoppingcart');

    }




}
