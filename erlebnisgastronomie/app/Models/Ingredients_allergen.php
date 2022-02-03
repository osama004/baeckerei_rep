<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredients_allergen extends Model
{
    use HasFactory;

    protected $table = 'ingredients_allergens';
    protected $primaryKey = ['ingredient_id', 'allergen_id'];
    public $incrementing = false;
    public $timestamps = false; // so, we don't need created_at and updated_at columns

    protected $fillable = [

    ];

    public function index() {
        // return view('allergens');
    }
}
