<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incident;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use PDF;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class IncidentController extends Controller
{


    //
    public function index(Request $request)
    {
        // .eloquent / sql/ query/ model
        $incidentList = Incident::with('user')->get();

        // dd($incidentList);
        return view('incident/index', [
            'incidentList' => $incidentList
        ]);
    }

    public function generatePdf($id)
    {
        // Fetch data from the database
        $incident = Incident::with(['user', 'pic', 'solved'])->find($id); // Fetch data with user relation

        // Check if data exists
        if (!$incident) {
            return abort(404); // Handle not found
        }

        // Kirim data ke view PDF
        $pdf = PDF::loadView('pdf.pdf', [
            'data' => $incident,
            'name' => $incident->user ? $incident->user->name : 'Unknown User',
            'pic' => $incident->pic ? $incident->pic->name : 'Unknown User',
            'solved' => $incident->solved ? $incident->solved->name : 'Unknown User',// Kirim nama pengguna ke view
        ]);

        $dateTime = now()->format('Ymd_His');

        // Download the generated PDF
        return $pdf->download('incident_' . now('Asia/Jakarta')->format('Ymd_His') . '.pdf');
    }


    public function create()
    {
        $users = User::all();
        return view('incident.create', compact('users'));
    }


    public function add(Request $request)
    {

        $userID = Auth::id();

        // $request->validate([
        //     'dateof' => 'required|date',
        //     'datereport' => 'required|date',
        //     'datesolved' => 'required|date',
        //     'datehandling' => 'required|date',
        //     'statusproven' => 'nullable|date',

        // ]);
        // $eventDate= strtotime($request->input('dateof'));

        $eventDateString = $request->input('incident_date');
        $db_incident_date = Carbon::createFromFormat('Y-m-d\TH:i', $eventDateString)->format('Y-m-d H:i:s');

        $incident_finish_date = $request->input('incident_finish_date');
        $db_incident_finish_date = Carbon::createFromFormat('Y-m-d\TH:i', $incident_finish_date)->format('Y-m-d H:i:s');

        $incidentHandling = $request->input('incident_handler_date');
        $db_handling_date = Carbon::createFromFormat('Y-m-d\TH:i', $incidentHandling)->format('Y-m-d H:i:s');

        $approved_date = $request->input('approve_date');
        $db_approved = Carbon::createFromFormat('Y-m-d\TH:i', $approved_date)->format('Y-m-d H:i:s');


        // var_dump($eventDate,$incidentDate,$createdDate,$finishDate,$handlerDate,);
        // exit();
        if (auth()->user()->name !== 'Rudi Cendra' && $request->status === 'APPROVED') {
            return redirect()->back()->withErrors(['status' => 'Only Head of IT can set the status to APPROVED.']);
        }
        Incident::create([
            'incident_name' => $request['incident_name'],
            'division' => $request['division'],
            'description' => $request['description'],
            'notes' => $request['notes'],
            'report_by' => $request['report_by'],
            'incident_date' => $db_incident_date,
            'user_pic' => $request['user_pic'],
            'created_by' => $userID,
            'cause_incident' => $request['cause_incident'],
            'solution' => $request['solution'],
            'incident_finish_date' => $db_incident_finish_date,
            'incident_handler_date' => $db_handling_date,
            'approve_by' => '99',
            'approve_date' => $db_approved,
            'solved_by' => $request['solved_by'],
            'status' => $request['status'],
        ]);

        return redirect()->route('incident.index')->with('success', 'Incident created successfully!');
    }

    /**
     * Delete user data
     *
     * @param Incident $incident
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incident $incident)
    {
        $incident->delete();

        return redirect()->route('incident.index')
            ->withSuccess(__('Incident deleted successfully.'));
    }

    /**
     * Show user data
     *
     * @param Incident $incident
     *
     * @return \Illuminate\Http\Response
     */

    public function show(Incident $incident)
    {
        $incident->load(['user', 'pic', 'solved']);
        return view('incident.show', [
            'data' => $incident,
            'pic' => $incident->pic ? $incident->pic->name : 'Unknown User',
            'solved' => $incident->solved ? $incident->solved->name : 'Unknown User',
        ]);
    }

    /**
     * Edit user data
     *
     * @param Incident $incident
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Incident $incident)
    {
        $users = User::all();
        return view('incident.edit', [
            'data' => $incident,
            'users' => $users
        ]);
    }


    public function update(Request $request, $id)
    {

        $userID = Auth::id();
        // Validasi format tanggal
        $validator = Validator::make($request->all(), [
            'incident_date' => 'nullable',
            'incident_finish_date' => 'nullable',
            'incident_handler_date' => 'nullable',
            'approve_date' => 'nullable',
        ]);

        // dd($request->incident_date); // 2025-01-13T10:30
        if ($validator->fails()) {
            return redirect()->route('incident.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        // Parsing dan update data jika valid
        if ($request->has('incident_date') && !empty($request->input('incident_date'))) {
            $request->incident_date = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('incident_date'))->format('Y-m-d H:i:s');
        }

        if ($request->has('incident_finish_date') && !empty($request->input('incident_finish_date'))) {
            $request->incident_finish_date = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('incident_finish_date'))->format('Y-m-d H:i:s');
            ;
        }

        if ($request->has('incident_handler_date') && !empty($request->input('incident_handler_date'))) {
            $request->incident_handler_date = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('incident_handler_date'))->format('Y-m-d H:i:s');
            ;
        }

        if ($request->has('approve_date') && !empty($request->input('approve_date'))) {
            $request->approve_date = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('approve_date'));
        }

        if (auth()->user()->name !== 'Rudi Cendra' && $request->status === 'APPROVED') {
            return redirect()->back()->withErrors(['status' => 'Only Head of IT can set the status to APPROVED.']);
        }

        $request = Incident::findOrFail($id)->update([
            'incident_name' => $request['incident_name'],
            'division' => $request['division'],
            'description' => $request['description'],
            'notes' => $request['notes'],
            'report_by' => $request['report_by'],
            'incident_date' => $request->incident_date,
            'user_pic' => $request['user_pic'],
            'cause_incident' => $request['cause_incident'],
            'solution' => $request['solution'],
            'incident_finish_date' => $request->incident_finish_date,
            'incident_handler_date' => $request->incident_handler_date,
            'approve_by' => '99',
            'approve_date' => $request->approve_date,
            'solved_by' => $request['solved_by'],
            'status' => $request['status'],
        ]);
        // Update data

        return redirect()->route('incident.index')
            ->withSuccess(__('Incident updated successfully.'));
    }
}
