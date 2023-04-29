<?php
    
namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Http\Requests\ConsultationRequest;
use App\Models\Patient;
use Barryvdh\DomPDF\Facade\Pdf;



    
class ConsultationController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        //  $this->middleware('permission:consultation-list|consultation-create|consultation-edit|consultation-delete', ['only' => ['index','show']]);
        //  $this->middleware('permission:consultation-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:consultation-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:consultation-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $consultations = Consultation::with('appointment')->with('patient')->get();
            //  return $consultations;
        return view('consultation.index',compact('consultations'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }
    public function register(ConsultationRequest $request)
    {   
        $consultation=Consultation::create($request->all());
       
        return redirect()->route('consultation.index')->
         with('status', 'Votre Consultation est bien enregister');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Consultation  $product
     * @return \Illuminate\Http\Response
     */
    public function show(consultation $consultation )
    {
        // $consultation=consultation::find($id);
        $consultations = Consultation::with('appointment')->with('patient')->get();
        // dd($consultation);

        return view('consultation.imprime',compact('consultation'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consultation  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(consultation $consultation)
    {
        // $consultation=Appointment::find($id);
        // dd($consultation);
        // return view('consultation.edit',compact('consultation'));
    
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consultation  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultation $consultation)
    {
        
        // $consultation->update($request->all());
    
        // return redirect()->route('consultation.index')
        //                 ->with('success','consultation updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consultation  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultation $consultation)
    {
        $consultation->delete();
    
        return redirect()->route('consultation.index')
                        ->with('success','consultation deleted successfully');

    }
    public function appointmentConsultation()
    {
        $appointments= Appointment::all();
        // dd($appointments);
        return view('consultation.all', compact('appointments'));
        
    }
    public function Showconsultation($id){

        $consultation=Appointment::find($id);
        // $pdf = Pdf::loadView('consultation..imprime',[
        //     'users'=>$consultation]);
        // return $pdf->download('text.pdf');
        
        
        return view('consultation.show',compact('consultation'));
    }
    
    public function print($id)
    {
    $consultation = Consultation::findOrFail($id);
    return view('consultation.print', compact('consultation'));
    }

}