<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentUserRequest;
use App\Models\Appointment;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Models\BussinessHour;
use App\Http\Requests\ReserveRequest;

use App\Models\Patient;

use Carbon\Carbon;
use Illuminate\Support\Arr;

class AppointmentUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:appointment-list|appointment-create|appointment-edit|appointment-delete', ['only' => ['index','show']]);
        // $this->middleware('permission:appointment-create', ['only' => ['create','store']]);
        // $this->middleware('permission:appointment-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:appointment-delete', ['only' => ['destroy']]);
   }
    public function index(Request $request)
    {

        $data = [];

        // get date 
        $datePeriod = CarbonPeriod::create(now(), now()->addMonth());
       

        foreach ($datePeriod as $date) {
            // get name of date
            $dayName = $date->format('l');
            /*
                     "id" => 6
                    "day" => "Saturday"
                    "from" => "09:00:00"
                    "to" => "17:00:00"
                    "step" => 30
                    "off" => 0
                    "created_at" => "2023-04-28 22:19:47"
                    "updated_at" => "2023-04-28 22:19:47"
            */
            // le jour courant Monday 1-05-2023
            $bussinessHours = BussinessHour::where('day', $dayName)->first();
            // les rendez-vous valable 
            /*
                2 => "10:00"
                3 => "10:30"
                4 => "11:00"
                5 => "11:30"
                6 => "12:00"
                7 => "12:30"
                8 => "13:00"
                9 => "13:30"
                10 => "14:00"
                11 => "14:30"
                12 => "15:00"
                13 => "15:30"
                14 => "16:00"
                15 => "16:30"
                16 => "17:00"
                ]
                il supprimer l'heure passe & les bussinessHous reservee

            */
            $dayOff = array_filter($bussinessHours->TimesPeriod); /* -->  available appointment */
            // A TimesPeriod : is a specific length of time that is used to measure or represent a duration. 
            
           
            // appointment not available
            $currentAppointments = Appointment::where('dateRdv', $date->toDateString())
                ->pluck('heureRdv')
                ->map(function ($time) {
                    return $time->format('H:i');
                })->toArray();
            $availbleHours = array_diff($dayOff, $currentAppointments);
            dd($currentAppointments);

            $data[] = [
                'day_name' => $dayName,
                'date' => $date->format('d'),
                'month' => $date->format('M'),
                'full_date' => $date->format('Y-m-d'),
                'available_hours' => $availbleHours,
                'off' => $bussinessHours->off,
            ];
        }

        $page = request()->get('page', 1);
        $perPage = 7;

        $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            array_slice($data, ($page - 1) * $perPage, $perPage),
            count($data),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        return view("RdvPanel.reserve", compact('paginator'));
    }

    public function availableHours($date)
    {
        $dayName = date('l', strtotime($date));
        if ($dayName == 'Sunday') {
            return response()->json([
                'data' => ''
            ]);
        }
        $bussinessHours = BussinessHour::where('day', $dayName)->first();

        $dayOff = array_filter($bussinessHours->TimesPeriod);

        $currentAppointments = Appointment::where('dateRdv', $date)
            ->pluck('heureRdv')
            ->map(function ($time) {
                return $time->format('H:i');
            })->toArray();

        $availbleHours = array_diff($dayOff, $currentAppointments);
        return response()->json([
            'data' => $availbleHours
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appointmentUser = $request->merge(['user_id' => auth()->id()])->toArray();

        $patients_id = Patient::where('user_id', Auth()->user()->id)->first();

        $patient = Patient::where('cin', $request->cin)->first();
        if (!$patient) {
            $patient = Patient::create([
                'nomPatient' => $request->input('nom'),
                'prenomPatient' => $request->input('prenom'),
                'cin' => $request->input('cin'),
                'user_id' => $appointmentUser['user_id'],
            ]);

        }
        // appointment
        $appointment = Appointment::create([
            'patient_id' => $patient->id,
            'dateRdv' => $request->input('date'),
            'heureRdv' => $request->input('time'),
            'nom' => $patient->nomPatient,
            'prenom' => $patient->prenomPatient,
            'cin' => $request->input('cin'),

        ]);
            return redirect()->route('ConfirmAppointment')->with('status', 'Votre RDV 
                    est bien reçu et en attente de confirmation de la part du praticien.
                    Vous recevrez un Appel dans les plus brefs délais');
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
        //
    }
    public function ConfirmAppointment()
    {

        $patients = Patient::where('user_id', Auth()->user()->id)->first();
        $appointments = Appointment::join('patients', 'appointments.patient_id', '=', 'patients.id')
            ->join('users', 'patients.user_id', '=', 'users.id')
            ->where('users.id', '=', Auth()->user()->id)
            ->get();

        return view('RdvPanel.ConfirmAppointment', compact('appointments'));
    }
}
