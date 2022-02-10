<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_ingredient extends Model
{
    use HasFactory;

    protected $table = 'products_ingredients';
    protected $primaryKey = ['ingredient_id', 'product_id'];
    public $incrementing = false;
    public $timestamps = false; // so, we don't need created_at and updated_at columns

    protected $fillable = [
        'quantity' , 'unit_of_measure'
    ];

    public function index() {
        //
    }

    // ingredients 1..n products_ingredients
    //  products 1..n   products_ingredients

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }




}
