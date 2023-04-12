@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Patient Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success mb-4" href="{{ route('patient.create') }}"> Create New Patien</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Code Patient</th>
            <th>Nom</th>
            <th>Prenon</th>
            <th>Adress</th>
            <th>Telefone</th>
            <th>CIN</th>
            <th>Genre</th>
            <th>Date de Naissance</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($patient as $key => $item)
            <tr>
                <td>{{ $item->codePatient }}</td>
                <td>{{ $item->nomPatient }}</td>
                <td>{{ $item->prenomPatient }}</td>
                <td>{{ $item->adressPatient }}</td>
                <td>{{ $item->telefonePatient }}</td>
                <td>{{ $item->cin }}</td>
                <td>{{ $item->sexePatient }}</td>
                <td>{{ $item->dateNaissancePatient }}</td>
                <td>
                    <form action="{{ route('patient.destroy', $item->codePatient) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('patient.show', $item->codePatient) }}">Show</a>
                        @can('patient-edit')
                            <a class="btn btn-primary" href="{{ route('patient.edit', $item->codePatient) }}">Edit</a>
                        @endcan
                        @csrf
                        @method('DELETE')
                        @can('patient-delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $patient->render() !!}
@endsection
