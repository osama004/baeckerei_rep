<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ItemNotFoundException;
use Illuminate\Validation\ValidationException;
use Throwable;

class AdminProductController extends Controller
{
    // display all products
    public function index()
    {
        // paginate show 5 products pro page
        try {
            $products = Product::query()->paginate(5);
            return view('admin.displayProducts', ['products' => $products]);
        } catch (ItemNotFoundException $e) {
            abort(404);
        } catch (Throwable $e) {
            abort(500);
        }

    }

    //display create product form
    public function createProductForm()
    {

        try {
            $categories = DB::table('categories')->orderBy('title')->get(['category_id', 'title'])->toArray();
            $ingredients = DB::table('ingredients')->orderBy('name')->get(['ingredient_id', 'name'])->toArray();
            return view("admin.createProductForm", ['ingredients' => $ingredients, 'categories' => $categories]);
        } catch (ItemNotFoundException $e) {
            abort(404);
        } catch (Throwable $e) {
            abort(500);
        }
    }

    //store new product to database
    public function sendCreateProductForm(Request $request)
    {

   //     try {
            $title = $request->input('title');
            $description = $request->input('description');
            $price = $request->input('price');
            $category = $request->input('category_id');
            $image = $request->file('image');
            $is_weekly_menu = $request->input('is_weekly_menu');
            echo ($is_weekly_menu);
            if (str_contains($price, ',')) // check if price has komma
                $price = str_replace(',', '.', $request->input('price'));
            Validator::make($request->all(), ['image' => "file|image|mimes:jpg,png,jpeg|max:5000"])->validate();
            if ($image) { // image ist hinzugefügt
                $ext = $request->file("image")->getClientOriginalExtension();// remove spaces from the image name
                $stringImageReFormat = str_replace(" ", "", $request->input('title'));
                $imageName = $stringImageReFormat . '_' . date('d-m-Y H.i.s ') . "." . $ext;//blackdress_12-02-2022 11.24.05.jpg
                $imageEncoded = File::get($request->image);
                Storage::disk('local')->put($imageName, $imageEncoded);
                $newProductArray = array("title" => $title, "description" => $description, "image" => $imageName, "price" => $price,
                    "category_id" => $category , 'is_weekly_menu' => $is_weekly_menu ) ;
            }
            else {
                $newProductArray = array("title" => $title, "description" => $description, "price" => $price,
                    "category_id" => $category , 'is_weekly_menu' => $is_weekly_menu ) ;
            }
            $created = DB::table("products")->insert($newProductArray);

            function store(Request $request)
            {
                $values = $request->input('ingredients_id');

                return $values;
            }

            $newProductId = Product::max('product_id');

            foreach (store($request) as $ingredient) {
                $newIngredientArray = array('ingredient_id' => $ingredient, 'product_id' => $newProductId, 'quantity' => 220.00, 'unit_of_measure' => "gramm");
                DB::table("products_ingredients")->insert($newIngredientArray);
            }

            if ($created) {
                return redirect()->route("adminDisplayProducts");
            } else {
                // return view ( error View)
                return "Product was not Created";
            }
   //     }
        /*catch (ItemNotFoundException $e) {
            abort(404);
        } catch (Throwable $e) {
            abort(500);
        }*/

    }

    //display edit product form
    public function editProductForm($product_id)
    {

        try {
            $product = Product::query()->find($product_id);
            $ingredients = DB::table('ingredients')->orderBy('name')->get(['ingredient_id', 'name'])->toArray();
            $categories = DB::table('categories')->orderBy('title')->get(['category_id', 'title'])->toArray();
            return view('admin.editProductForm', ['product' => $product, 'ingredients' => $ingredients, 'categories' => $categories]);
        } catch (ItemNotFoundException $e) {
            abort(404);
        } catch (Throwable $e) {
            abort(500);
        }

    }

    //display edit product image form
    public function editProductImageForm($product_id)
    {
        try {
            $product = Product::query()->find($product_id);
            return view('admin.editProductImageForm', ['product' => $product]);
        } catch (ItemNotFoundException $e) {
            abort(404);
        } catch (Throwable $e) {
            abort(500);
        }
    }

