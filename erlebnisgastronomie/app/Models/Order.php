<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    public $timestamps = false; // so, we don't need created_at and updated_at columns

    protected $fillable = [

    ];

    public function index() {
        // return view('allergens');
    }
}
