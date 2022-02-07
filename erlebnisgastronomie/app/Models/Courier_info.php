<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier_info extends Model
{
    use HasFactory;

    protected $table = 'courier_infos';
    protected $primaryKey = 'courier_id';
    public $timestamps = false; // so, we don't need created_at and updated_at columns

    protected $fillable = [
        'firstname', 'lastname', 'phone_number', 'delivery_type'
    ];

    public function index() {
        // return view('allergens');
    }
}
