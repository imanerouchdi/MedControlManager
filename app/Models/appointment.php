<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'dateRdv',
        'heureRdv',
        'patient_id',
        'cin',
        'nom',
        'prenom',
        // 'numeroRdv',
    ];
    public function patients()
    {
        return $this->belongsTo(Patient::class);
    }
}