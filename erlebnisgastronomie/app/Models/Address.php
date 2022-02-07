<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table ='addresses';
    protected $primaryKey = 'address_id';
    public $timestamps = false; // so, we don't need created_at and updated_at columns

    protected $fillable = [
        'postcode',
        'steet_haus_nr',
        'stairway_nr',
        'apartment_nr',
        'city'
    ];



}
