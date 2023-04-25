<?php

namespace App\Http\Controllers;

use App\Models\bussinessHour;
use Illuminate\Http\Request;

class BussinessHourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bussinessHours=BussinessHour::all();
        return view('RdvPanel.reserve',compact('bussinessHours'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=array_values($request->all()['data']);
        BussinessHour::query()->upsert($data,['day']);
        // return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bussinessHour  $bussinessHour
     * @return \Illuminate\Http\Response
     */
    public function show(bussinessHour $bussinessHour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bussinessHour  $bussinessHour
     * @return \Illuminate\Http\Response
     */
    public function edit(bussinessHour $bussinessHour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bussinessHour  $bussinessHour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bussinessHour $bussinessHour)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bussinessHour  $bussinessHour
     * @return \Illuminate\Http\Response
     */
    public function destroy(bussinessHour $bussinessHour)
    {
        //
    }
}
