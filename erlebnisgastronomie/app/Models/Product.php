<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table ='products';

    protected $fillable = [
        "product_id", "name" , "price" , "description" ,"image"
    ];

    public function getPriceAttribute($price) {
        return $price . " €";
    }
}
