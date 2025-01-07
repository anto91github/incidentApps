<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incident;

class IncidentController extends Controller
{
    //
    public function index(Request $request)
    {   
        // .eloquent / sql/ query/ model
        $incidentList = Incident::all();
        
        return view('incident/index', [
            'incidentList' => $incidentList
        ]);
    }
}
