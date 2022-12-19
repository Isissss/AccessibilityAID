<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class StatController extends Controller
{
    public function show()
    {
        return view('stats');
    }
}
