<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    // display all products
    public function index() {
        $products = Product::all();
        return view('admin.displayProducts', ['products' => $products]);
    }
}
