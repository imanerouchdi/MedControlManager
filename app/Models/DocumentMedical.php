<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentMedical extends Model
{
    use HasFactory;

    protected $fillable = [
        'dateDoc',
        'codeMed',
        'codePatient',
        'contenu'

    ];

}
