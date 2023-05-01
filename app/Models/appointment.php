<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    
    protected $guarded=[];
    protected $casts=[
        'heureRdv'=>'datetime:H:i'
    ];
    protected $fillable = [
        'dateRdv',
        'heureRdv',
        'patient_id',
        'cin',
        'nom',
        'bussiness_days_id',
        'prenom',
    ];
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function consultation()
    {
        return $this->hasOne(Consultation::class);
    }

}