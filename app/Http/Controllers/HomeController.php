<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Validator, DB, Redirect;
use App\Models\Master\District;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        toastr()->success('Login Success');
        $districts = District::pluck('name', 'id');
        return view('users.homepage', compact('districts'));
    }


    public function adminHome() {
        return 'ADMIN';
    }
}
