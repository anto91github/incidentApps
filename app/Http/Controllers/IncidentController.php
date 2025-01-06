<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncidentController extends Controller
{
    //
    public function index(Request $request)
    {   
        // .eloquent / sql/ query/ model
        return view('incident/index');
    }
}
