<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;

    protected $table ='addresses';

    protected $fillable = [
        'postcode',
        'steet_haus_nr',
        'stairway_nr',
        'apartment_nr',
        'city'
    ];


}
