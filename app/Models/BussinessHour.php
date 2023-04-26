<?php

namespace App\Models;

use Carbon\CarbonInterval;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BussinessHour extends Model
{
    use HasFactory;

    protected $guarded=[];
    
    public function getTimesPeriodAttribute(){

        // before aplic seeder
        // All Appointment (from :9->17)
        $times = CarbonInterval::minutes($this->step)->toPeriod($this->from,$this->to)->toArray();
        
        // get the time equal with the current time not prevent/disabled last appointment
        return  array_map (function ($time){
            if ($this->day == today()->format('l') && !$time->isPast()) {
                return $time->format('H:i');
            }
            if ($this->day != today()->format('l')) {
                return $time->format('H:i');
            }
        },
        $times);

    }
}
