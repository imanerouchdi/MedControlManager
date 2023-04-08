<?php
    
namespace App\Http\Controllers;
    
use App\Models\Patient;
use Illuminate\Http\Request;
    
class patientController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        //  $this->middleware('permission:patient-list|patient-create|patient-edit|patient-delete', ['only' => ['index','show']]);
        //  $this->middleware('permission:patient-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:patient-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:patient-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Patient::all();
        
        return view('Patient.show',compact('data'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Patient.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        request()->validate([
            'nomPatient' => 'required|string',
            'prenomPatient' => 'required|string',
            'adressPatient' => 'required|string',
            'telefonePatient' => 'required',
            'cin' => 'required|string',
            'sexePatient' => 'required|string',
            'dateNaissancePatient' => 'required|date',
        ]);
        
    
        Patient::create($request->all());
    
        return view('AdminPanel.adminLayout')
                        ->with('success','Patient created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        return view('Patient.show',compact('patients'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $product)
    {
        return view('Patient.edit',compact('patient'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $product)
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $product->update($request->all());
    
        return redirect()->route('Patient.index')
                        ->with('success','Patient updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $product)
    {
        $product->delete();
    
        return redirect()->route('Patient.index')
                        ->with('success','Product deleted successfully');
    }
}