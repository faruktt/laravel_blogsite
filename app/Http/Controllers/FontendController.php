<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FontendController extends Controller
{
    function profile_edit(){
        return view('profile_edit');
    }
}
