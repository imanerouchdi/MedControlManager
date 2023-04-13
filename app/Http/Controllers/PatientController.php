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
         $this->middleware('permission:patient-list|patient-create|patient-edit|patient-delete', ['only' => ['index','show']]);
         $this->middleware('permission:patient-create', ['only' => ['create','store']]);
         $this->middleware('permission:patient-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:patient-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $patient = Patient::orderBy('CodePatient','DESC')->paginate(5);
        return view('patient.index',compact('patient'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $sex = Patient::pluck('sexePatient','sexePatient')->all();
        return view('patient.create');
        // ,compact('sex'));
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
        
    
        $patient=Patient::create($request->all());

        return redirect()->route('patient.index',$patient)
                        ->with('success','User created successfully');
    
                        // ->with('success','Patient created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show($codePatient)
    {
        $patient=Patient::find($codePatient);
        return view('patient.show',compact('patient'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('patient.edit',compact('patient'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $patientId)
    {
        // dd('test');
        //  request()->validate([
        //     'nomPatient' => 'required',
        //     'prenomPatient' => 'required',
        //     'adressPatient' => 'required',
        //     'telefonePatient' => 'required',
        //     'cin' => 'required'|'unique',
        //     'sexePatient' => 'required',
        //     'dateNaissancePatient' => 'required',
        // ]);
        
        $patient = Patient::find($patientId);
        $patient->update($request->all());
        
        return redirect()->route('patient.index')
                        ->with('success','Patient updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
    
        return redirect()->route('patient.index')
                        ->with('success','Product deleted successfully');
    }
}