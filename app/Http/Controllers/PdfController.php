<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    //
    public function generatePdf()
    {
        // Fetch data from the database
        $incident = Incident::all(); // Fetch all users

        // Pass data to the view
        $pdf = PDF::loadView('pdf.pdf', compact('incident.pdf'));

        // Download the generated PDF
        return $pdf->download('incident.pdf');
    }
}
