<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UsersController extends Controller
{
    //
    public function index()
    {
      /*  $users =

                [0=> ["email" => "IbroMail@test.at", "created at" => "01.01.2021"],
                1=> ["email" => "BennyMail@test.at", "created at" => "04.11.2021"],
                2=> ["email" => "DanyloMail@test.at", "created at" => "02.02.2021"],
                3=> ["email" => "OsamaMail@test.at", "created at" => "03.03.2021"]];

      hardcode statt dynamisch, irrelevant
        */
        $users = DB::table('users')->get();
        return view("users", compact ("users"));
    }
}
