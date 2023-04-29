<title>Consultation</title>
@section('links')
    {{--  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">  --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />
@endsection

@extends('layouts.app-first')
@section('content')
@if (session('status'))
<div class="alert alert-success">
    <p>{{ session('status') }}</p>
</div>
@endif
    

        {{--  <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Standard</label>
                            </div>
                            <select class="custom-select form-select" id="select_std">
                                <option value="">Choose.</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Result</label>
                            </div>
                            <select class="custom-select form-select" id="select_res">
                                <option value="">Choose...</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div>
                    <button id="filter" class="btn btn-sm btn-outline-success">Filter</button>
                    <button id="reset_std" class="btn btn-sm btn-outline-success">Reset Standard</button>
                    <button id="reset_res" class="btn btn-sm btn-outline-success">Reset Result</button>
                    <button id="reset" class="btn btn-sm btn-outline-warning">Reset</button>
                </div>
            </div>
        </div>  --}}
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-5">
                    <h2 class="h2"> All Consultation </h2>
                </div>
                <div class="pull-right mt-5">
                    {{--  <a class="btn btn-success mb-4" href="{{route('patient.create') }}"> Nouveaux Patien</a>  --}}
                </div>
            </div>
        </div>
        <div class="">
            <div class="">
                <div class="">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="tr-style">
                                <th>ID</th>
                                <th>description</th>
                                <th>prix</th>
                                <th>Date </th>
                                <th>nom prenom </th>
                                <th>Telefone </th>
                                <th>Heure Appointment</th>
                                <th width="280px" class="thBorderright">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($consultations as $item )
                                <tr>
                                    <th>{{$item->id}}</th>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->prixCon}}</td>
                                    <td>{{$item->dateCon}}</td>
                                    <td>{{$item->patient->nomPatient}} . {{$item->patient->PrenomPatient}}</td>
                                    <td>{{$item->patient->telefonePatient}}</td>
                                    <td>{{$item->appointment->heureRdv}}</td>
                                    <td>
                                        <form action="{{ route('consultation.destroy', $item->id) }}" method="POST">
                                            <a class="btn btn-danger" href="{{route('consultation.show', $item->id)}}">imprimer</a>
                                            
                                            @csrf
                                            @method('DELETE')
                                            @can('patient-delete')
                                            <button type="submit" class="btn btn-warning">Delete</button>
                                            @endcan
                                        </form>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                            
                        

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
{{--  <script type="text/javascript">
    window.onload = function() { window.print(); }
</script>  --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    {{--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>  --}}
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script></script>
@endsection
