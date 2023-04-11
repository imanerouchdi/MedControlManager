<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'codePatient',
        'description',
        'dateCon',
        'prixCon',

    ];


    public function patients()
    {
        return $this->belongsTo(Patient::class);
    }
}
