<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
    use HasFactory;
    protected $table = 'sub_categories';
    protected $primaryKey ='sub_category_id';
    public $incrementing = true;
    public $timestamps = false;

    // sub_categoies 1..n products
    public function products()
    {
       return $this->hasMany(Product::class, 'sub_category_id', 'sub_category_id') ;
    }

    // sub_categoies n..1 categories
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }


    protected $fillable = [
        'title_sub', 'category_id'
    ];
}
