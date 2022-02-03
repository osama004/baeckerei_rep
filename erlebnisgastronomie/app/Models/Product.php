<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $table ='products'; // The table associated with the model.
    protected $primaryKey = 'product_id';
    public $timestamps = false; // so, we don't need created_at and updated_at columns

    protected $fillable = [
        "bezeichnung" , "price" , "description"
    ];

    public function getPriceAttribute($price) {
        return $price . " €";
    }

    public function index()
    {
        //
    }
}
