<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ItemNotFoundException;
use Throwable;

class CustomersController extends Controller
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
        try {
            $customers = DB::table('customers')->get();
            return view("customers", compact("customers"));
        } catch (ItemNotFoundException $e) {
            abort(404);
        } catch (Throwable $e) {
            abort(500);
        }
    }
}
