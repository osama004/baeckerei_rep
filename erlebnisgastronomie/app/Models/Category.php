<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    public $timestamps = false; // so, we don't need created_at and updated_at columns

    protected $fillable = [
        'name'
    ];

    // Category 1 .. n Product
    public function products() {
        $this->hasMany(Product::class);
    }



}
