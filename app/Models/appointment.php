<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'dateRdv',
        'heureRdv',
        'patient_id',
        'cin',
        'nom',
        'bussiness_days_id',
        'prenom',
        // 'numeroRdv',
    ];
    public function patients()
    {
        return $this->belongsTo(Patient::class);
    }
}