@extends('layouts.app-first')
@section('content')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('assets\css\calendar.css') }}">
        {{--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  --}}
        <script src='{{ asset("assets/js/calendar.js") }}'></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        
    </head>
<body>
    
      <div class="container calendar-container">
        <div class="row mt-5">
          <div class="col-md-8 ">
            <form class="shadow p-3 mb-5 bg-body rounded" method="Post" action="{{route('rendez-vous.store')}}">
                @csrf
                <h1 class="text-center mb-3 text-secondary">Ajouter</h1>
                <div class="row mb-3">
                    <label for="nom" class="col-sm-2 col-form-label">Nom :</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control shadow-sm" id="nom" name="nomPatient" >
                    </div>
                    <label for="prenom" class="col-sm-2 col-form-label">Prénom :</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control shadow-sm" id="prenom" name="prenomPatient" >
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="adress" class="col-sm-2 col-form-label">cin :</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control shadow-sm" id="cin" name="cin" >
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="adress" class="col-sm-2 col-form-label">date :</label>
                    <div class="col-sm-10">
                        <input type="text" class="flatpickr js-flatpickr-date from-control" name="dateRdv" placeholder="selection date">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="adress" class="col-sm-2 col-form-label">time :</label>
                    <div class="col-sm-10">
                        <input type="text" class="flatpickr js-flatpickr-time from-control" name="timeRdv" placeholder="selection date">
                    </div>
                </div>
                <div class="d-grid">
                    <button type="submit"   class="btn btn-success">Ajouter Rdv</button>
                </div>
            </form>
          </div>
        </div>
    </div>
    
   
      




     
      


      
      
      



<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>     
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    date={
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        altInput:true,
        altFormat:"d F,Y(H:S K)"
    }
    time={
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        altInput:true,
        altFormat:'H:i'

    }
    flatpickr(".flatpickr.js-flatpickr-date", date);
    flatpickr(".flatpickr.js-flatpickr-time", time);
</script>
</body>
</html>
@endsection