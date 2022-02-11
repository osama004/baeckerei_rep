<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class AdminProductController extends Controller
{
    // display all products
    public function index() {
        // paginate show 5 products pro page
        $products= Product::query()->paginate(5);
        return view('admin.displayProducts', ['products' => $products]);
    }

    //display create product form
    public function createProductForm(){
        return view("admin.createProductForm");
    }


    //store new product to database
    public function sendCreateProductForm(Request $request){

        $title =  $request->input('title');
        $description =  $request->input('description');
        $price = $request->input('price');
        $category = $request->input('category_id');
        if (str_contains($price, ',')) // check if price has komma
            $price = str_replace( ',', '.', $request->input('price'));
        $categorie_title =  $request->input('categorie');
        $categorie = DB::table('categories')->where(strtoupper('title'), '=', $categorie_title)
            ->get('category_id');

        echo ($categorie->get('category_id'));
        Validator::make($request->all(),['image'=>"required|file|image|mimes:jpg,png,jpeg|max:5000"])->validate();
        $ext =  $request->file("image")->getClientOriginalExtension();
        // remove spaces from the image name
        $stringImageReFormat = str_replace(" ","",$request->input('title'));

        $ingredients = $request->input('ingredients_id');
        $ingredientsarray = $request->all('ingredients_id');

        $imageName = $stringImageReFormat.".".$ext; //blackdress.jpg
        $imageEncoded = File::get($request->image);
        Storage::disk('local')->put($imageName, $imageEncoded);

        $newProductArray = array("title"=>$title, "description"=> $description,"image"=> $imageName,"price"=>$price,
            "category_id" => $category);

        $created = DB::table("products")->insert($newProductArray);

        foreach($request->all('ingredients_id') as $ingredient){
            $newProductId = Product::max('product_id');

        $newIngredientArray = array('ingredient_id'=>$ingredient, 'product_id'=>$newProductId, 'quantity'=> 220.00 , 'unit_of_measure' =>"gramm");
        DB::table("products_ingredients")->insert($newIngredientArray);
        }
        if($created){
            return redirect()->route("adminDisplayProducts");
        }else{
            // return view ( error View)
            return "Product was not Created";

        }

    }

    //display edit product form
    public function editProductForm($product_id){
        $product = Product::query()->find($product_id);
        return view('admin.editProductForm',['product'=>$product]);

    }

    //display edit product image form
    public function editProductImageForm($product_id){
        $product = Product::query()->find($product_id);
        return view('admin.editProductImageForm',['product'=>$product]);
    }

    //update product Image
    public function updateProductImage(Request $request,$product_id){
        // validate if it's an image file and set the maxUpload to 5MB, required if use klick submit without
        //uploading the picture
        Validator::make($request->all(),['image'=>"required|file|image|mimes:jpg,png,jpeg|max:5000"])->validate();
        // if an image is uploaded
        if($request->hasFile("image")){

            $product = Product::query()->find($product_id);
            //$exists = Storage::exists("images/".$product->image);
            $exists = Storage::disk('local')->exists($product->image);
            //$exists = Storage::disk('local')->exists("images/".$product->image);

            //delete old image
            if($exists){
                Storage::disk('local')->delete($product->image);
                //Storage::delete("images/".$product->image);
                echo 'exists !!!';
            }
            //upload new image , <input name = 'image'> is the key
            $ext = $request->file('image')->getClientOriginalExtension(); //jpg
            // $product->image get the same name as the old picture
            //$request->image->storeAs("images/",$product->image);
            $request->image->storeAs("",$product->image);
            $arrayToUpdate = array('image'=>$product->image);
            DB::table('products')->where('product_id',$product_id)->update($arrayToUpdate);
            return redirect()->route("adminDisplayProducts");

        }else{
            // the user did not choose an image
            $error = "NO Image was Selected";
            return $error;
        }
    }


    //update product fields (name,description....)
    public function updateProduct(Request $request,$product_id){

        $title =  $request->input('title');
        $description =  $request->input('description');
        $price = $request->input('price');
        $updateArray = array("title"=>$title, "description"=> $description,"price"=>$price);

        DB::table('products')->where('product_id',$product_id)->update($updateArray);

        return redirect()->route("adminDisplayProducts");

    }

//delete product
    public function deleteProduct($product_id){

        $product = Product::query()->find($product_id);

        $exists =  Storage::disk("local")->exists($product->image);

        //if old image exists

        if($exists){
            //delete it
            Storage::delete($product->image);
        }

        Product::destroy($product_id);

        //return redirect()->route("adminDisplayProducts");
        return Redirect::back()->with('message', 'product Deleted');
    }

    //orders control panel (display all orders)
    public function ordersPanel(){
        $orders = DB::table('orders')->paginate(10);
        //print_r($orders);
        return view('admin.ordersPanel', ["orders" => $orders]);
    }

    public function deleteOrder(Request $request, $product_id){

        $deleted =  DB::table('orders')->where("order_id",$product_id)->delete();

        if($deleted){
            return redirect()->back()->with('orderDeletionStatus', 'Order '.$product_id. ' was successfully deleted');
        }else{
            return redirect()->back()->with('orderDeletionStatus', 'Order '.$product_id. ' was NOT deleted');
        }
    }
    //display edit order form
    public function editOrderForm($order_id){
        $order =  DB::table('orders')->where("order_id",$order_id)->get();
        return view('admin.editOrderForm',['order'=>$order[0]]);
    }
//update order fields (status,date,....)
    public function updateOrder(Request $request,$order_id){

        $date =  $request->input('date');
        $del_date =  $request->input('del_date');
        $status = $request->input('status');
        $price = $request->input('price');

        $updateArray = array("date"=>$date, "del_date"=> $del_date,"status"=>$status,"price"=>$price);

        DB::table('orders')->where('order_id',$order_id)->update($updateArray);

        return redirect()->route("ordersPanel");

    }
}
