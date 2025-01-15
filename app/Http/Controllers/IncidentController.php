<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incident;
use Carbon\Carbon;

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

    public function create()
    {
        return view('incident.create');
    }


    public function add(Request $request)
    {
        
        $request->validate([
            'dateof' => 'required|date',
             'datereport' => 'required|date',
             'datesolved' => 'required|date',
             'datehandling'=> 'required|date',
             'statusproven'=> 'nullable|date',
             
        ]);
        // $eventDate= strtotime($request->input('dateof'));
        
        $eventDateString = $request->input('dateof');
        $db_incident_date = Carbon::createFromFormat('Y-m-d\TH:i', $eventDateString)->format('Y-m-d H:i:s');
  
        $createDate = $request->input('datereport');
        $db_create_date = Carbon::createFromFormat('Y-m-d\TH:i', $createDate)->format('Y-m-d H:i:s');
  
        $incident_finish_date = $request->input('datesolved');
        $db_incident_finish_date = Carbon::createFromFormat('Y-m-d\TH:i', $incident_finish_date)->format('Y-m-d H:i:s');
  
        $incidentHandling = $request->input('datehandling');
        $db_handling_date = Carbon::createFromFormat('Y-m-d\TH:i', $incidentHandling)->format('Y-m-d H:i:s');
  
        $approved_date = $request->input('statusproven');
        $db_approved = Carbon::createFromFormat('Y-m-d\TH:i', $approved_date)->format('Y-m-d H:i:s');
  
  
        // var_dump($eventDate,$incidentDate,$createdDate,$finishDate,$handlerDate,);
        // exit();
       
       Incident::create([
        'incident_name' => $request['subject'],
        'division'=> $request['division'],
        'description'=> $request['Incidentdesc'],
        'notes'=> $request['note'],
        'report_by'=> $request['name'],
        'incident_date' => $db_incident_date,
        'user_pic' => $request['categoryreport'],
        'created_date'=> $db_create_date,
        'created_by' => $request['categoryreport'],
        'cause_incident' => $request['Incidentcause'],
        'solution' => $request['Incidentsolve'],
        'incident_finish_date' => $db_incident_finish_date,
        'incident_handler_date' => $db_handling_date,
        'approve_by' => '1',
        'approve_date' => $db_approved,
        'solved_by' => $request['category'],
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
        return view('incident.show', [
            'data' => $incident
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
        return view('incident.edit', [
            'data' => $incident
        ]);
    }

    /**
     * Update user data
     *
     * @param Incident $incident
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incident $incident)
    {
        $incident->update($request->all());
        return redirect()->route('incident.index')
            ->withSuccess(__('Incident updated successfully.'));
    }
}
