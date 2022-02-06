<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllergenController extends Controller
{
/*
    public function index() {
        $allergen = DB::table('allergens')
            ->join('ingredients_allergens', 'allergens.allergen_id', 'ingredients_allergens.allergen_id')
            ->join('ingredients', 'ingredients_allergens.ingredient_id', 'ingredients.ingredient_id')
            ->join('products_ingredients', 'ingredients.ingredient_id', 'products_ingredients.ingredient_id')
            ->get('allergens.type', 'allergens.describe_type') ->toArray();

        return View('kaffee&products', compact($allergen));
    }
*/
}
