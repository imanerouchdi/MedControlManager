<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;
    protected $primaryKey = 'numeroRdv';

    protected $fillable = [
        'dateRdv',
        'heureRdv',
        'nomPatient',
        'prenomPatient',
        'CIN',
    ];
}