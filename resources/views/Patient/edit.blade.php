@extends('layouts.app-first')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit New Patient</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('patient.index') }}"> Back</a>
        </div>
    </div>
</div>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="shadow p-3 mb-5 bg-body rounded" method="POST" action="{{ route('patient.update',$patient) }}">
    {{--  {!! Form::model($patient, ['method' => 'PATCH','route' => ['patient.update', $patient->codePatient]]) !!}  --}}
        @csrf
        @method('PUT')

    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nom :</strong>
            <input type="text" class="form-control shadow-sm" id="nom" name="nomPatient" required value="{{ $patient->nomPatient }}">
            {{--  {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}  --}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Prenom :</strong>
            <input type="text" class="form-control shadow-sm" id="nom" name="prenomPatient" required value="{{ $patient->prenomPatient }}">
            {{--  {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}  --}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Adress :</strong>
            <input type="text" class="form-control shadow-sm" id="nom" name="adressPatient" required value="{{ $patient->adressPatient }}">
            {{--  {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}  --}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Telefone :</strong>
            <input type="text" class="form-control shadow-sm" id="nom" name="telefonePatient" required value="{{ $patient->telefonePatient }}">
            {{--  {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}  --}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>CIN :</strong>
            <input type="text" class="form-control shadow-sm" id="nom" name="cin" required value="{{ $patient->cin }}">
            {{--  {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}  --}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Genre  :</strong>
            <input type="text" class="form-control shadow-sm" id="nom" name="sexePatient" required value="{{ $patient->sexePatient }}">
            
            {{--  {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}  --}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date de Naissance :</strong>
            <input type="date" class="form-control shadow-sm" id="nom" name="dateNaissancePatient" required value="{{ $patient->dateNaissancePatient }}">
            {{--  {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}  --}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-warning">Update</button>
    </div>
</div>
{{--  {!! Form::close() !!}  --}}
</form>
@endsection