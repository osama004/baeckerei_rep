<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;


    protected $table ='products'; // The table associated with the model.
    protected $primaryKey = 'product_id';
    public $timestamps = false; // so, we don't need created_at and updated_at columns
    protected $with = ['category', 'products_ingredients'];

    protected $fillable = [
        "bezeichnung" , "price" , "description" , "is_weekly_menu"
    ];



    public function index()
    {
        //
    }
    // categories 1..n products
    // products  1..n shopping_carts
    // products 1..n products_ingrdients
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products_ingredients()
    {
        return $this->hasMany(Product_ingredient::class, 'product_id', 'product_id');
    }

    public function orders_products()
    {
        return $this->hasMany(Orders_products::class, 'product_id', 'product_id');
    }


    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::deleting(function ($product) {
           $product->products_ingredients()->delete();
           $product->orders_products()->delete();
        });
    }

}
