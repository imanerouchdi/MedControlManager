<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\Patient;
use Carbon\Carbon;

class PatientSeeder extends Seeder
{
    public function run()
    {
        $patients = [
            [
                'nomPatient' => 'Smith',
                'prenomPatient' => 'John',
                'adressPatient' => 'londre',
                'telefonePatient' => '01231824712',
                'cin' => 'aa324424',
                'sexePatient' => 'Monsieur',
                'dateNaissancePatient' => Carbon::createFromDate(1985, 10, 15),
            ],
            [
                'nomPatient' => 'shoc',
                'prenomPatient' => 'sara',
                'adressPatient' => 'florida',
                'telefonePatient' => '03231824712',
                'cin' => 'sh214424',
                'sexePatient' => 'Madame',
                'dateNaissancePatient' => Carbon::createFromDate(1923, 10, 30),
            ],
            [
                'nomPatient' => 'houd',
                'prenomPatient' => 'Jamies',
                'adressPatient' => 'yosofia',
                'telefonePatient' => '09231824712',
                'cin' => 'sk324424',
                'sexePatient' => 'autre',
                'dateNaissancePatient' => Carbon::createFromDate(1999, 11, 22),
            ],
        ];

        foreach ($patients as $patient) {
            Patient::create([
                'nomPatient' => $patient['nomPatient'],
                'prenomPatient' => $patient['prenomPatient'],
                'adressPatient' => $patient['adressPatient'],
                'telefonePatient' => $patient['telefonePatient'],
                'cin' => $patient['cin'],
                'sexePatient' => $patient['sexePatient'],
                'dateNaissancePatient' => $patient['dateNaissancePatient'],
                
            ]);
        }
    }
}
