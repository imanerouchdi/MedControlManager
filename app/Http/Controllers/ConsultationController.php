<?php
    
namespace App\Http\Controllers;
    
use App\Models\Consultation;
use Illuminate\Http\Request;
    
class ConsultationController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:consultation-list|consultation-create|consultation-edit|consultation-delete', ['only' => ['index','show']]);
         $this->middleware('permission:consultation-create', ['only' => ['create','store']]);
         $this->middleware('permission:consultation-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:consultation-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultation = consultation::latest()->paginate(5);
        return view('consultation.index',compact('consultation'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('consultation.create');
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
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        consultation::create($request->all());
    
        return redirect()->route('consultation.index')
                        ->with('success','consultation created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Consultation  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Consultation $consultation)
    {
        return view('consultation.show',compact('consultation'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consultation  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(consultation $consultation)
    {
        return view('consultation.edit',compact('consultation'));
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
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $consultation->update($request->all());
    
        return redirect()->route('consultation.index')
                        ->with('success','consultation updated successfully');
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
}