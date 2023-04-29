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
        'numeroRdv',
        'user_id',
    ];

    public function appointment(){
        return $this->hasMany(Appointment::class);
    }
    public function consultation(){
        return $this->hasMany(consultation::class);
    }
     public function user(){
        return $this->belongsTo(User::class);
    }
    public function bussiness_days(){
        return $this->belongsTo(BussinessDay::class);

    }
  
}
