<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DossierMedical extends Model
{
    use HasFactory;
    protected $primaryKey = 'idDossier';


    protected $fillable = [
        'codePatient',
        'diagnostic',
        'traitement',
    ];
}
