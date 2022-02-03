<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;


    protected $table = 'images';
    protected $primaryKey = 'image_id';
    public $timestamps = false; // so, we don't need created_at and updated_at columns

    protected $fillable = [
        'name'
    ];

    public function index() {
        // return view('allergens');
    }
}
