<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergen extends Model
{
    use HasFactory;

    protected $table = 'allergens';
    protected $primaryKey = 'allergen_id';
    public $timestamps = false; // so, we don't need created_at and updated_at columns

    protected $fillable = [
        'type', 'describe_type'
    ];

    public function index() {
        // return view('allergens');
    }

    // Allergen 1..n ingredient_allergen
    public function ingredients_allergens()
    {
       return $this->hasMany(Ingredients_allergen::class, 'allergen_id','allergen_id');
    }
}
