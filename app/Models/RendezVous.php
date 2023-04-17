<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;
    protected $primaryKey = ['numeroRdv','codePatient'];

    protected $fillable = [
        'dateRdv',
        'heureRdv',
        'codePatient',
        'cin',
        'nomPatient',
        'prenomPatient'


        
    ];
    public function patients()
    {
        return $this->belongsTo(Patient::class);
    }
}