@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>consultation</h2>
            </div>
            <div class="pull-right">
                @can('consultation-create')
                <a class="btn btn-success" href="{{route('consultation.create') }}"> Create New Consultation</a>
                @endcan
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
            <th>No</th>
            <th>Non Patient</th>
            <th>Prenom Patient</th>
            <th>CIN Patient</th>
            <th>Date </th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($consultation as $consultation)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $consultation->nomPatient }}</td>
            <td>{{ $consultation->prenomPatient }}</td>
            <td>{{ $consultation->adressPatient }}</td>
            <td>{{ $consultation->telefonePatient }}</td>
            <td>{{ $consultation->cin }}</td>
            <td>{{ $consultation->sexePatient }}</td>
            <td>{{ $consultation->dateNaissancePatient }}</td>
            <td>
                <form action="{{route('consultation.destroy',$consultation->id) }}" method="POST">
                    <a class="btn btn-info" href="{{route('consultation.show',$consultation->id) }}">Show</a>
                    @can('consultation-edit')
                    <a class="btn btn-primary" href="{{ route('consultation.edit',$consultation->id) }}">Edit</a>
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('consultation-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $consultation->links() !!}
    <p class="text-center text-primary"><small>Tutorial by LaravelTuts.com</small></p>
@endsection