    //update product Image
    public function updateProductImage(Request $request, $product_id)
    {
        try {
            // validate if it's an image file and set the maxUpload to 5MB, required if use klick submit without
            //uploading the picture
            Validator::make($request->all(), ['image' => "required|file|image|mimes:jpg,png,jpeg|max:5000"])->validate();// if an image is uploaded
            if ($request->hasFile("image")) {

                $product = Product::query()->find($product_id);
                //$exists = Storage::exists("images/".$product->image);
                $exists = Storage::disk('local')->exists($product->image);
                //$exists = Storage::disk('local')->exists("images/".$product->image);

                //delete old image
                if ($exists) {
                    Storage::disk('local')->delete($product->image);
                    //Storage::delete("images/".$product->image);
                    echo 'exists !!!';
                }
                //upload new image , <input name = 'image'> is the key
                $ext = $request->file('image')->getClientOriginalExtension(); //jpg
                // $product->image get the same name as the old picture
                //$request->image->storeAs("images/",$product->image);
                $request->image->storeAs("", $product->image);
                $arrayToUpdate = array('image' => $product->image);
                DB::table('products')->where('product_id', $product_id)->update($arrayToUpdate);
                return redirect()->route("adminDisplayProducts");

            } else {
                // the user did not choose an image
                $error = "NO Image was Selected";
                return $error;
            }
        } catch (ItemNotFoundException $e) {
            abort(404);
        } catch (Throwable $e) {
            abort(500);
        }
    }


    //update product fields (name,description....)
    public function updateProduct(Request $request, $product_id)
    {

      //  try {
            $title = $request->input('title');
            $description = $request->input('description');
            $price = $request->input('price');
            if (str_contains($price, ',')) // check if price has komma
                $price = str_replace(',', '.', $request->input('price'));
            $is_weekly_menu = $request->input('is_weekly_menu');
            $updateArray = array("title" => $title, "description" => $description, "price" => $price ,
                "is_weekly_menu" => $is_weekly_menu == true ? 1 : 0);
           // dd($updateArray);
            DB::table('products')->where('product_id', $product_id)->update($updateArray);
            return redirect()->route("adminDisplayProducts");
       /* } catch (ItemNotFoundException $e) {
            abort(404);
        } catch (Throwable $e) {
            abort(500);
        }*/

    }

//delete product
    public function deleteProduct($product_id)
    {

            $product = Product::query()->find($product_id);
            $exists = Storage::disk("local")->exists($product->image);//if old image exists
            if ($exists) {
                //delete it
                Storage::delete($product->image);
            }
            Product::destroy($product_id);//return redirect()->route("adminDisplayProducts");
            return Redirect::back()->with('message', 'product Deleted');

    }

    //orders control panel (display all orders)
    public function ordersPanel()
    {
        try {
            $orders = DB::table('orders')->paginate(10);//print_r($orders);
            return view('admin.ordersPanel', ["orders" => $orders]);
        } catch (ItemNotFoundException $e) {
            abort(404);
        } catch (Throwable $e) {
            abort(500);
        }
    }

    public function deleteOrder(Request $request, $order_id)
    {

      //  try {
           $deleted =DB::table('orders')->where("order_id",$order_id)->delete();
            if ($deleted) {
                return redirect()->back()->with('orderDeletionStatusOK', 'Order ' . $order_id . ' erfolgreich gelöscht!!');
            } else {
                return redirect()->back()->with('orderDeletionStatusNotOk', 'Order ' . $order_id . ' nicht gelöscht');
            }
      /*  } catch (ItemNotFoundException $e) {
            abort(404);
        } catch (Throwable $e) {
            abort(500);
        }*/
    }

    //display edit order form
    public function editOrderForm($order_id)
    {
        try {
            $order = DB::table('orders')->where("order_id", $order_id)->get();
            return view('admin.editOrderForm', ['order' => $order[0]]);
        } catch (ItemNotFoundException $e) {
            abort(404);
        } catch (Throwable $e) {
            abort(500);
        }
    }

//update order fields (status,date,....)
    public function updateOrder(Request $request, $order_id)
    {

        try {
            $date_get = $request->input('date_get');
            $delivery_date = $request->input('delivery_date');
            $status = $request->input('status');
            $price = $request->input('price');
            $cusotmerName = $request->input('fullName');
            $updateArray = array("date_get" => $date_get, "delivery_date" => $delivery_date, "status" => $status,
                'fullName' => $cusotmerName,"price" => $price);
           // dd($updateArray);
            DB::table('orders')->where('order_id', $order_id)->update($updateArray);
            return redirect()->route("ordersPanel");
        } catch (ItemNotFoundException $e) {
            abort(404);
        } catch (Throwable $e) {
            abort(500);
        }

    }
}
