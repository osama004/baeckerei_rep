<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delivery_list extends Model
{
    use HasFactory;

    protected $table = 'delivery_lists';
    protected $primaryKey = 'delivery_id';
    public $timestamps = false; // so, we don't need created_at and updated_at columns

    protected $fillable = [
        'date_arrived',// Question what is with date_arrived ?
        'payment_method',
        'is_taken',
        'is_closed',
    ];

    public function index() {
        // return view('allergens');
    }
}
