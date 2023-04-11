<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        "nomPatient",
        "prenomPatient",
        "adressPatient",
        "telefonePatient",
        "cin",
        'sexePatient',
        "dateNaissancePatient",
    ];

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
     
}
