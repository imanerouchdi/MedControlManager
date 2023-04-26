<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentUserRequest;
use App\Models\Appointment;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Models\BussinessHour;
use App\Models\BussinessDay;
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
    public function index(Request $request)
    {
        $data = [];

        // $pickdate = now();
        
        // get date 
        $datePeriod=CarbonPeriod::create(now(),now()->addMonth());
        // $dateArray = iterator_to_array($datePeriod);
        // $dateCollection = collect($dateArray);
        // $var=$dateCollection->paginate(7);
        // dd($var);
        // dd($var);
        // $time = now()->dayOfWeek();

        
        foreach($datePeriod as $date){
             $dayName = $date->format('l');
            $bussinessHours=BussinessHour::where('day',$dayName)->first();
            // ne pas afficher les heures qui on pas court avec temp actuel

            $dayOff = array_filter($bussinessHours->TimesPeriod) ;

            $currentAppointments =BussinessDay::where('date',$date->toDateString())
            ->pluck('time')
            ->map(function($time){
                return $time->format('H:i');
            })->toArray();
        // dd($currentAppointments);

            
            /* Appointment reserve */
            $availbleHours=array_diff($dayOff,$currentAppointments);
            // dd($availbleHours);
            //affichage date
            
            $data[] = [
                'day_name'=>$dayName,
                'date'=>$date->format('d'),
                'month'=>$date->format('M'),
                'full_date'=>$date->format('Y-m-d'),
                'available_hours'=>$availbleHours,
                'off'=>$bussinessHours->off,
            ];  
        }
        $page = request()->get('page', 1);
        $perPage = 7;
        // dd( count($data));
        $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            array_slice($data, ($page - 1) * $perPage, $perPage),
            count($data),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        
        // if ($request->ajax()) {
        //     // If the request is an Ajax request, return the data as JSON
        //     return response()->json(['paginator' => $paginator->toArray()]);
        // } else {
        //     // Otherwise, return the view with the paginated data
        //     return view('RdvPanel.reserve', ['paginator' => $paginator]);
        // }
        
        return view("RdvPanel.reserve",compact('paginator'));
    }

    public function availableHours($date){
        $dayName = date('l', strtotime($date));
            if($dayName == 'Sunday'){
                return response()->json([
                    'data'=> ''
                ]);
            }
                $bussinessHours=BussinessHour::where('day',$dayName)->first();
                // ne pas afficher les heures qui on pas court avec temp actuel

                $dayOff = array_filter($bussinessHours->TimesPeriod) ;

                $currentAppointments =BussinessDay::where('date',$date)
                ->pluck('time')
                ->map(function($time){
                    return $time->format('H:i');
                })->toArray();

            $availbleHours=array_diff($dayOff,$currentAppointments);
            return response()->json([
                'data'=>$availbleHours
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
    public function store(AppointmentUserRequest $request)
    {
        
        $appointmentUser = $request->merge(['user_id'=>auth()->id()])->toArray();
       
         
         $businessDay = BussinessDay::create($appointmentUser);
        //   dd($businessDay->id);


        $patient = Patient::where('cin', $request->cin)->first();
        if(!$patient){
            $patient = Patient::create([
                'nomPatient' => $request->input('nom'),
                'prenomPatient' => $request->input('prenom'),
                'cin' => $request->input('cin'),
            ]);
        }
       
       // appointment
       $appointment = Appointment::create([
        'patient_id' => $patient->id,
        'bussiness_days_id' => $businessDay->id,
        'dateRdv' => $request->input('date'),
        'heureRdv' => $request->input('time'),
        'nom' => $request->input('nom'),
        'prenom' => $request->input('prenom'),
        'cin' => $request->input('cin'),
        
    ]);
    return 'good';



































        
        
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
