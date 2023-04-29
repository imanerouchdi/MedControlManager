@extends('layouts.app-first')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-5">
                <h2 class="h2">Consultation Management</h2>
            </div>
            <div class="pull-right mt-5">
                {{--  <a class="btn btn-success mb-4" href="{{route('patient.create') }}"> Nouveaux Patien</a>  --}}
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr class="tr-style">
            <th>Nom</th>
            <th>Prenon</th>
            <th>Telefone</th>
            <th>date Rendez-Vous</th>
            <th>Heure</th>
            <th width="280px" class="thBorderright">Action</th>
        </tr> 
        @foreach($appointments as $key =>$appointment)
            <tr>

                <td>{{$appointment->nom}}</td>
                <td>{{$appointment->prenom}}</td>
                <td>{{$appointment->patient->telefonePatient}}</td>
                <td>{{$appointment->dateRdv}}</td>
                <td>{{$appointment->heureRdv}}</td>
                <td>
                    <form action="{{route('Showconsultation', $appointment->id )}}" method="POST">
                        {{--  @can('consultation.edit')  --}}
                        @csrf
                        {{--  <button type="submit" class="btn btn-info" >Consultation</button>  --}}
                        {{--  @endcan  --}}
                        <a href="{{route('Showconsultation', $appointment->id) }}" class="btn btn-success" method="POST">consultation</a>

                        
                    </form>
                </td>
            </tr>
        @endforeach
        
    
@endsection
