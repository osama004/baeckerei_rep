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
    protected $with = ['allergen', 'ingredient'];
    protected $fillable = [

    ];

    public function index() {
        // return view('allergens');
    }

    // ingredients_allergens n .. 1 Allergen
    public function allergen(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Allergen::class,'allergen_id', 'allergen_id' );
    }
    // ingredients_allergens n .. 1 Ingredient
    public function ingredient(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Ingredient::class,'allergen_id', 'allergen_id' );
    }
}
