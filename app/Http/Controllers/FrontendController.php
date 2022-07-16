<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;

class FrontendController extends Controller
{
    public function home() {
        if(auth()->user()) return Redirect::route('home');
        return view('layouts.frontend.home');
    }
}
