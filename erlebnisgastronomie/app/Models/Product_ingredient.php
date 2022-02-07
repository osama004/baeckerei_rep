<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_ingredient extends Model
{
    use HasFactory;

    protected $table = 'product_ingredients';
    protected $primaryKey = ['ingredient_id', 'product_id'];
    public $incrementing = false;
    public $timestamps = false; // so, we don't need created_at and updated_at columns

    protected $fillable = [
        'quantity' , 'unit_of_measure'
    ];

    public function index() {
        //
    }

}
