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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Billet de consultation</h3>
                        <div class="text-end mb-3">
                            <span class="fw-bold me-2">2023/04/28 12:21</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class=" bg-body rounded" method="POST" action="{{ route('add')}}">
                            @csrf
                            @method('Post')
                            <div class="row border-bottom mb-3 pb-3">
                                <div class="col-md-3">
                                    <h5 class="fw-bold">Information Patient:</h5>
                                </div>
                                <div class="col-md-9">
                                    <div class="row border-bottom mb-3 pb-3">
                                        <div class="col-md-6">
                                            <label class="form-label"> Nom et prenom : </label>
                                            <input type="text" class="form-control" disabled name="prenom" >
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label class="form-label">Téléphone:</label>
                                            <input type="text" class="form-control" name="telephone" disabled >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-bottom  mb-3 pb-3">
                                <div class="col-md-3">
                                    <h5 class="fw-bold">Information Rendez-Vous:</h5>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Date et heure :</label>
                                            <input type="text" class="form-control"  disabled name="dateCon" >
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row  mb-3 pb-3">
                                <div class="col-md-3">
                                    <h5 class="fw-bold">Information Consultation:</h5>
                                </div>

                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-12 mt-3">
                                            <label class="form-label">Description:</label>
                                            <input type="text" class="form-control" name="description" >
                                            @error('description')
                                            <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                                

                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label class="form-label">Prix de consultation:</label>
                                            <input type="float" class="form-control" name="prixCon" >
                                            @error('prixCon')
                                            <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                                
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">date Consultation:</label>
                                            <input type="date" class="form-control" name="dateCon" value="" required>
                                            
                                                
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-5 mb-5 ">
                                        <button class="btn btn-success  justify-content-center" type="submit">Save</button>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


