<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shopping_cart extends Model
{
    use HasFactory;

    protected $table = 'shopping_carts';
    protected $primaryKey = ['product_id', 'order_id'];
    public $incrementing = false;
    public $timestamps = false; // so, we don't need created_at and updated_at columns

    protected $fillable = [
        'quantity'
    ];


}
