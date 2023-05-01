<?php

namespace App\Http\Controllers;

use App\Models\DossierMedicalPatient;
use Illuminate\Http\Request;

class DossierMedicalPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('dossierMedical.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('dossierMedical.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DossierMedicalPatient  $dossierMedicalPatient
     * @return \Illuminate\Http\Response
     */
    public function show(DossierMedicalPatient $dossierMedicalPatient)
    {
        return view ('dossierMedical.show');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DossierMedicalPatient  $dossierMedicalPatient
     * @return \Illuminate\Http\Response
     */
    public function edit(DossierMedicalPatient $dossierMedicalPatient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DossierMedicalPatient  $dossierMedicalPatient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DossierMedicalPatient $dossierMedicalPatient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DossierMedicalPatient  $dossierMedicalPatient
     * @return \Illuminate\Http\Response
     */
    public function destroy(DossierMedicalPatient $dossierMedicalPatient)
    {
        //
    }
}
