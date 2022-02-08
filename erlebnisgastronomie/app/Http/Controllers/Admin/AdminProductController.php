<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    // display all products
    public function index() {
        // paginate show 5 products pro page
        $products = DB::table('products')->paginate(5);
        return view('admin.displayProducts', ['products' => $products]);
    }
}
