<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentUserRequest;
use App\Models\Appointment;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Models\BussinessHour;
use App\Models\BussinessDay;
use Carbon\Carbon;

class AppointmentUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        
        // get date 
        $datePeriod=CarbonPeriod::create(now(),now()->addDays(6));
        // dd($datePeriod);
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
        
        return view("RdvPanel.reserve",compact('data'));
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
        // dd($request->validated());
        $appointmentUser = $request->merge(['user_id'=>auth()->id()])->toArray();
        // dd($appointmentUser);
         BussinessDay::create($appointmentUser);
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
