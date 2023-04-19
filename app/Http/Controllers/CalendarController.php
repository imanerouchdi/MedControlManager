<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\appointment;
use App\Models\Patient;
use Carbon\Carbon;



class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
   

    public function index()
    {
        $events=array();
        $allAppointment=appointment::all();
        foreach ( $allAppointment as $appointment){
            $events[]=[
                'title'=>$appointment->nom,
                'start'=>$appointment->dateRdv,
                'end'=>$appointment->heureRdv,

            ] ;
        }
        
        return view ('RdvPanel.allAppointment',['events'=>$events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patient = Patient::where('cin', $request->cin)->first();
        
        if(!$patient){
            // $request->validate([
            //     'nom'=>'required|string',
            // ]);

            Patient::create([
                'nomPatient' => $request->input('nom'),
                'prenomPatient' => $request->input('prenom'),
                'cin' => $request->input('cin'),
            ]);
        }

        $appointment = appointment::where('dateRdv', $request->dateRdv)->where('heureRdv', $request->heureRdv)->first();

        if($appointment){
            return 'deja resrve';
        }

        $appointment = Appointment::create([
            'patient_id' => $patient->id,
            'dateRdv' => $request->input('dateRdv'),
            'heureRdv' => $request->input('heureRdv'),
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'cin' => $request->input('cin'),

        ]);


        return 'save';
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
