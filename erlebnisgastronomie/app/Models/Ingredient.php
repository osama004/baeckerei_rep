<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $table = 'ingredients';
    protected $primaryKey = 'ingredient_id';
    public $timestamps = false; // so, we don't need created_at and updated_at columns

    protected $fillable = [
        'name'
    ];

    public function index() {
        // return view('allergens');
    }
}
