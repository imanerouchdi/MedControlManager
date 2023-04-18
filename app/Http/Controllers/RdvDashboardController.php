<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;

use Illuminate\Http\Request;

class RdvDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('RdvPanel.allAppointment');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('RdvPanel.calendar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $patient = Patient::create([
            'nomPatient' => $request->input('nom'),
            'prenomPatient' => $request->input('prenom'),
            'cin' => $request->input('cin'),
        ]);
        $patientLast= Patient::orderBy('created_at','DESC')->first();
        

        $appointment = Appointment::create([
            'patient_id' => $patientLast->id,
            'dateRdv' => $request->input('dateRdv'),
            'heureRdv' => $request->input('heureRdv'),
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'cin' => $request->input('cin'),

        ]);
    
        // Redirect to a success page or a page that displays the newly created data.
    
        // $patient ;
        // $appointment =appointment::create($request->all());
            
        // dd($appointment) ;
        return redirect()->route('appointment.index',$appointment)
                        ->with('success','Rdv created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
