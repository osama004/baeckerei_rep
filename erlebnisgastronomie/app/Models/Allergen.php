<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergen extends Model
{
    use HasFactory;

    protected $table = 'allergens';
    protected $primaryKey = 'allergen_id';
    public $timestamps = false; // so, we don't need created_at and updated_at columns

    protected $fillable = [
        'type', 'describe_type'
    ];

    public function index() {
        // return view('allergens');
    }
}
