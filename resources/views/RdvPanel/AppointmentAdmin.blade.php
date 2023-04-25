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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        
    </head>
<body>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

      <div class="calendar-container">
        <div class="row  ">
            <div class="w-50 m-auto ">
                <form class="shadow p-3 mb-5 bg-body rounded" method="Post" action="{{route('appointmentAdmin.store')}}">
                    @csrf
                    <h1 class="text-center mb-3 text-secondary">Ajouter</h1>
                    <div class="row mb-3">
                        <label for="nom" class="col-sm-2 col-form-label">Nom :</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control shadow-sm" id="nom" name="nom" >
                        </div>
                        <label for="prenom" class="col-sm-2 col-form-label">Prénom :</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control shadow-sm" id="prenom" name="prenom" >
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
                            <input type="text" class="flatpickr js-flatpickr-time from-control" name="heureRdv" placeholder="selection date">
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit"   class="btn btn-success">Ajouter Rdv</button>
                    </div>
                </form>
          </div>
        </div>
    </div>
    
   
      




     
      


      
      
      


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>     
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    date={
        enableTime: false,
        dateFormat: "Y-m-d ",
        altInput:true,
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
    {{--  swal("congratulation !","");  --}}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" integrity="sha512-7VTiy9AhpazBeKQAlhaLRUk+kAMAb8oczljuyJHPsVPWox/QIXDFOnT9DUk1UC8EbnHKRdQowT7sOBe7LAjajQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>
@endsection