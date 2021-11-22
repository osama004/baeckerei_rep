<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class RegionalProductsController extends Controller
{
    public function index():View
    {
        $products = Product::all();
        return View("regionaleprodukte" , compact("products"));
    }
}
