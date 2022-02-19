<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Mail\OrderCreatedEmail;
use App\Models\Allergen;
use App\Models\Product;
use DateTime;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ItemNotFoundException;
use Illuminate\View\View;
use Throwable;


class ProductsController extends Controller
{
    /**
     * @return Renderable
     */
    public function index():View
    {
        try {
            $breadProducts = Product::with('Category')->where('products.category_id', '=', 1)->get();
            $pastries = Product::with('Category')->where('products.category_id', '=', 2)->get();
            $sweets = Product::with('Category')->where('products.category_id', '=', 3)->get();
            $drinks = Product::with('Category')->where('products.category_id', '=', 4)->get();
            $others = Product::with('Category')->where('products.category_id', '=', 5)->get();
            $allergens = DB::table('allergens')
                ->join('ingredients_allergens', 'allergens.allergen_id', 'ingredients_allergens.allergen_id')
                ->join('ingredients', 'ingredients_allergens.ingredient_id', 'ingredients.ingredient_id')
                ->join('products_ingredients', 'ingredients.ingredient_id', 'products_ingredients.ingredient_id')
                ->groupBy(['ingredients.name', 'allergens.type', 'allergens.describe_type', 'products_ingredients.product_id'])
                ->orderBy('ingredients.name')
                ->get(['ingredients.name', 'allergens.type', 'allergens.describe_type', 'products_ingredients.product_id'])
                ->toArray();/*
                     $allergens = Allergen::with('Ingredients_allergens')->with('ingredients_allergens.Ingredients')
                                 ->with('Products_ingredients')//->dd()
                         ->get( )
                         ->toArray();
                 *//*$allergens = Allergen::with('ingredients_allergens')->with('ingredients_allergens.ingredient')
                      ->with('products_ingredients.ingredient')//->dump()
                      ->select('*')->get()->toArray()
                      ;
                  */
            return view("kaffee&products",
                compact("breadProducts", "sweets", "pastries", "drinks", "others","allergens"));
        } catch (ItemNotFoundException $e) {
            abort(404);
        } catch (Throwable $e) {
            abort(500);
        }
    }


    public function addProductToCart(Request $request,$product_id) {
       // print_r($product_id);

        //$request->session()->forget('cart');
       // $request->session()->flash('cart') ;

        try {
            $previousCart = $request->session()->get('cart');
            $cart = new Cart($previousCart);
            $product = Product::query()->findOrFail($product_id);
            $cart->addItem($product_id, $product);// create the session ( it stores the new object of the cart in the session
            $request->session()->put('cart', $cart);// it shows the cart object (for debugging)
            // dump($cart);
            //return redirect()->route('kaffee&products');
            return response()->json(['cartAjax', $cart]);
        } catch (ItemNotFoundException $e) {
            abort(404);
        } catch (Throwable $e) {
            abort(500);
        }

    }

 public function increaseSingleProduct(Request $request,$product_id) {

     try {
         $previousCart = $request->session()->get('cart');
         $cart = new Cart($previousCart);
         $product = Product::query()->findOrFail($product_id);
         $cart->addItem($product_id, $product);
         $request->session()->put('cart', $cart);// dump($cart);
         return redirect()->route('shoppingcart');
     }catch (ItemNotFoundException $e) {
         abort(404);
     } catch (Throwable $e) {
         abort(500);
     }

 }

