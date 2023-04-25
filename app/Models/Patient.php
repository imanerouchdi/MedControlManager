<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    // protected $primaryKey = ['codePatient','user_id'];
    protected $fillable = [
       
        "nomPatient",
        "prenomPatient",
        "adressPatient",
        "telefonePatient",
        "cin",
        'sexePatient',
        "dateNaissancePatient",
        'numeroRdv'
    ];

    public function appointment(){
        return $this->hasMany(Appointment::class);
    }
     
}
