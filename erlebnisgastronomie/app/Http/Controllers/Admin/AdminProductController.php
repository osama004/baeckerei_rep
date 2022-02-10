<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        Validator::make($request->all(),['image'=>"required|file|image|mimes:jpg,png,jpeg|max:5000"])->validate();
        $ext =  $request->file("image")->getClientOriginalExtension();
        $stringImageReFormat = str_replace(" ","",$request->input('name'));

        $imageName = $stringImageReFormat.".".$ext; //blackdress.jpg
        $imageEncoded = File::get($request->image);
        Storage::disk('local')->put('public/product_images/'.$imageName, $imageEncoded);

        $newProductArray = array("title"=>$title, "description"=> $description,"image"=> $imageName,"price"=>$price);

        $created = DB::table("products")->insert($newProductArray);


        if($created){
            return redirect()->route("adminDisplayProducts");
        }else{
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
            $exists = Storage::disk('local')->exists("public/product_images/".$product->image);

            //delete old image
            if($exists){
                Storage::delete('public/product_images/'.$product->image);

            }
            //upload new image , <input name = 'image'> is the key
            $ext = $request->file('image')->getClientOriginalExtension(); //jpg
            // $product->image get the same name as the old picture
            $request->image->storeAs("public/product_images/",$product->image);
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

        $exists =  Storage::disk("local")->exists("public/product_images/".$product->image);

        //if old image exists
        if($exists){
            //delete it
            Storage::delete('public/product_images/'.$product->image);
        }

        Product::destroy($product_id);

        return redirect()->route("adminDisplayProducts");
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