    public function decreaseSingleProduct(Request $request,$product_id) {

        try {
            $previousCart = $request->session()->get('cart');
            $cart = new Cart($previousCart);// becasue of the arrayKey undefined to catch
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
            }// dump($cart);
            return redirect()->route('shoppingcart');
        } catch (ItemNotFoundException $e) {
            abort(404);
        } catch (Throwable $e) {
            abort(500);
        }
    }

   public function createOrder(Request $request){
       $cart = Session::get('cart');//cart is not empty
      // dd($request);
       // dump($cart)
       $dateget = date('Y-m-d H:i:s');
       $delivery_date = date('Y-m-d'); // hardcoded
       $fullName = $request->input('fullName');
       $email = $request->input('email');
       $phoneNumber = $request->input('phone');
       $noteToRestaurant = $request->input('msg');

       $pickupOrDelivery = $request->input('orderoption'); // two values 'pickup' or 'delivery'

       $zip = $request->input('zip');
       $street = $request->input('street');
       $city = $request->input('city');
       $stairs_houseNr = $request->input('stairs_houseNr');
       if ($pickupOrDelivery === 'delivery') {
           $newOrderArray = array("status" => "on_hold", 'date_get' => $dateget,
               'delivery_date' => $delivery_date, "price" => $cart->totalPrice,
               'fullName' => $fullName, 'email' => $email, 'phoneNumber' => $phoneNumber,
               'noteToRestaurant' => $noteToRestaurant, 'zip' => $zip,
               'street' => $street, 'city' => $city, 'stairs_houseNr' => $stairs_houseNr,
               'is_delivery' => 1
           );
       }
       else {
           $newOrderArray = array("status" => "on_hold", 'date_get' => $dateget,
               'delivery_date' => $delivery_date, "price" => $cart->totalPrice,
               'fullName' => $fullName, 'email' => $email, 'phoneNumber' => $phoneNumber,
               'noteToRestaurant' => $noteToRestaurant, 'zip' => $zip,
               'street' => $street, 'city' => $city, 'stairs_houseNr' => $stairs_houseNr
           );
       }
       // dd($newOrderArray);

       // insert order into Order table
       $created_order = DB::table("orders")->insert($newOrderArray);
       // get the last inserted Id in Database
       $order_id = DB::getPdo()->lastInsertId();;
       //dd($cart);
       //dd($cart->items);
       foreach ($cart->items as $cart_item) {
           $product_id = $cart_item['data']['product_id'];
           $newItemsInCurrentOrder = array("order_id" => $order_id, "product_id" => $product_id);
           $created_order_products = DB::table("orders_products")->insert($newItemsInCurrentOrder);
       }
       // send the email with orders information
       // $user = Auth::user(); // get user
       //dd($user);
       Mail::to($email)->send(new OrderCreatedEmail($cart));
       //delete cart
       Session::forget("cart");
       //Session::flush(); // it removes every thing from the session and the user will be logged out
       //return redirect()->route("kaffee&products")->withsuccess("Ihre Bestellung wurde aufgenommen");

       if ( $pickupOrDelivery === 'pickup') {
           return redirect()->route("kaffee&products")->withsuccess("Ihre Bestellung wurde aufgenommen!!
            Wir willkommen Sie herzlich bei unserer Filiale");
       }
       else { // it is a deliver ,so there is a payment in advance
           $request->session()->put('payment_info' , $newOrderArray);
           return redirect()->route("ShowPaymentPage");
       }


   }


    public function checkoutProducts(){
        $cart = Session::get('cart');//cart is not empty
        if (!$cart) {
            $cart = new Cart($cart);
        }
        if ($cart->totalQuantity == 0) {
            return redirect()->route("shoppingcart")->with('emptyCart', 'Ihr Warenkorb ist leer!!');
        } else {
            return view('checkout');
        }
    }

    public function showWeeklyProducts() {
        $allergens = DB::table('allergens')
            ->join('ingredients_allergens', 'allergens.allergen_id', 'ingredients_allergens.allergen_id')
            ->join('ingredients', 'ingredients_allergens.ingredient_id', 'ingredients.ingredient_id')
            ->join('products_ingredients', 'ingredients.ingredient_id', 'products_ingredients.ingredient_id')
            ->groupBy(['ingredients.name', 'allergens.type', 'allergens.describe_type', 'products_ingredients.product_id'])
            ->orderBy('ingredients.name')
            ->get(['ingredients.name', 'allergens.type', 'allergens.describe_type', 'products_ingredients.product_id'])
            ->toArray();
        $weeklyProducts = DB::table('products')->where('is_weekly_menu', '=', 1)
        ->get()->toArray();
           // dd($weeklyProducts);
        return view('wochenkarte', compact('weeklyProducts','allergens'));

    }


}
