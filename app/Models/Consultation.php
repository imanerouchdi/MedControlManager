<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    protected $primaryKey = 'idCon';

    protected $fillable = [
        'codePatient',
        'numeroRdv',
        'description',
        'dateCon',
        'prccdsixCon',

    ];
    public function patients()
    {
        return $this->belongsTo(Patient::class);
    }
    public function rendezvous()
    {
        return $this->belongsTo(RendezVous::class);
    }
}
