<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use mysql_xdevapi\Table;

class ProductsController extends Controller
{
    public function index():View
    {
        $products = Product::all();
      return view("kaffee&products", compact("products"));
    }
}
