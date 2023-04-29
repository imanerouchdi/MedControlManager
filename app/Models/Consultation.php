<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    

    protected $fillable = [
        
        'description',
        'dateCon',
        'prixCon',
        'patient_id',
        'Appointment_id',
        

    ];
   
    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'Appointment_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
