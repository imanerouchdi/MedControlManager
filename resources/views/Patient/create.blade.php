  @extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-8 ">
        <form class="shadow p-3 mb-5 bg-body rounded" method="POST" action="{{route('patient.store')}}">
            @csrf

            <div class="row mb-3">
                <label for="nom" class="col-sm-2 col-form-label">Nom :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control shadow-sm" id="nom" name="nomPatient" required>
                </div>
                <label for="prenom" class="col-sm-2 col-form-label">Prénom :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control shadow-sm" id="prenom" name="prenomPatient" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="adress" class="col-sm-2 col-form-label">Adress :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control shadow-sm" id="adressPatient" name="adressPatient" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="telefonePatient" class="col-sm-2 col-form-label">telefone :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control shadow-sm" id="telefonePatient" name="telefonePatient" required>
                </div>
                <label for="sex" class="col-sm-2 col-form-label">Sex :</label>
                <div class="col-sm-3 form-group">
                    <select class="form-select" aria-label="Default select example" id="sexePatient" name="sexePatient">
                        <option value="madame">Madame</option>
                        <option value="monsieur">Monsieur</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="dateNaissancePatient" class="col-sm-2 col-form-label">date de naissance :</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control shadow-sm" id="dateNaissancePatient" name="dateNaissancePatient" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="adress" class="col-sm-2 col-form-label">cin :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control shadow-sm" id="cin" name="cin" required>
                </div>
            </div>
            <div class="d-grid">
                <button type="submit"   class="btn btn-primary">Ajouter</button>
            </div>
        </form>
      </div>
    </div>
</div>

  @endsection







{{--  @extends('layouts.app')
@section('content')

<div class="container bg-white">

    <div class="row">
      <div class="col-md-10 justify-content-center ">
        <div class="pull-left">
            <h2>Create New User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('patient.index') }}"> Back</a>
        </div>
        {!! Form::open(array('route'=>'patient.store','method'=>'POST')) !!}
        
        <form class="shadow p-3 mb-5 bg-body rounded" method="Post" action="{{route('patient.create')}}">
            @csrf



            <div class="row mb-3">
                <label for="nom" class="col-sm-2 col-form-label">Nom :</label>
                <div class="col-sm-3">
                    {!! Form::text('nomPatient', null, array('placeholder' => 'Nom Patient','class' => 'form-control')) !!}
                </div>
                <label for="prenom" class="col-sm-2 col-form-label">Prénom :</label>
                <div class="col-sm-3">
                    {!! Form::text('prenomPatient', null, array('placeholder' => 'Prenom Patient','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="row mb-3">
                <label for="adress" class="col-sm-2 col-form-label">Adress :</label>
                <div class="col-sm-10">
                    {!! Form::text('adressPatient', null,array('placeholder' => 'adressPatient','class' => 'form-control')) !!}
                </div>
            </div>


            <div class="row mb-3">
                <label for="telefonePatient" class="col-sm-2 col-form-label">telefone :</label>
                <div class="col-sm-3">
                    {!! Form::text('telefonePatient', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                </div>
                <label for="sex" class="col-sm-2 col-form-label">Sex :</label>
                <div class="col-sm-3 form-group">
                        {!! Form::select('sexePatient[]', $sex,['s','s'], array('class' => 'form-control','multiple')) !!}
                </div>
            </div> 

            <div class="row mb-3">
                <label for="dateNaissancePatient" class="col-sm-2 col-form-label">date de naissance :</label>
                <div class="col-sm-10">
                    
                    {!! Form::date('dateNaissancePatient', null, array('placeholder' => 'date naissance','class' => 'form-control')) !!}

                    <input type="date" class="form-control shadow-sm" id="dateNaissancePatient" name="dateNaissancePatient" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="cin" class="col-sm-2 col-form-label">cin :</label>
                <div class="col-sm-10">
                    {!! Form::date('cin', null, array('placeholder' => 'cin','class' => 'form-control')) !!}
                    
                    <input type="text" class="form-control shadow-sm" id="cin" name="cin" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
{!! Form::close() !!}
            
      
      </div>
    </div>
</div>

  @endsection  --}}