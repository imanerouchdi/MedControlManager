<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\BussinessHour;
use App\Models\BussinessDay;


class AppointmentUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function prepareForValidation(){
       $this->isValid();
    }
    
    public function rules()
    {
        return [
            'date'=>['required','date_format:Y-m-d'],
            'time'=>['required','date_format:H:i'],
        ];
    }

    private function isValid(){
        // dd($this->input('time'));
        $dayName = $this->date('date')->format('l');
        // check if day is interval day (input hidden)
        $bussinessHours  = BussinessHour::where('day',$dayName)->first()->TimesPeriod;
        if(!in_array($this->input('time'),$bussinessHours)){
            abort(422,'invalid date');
        }
        // check the same in input hidden if time is vailable
        // $timeAlReadyExists = BussinessDay::where('date',$this->input('date'))
        // ->where('time',$this->input('time'))->exists();
        // if($timeAlReadyExists){
        //     abort(422,'invalid time');

        // }
        // dd($timeAlReadyExists);
    }
}
