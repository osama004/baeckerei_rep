<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\ItemNotFoundException;
use Throwable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', (array)'verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            return view('home');
        }catch (ItemNotFoundException $e) {
            abort(404);
        } catch (Throwable $e) {
            abort(500);
        }
    }

    public function indexLogin()
    {
        try {
            return view('userprofile');
        } catch (ItemNotFoundException $e) {
            abort(404);
        } catch (Throwable $e) {
            abort(500);
        }
    }
}
