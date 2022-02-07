<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class addressController extends Controller
{
    //
    public function create(array $data)
    {
        return Address::create([
            'street_haus_nr' => $data['street_haus_nr'],
            'stairway_nr' => $data['stairway_nr'],
            'apartment_nr' => $data ['apartment_nr'],
            'postcode' => $data['postcode'],
            'city' => $data['city'],
        ]);
    }
}
