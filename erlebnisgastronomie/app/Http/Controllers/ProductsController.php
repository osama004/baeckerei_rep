<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use mysql_xdevapi\Table;

class ProductsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index():View
    {
        $sandwiches = Product::all()
            ->where('kategorie', '=', 1)
            ->firstOrFail();

        $products = Product::all();
      return view("kaffee&products", compact("products"));



    }

}
