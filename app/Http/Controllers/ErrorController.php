<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function unauthorizedAccess() {
        return view('unauthorized_access');
    }
}
