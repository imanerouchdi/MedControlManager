<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class AppointmentAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function __construct()
    {
         $this->middleware('permission:appointment-list|consultation-create|consultation-edit|consultation-delete', ['only' => ['index','show']]);
         $this->middleware('permission:appointment-create', ['only' => ['create','store']]);
         $this->middleware('permission:appointment-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:appointment-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        
       
        if(request()->ajax()){
            
            $date=(!empty($_GET['dateRdv'])) ?($_GET['dateRdv']):('');
            $heure =(!empty($_GET['heureRdv'])) ?($_GET['heureRdv']):('');
            $events=Event::whereDate('dateRdv','=',$date)
            ->whereDate('heureRdv','=',$heure)
            ->get(['id','nom','prenom','cin','dateRdv','heureRdv']);
            return response()->json($events);
        }
        return view('AdminPanel.adminLayout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('RdvPanel.AppointmentAdmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        // forme
        $patient = Patient::where('cin', $request->cin)->first();
        
        if(!$patient){
            $patient = Patient::create([
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
        
        Alert::success('Success App', 'Success Message');

        return redirect()->route('appointmentAdmin.index',$appointment);
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        // return $id;
        
    }
    public function showAllAppointment(){

        $appointment=Appointment::all();
        
        return view('RdvPanel.index',compact('appointment'));
    }
    public function filterCIN(Request $request)
    {
        $output= "";
        $cinAppointments=Appointment::where('cin','like','%'.$request->filterCIN.'%')->get();
        
        foreach($cinAppointments as $cinAppointment){
            $output.=
            '
            <tr id='.$cinAppointment->id.'>
                <td>'.$cinAppointment->id.'</td
                <td>'.$cinAppointment->nom.'</td>
                <td>'.$cinAppointment->id.'</td>
                <td>'.$cinAppointment->cin.'</td>
                <td>'.$cinAppointment->dateRdv.'</td>
                <td>'.$cinAppointment->heureRdv.'</td>
                <td>
                <a href="javascript:void(0)" data-id='.$cinAppointment->id.' class="btn btn-warning delete-btn"> Delete</a>
                   </td>               
            </tr>';
        }
        return response($output); 
        
    }
    public function delete(Request $request){
        $appointment=Appointment::findOrFail($request->id)->delete();
        dd($appointment);
    
        return response()->json([
            'status'=>'success',
        ]);
    }
}
