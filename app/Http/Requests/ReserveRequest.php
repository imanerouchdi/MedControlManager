<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
           ' nomPatient'=> 'required|string',
           'prenomPatient'=>'required|string',
           'cin' =>'required|string|size:6 ',
           'user_id'=>'required|integer',
           'patient_id'=>'required|integer',
           'dateRdv' => 'required|date',
           'heureRdv'=>'required|time',
           'nom'=>'required|string',
           'prenom'=>'required|string',
            
        ];
    }
}
