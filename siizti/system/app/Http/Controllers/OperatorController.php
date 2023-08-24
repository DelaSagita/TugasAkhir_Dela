<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperatorController extends Controller
{
    function beranda(){
        return view('operator.beranda');
    }
}
