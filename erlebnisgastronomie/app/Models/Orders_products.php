<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Orders_products extends Model
{
    use HasFactory;

    protected $table = 'orders_products';
    protected $primaryKey ='id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [

    ];

    public function index() {
        // return view('allergens');
    }

    // orders_products n .. 1 product
    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id', 'product_id' );
    }

    // orders_products n .. 1 order
    public function order(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Order::class,'order_id', 'order_id' );
    }


}
