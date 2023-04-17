<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $primaryKey = 'codePatient';
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
    public function user()
    {
        return this->belongsTo(user::class); 
    }
     
}
