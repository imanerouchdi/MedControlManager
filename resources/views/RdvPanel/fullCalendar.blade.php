@extends('layouts.app-first')
@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Jquery Fullcalandar Integration with PHP and Mysql</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
        
        {{--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    
    </head>

    <body>
        <br />
        <h2 align="center"><a href="#">Jquery Fullcalandar Integration with PHP and Mysql</a></h2>
        <br />
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="col-md-11 offset-1 mt-5 mb-5">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="" method="Post" action="{{route('appointment.store')}}">
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
                    <input type="text" class="flatpickr js-flatpickr-date from-control" name="dateRdv" id="dateRdv" placeholder="selection date">
                </div>
            </div>
            <div class="row mb-3">
                <label for="adress" class="col-sm-2 col-form-label">time :</label>
                <div class="col-sm-10">
                    <input type="text" class="flatpickr js-flatpickr-time from-control" name="heureRdv"  id="heureRdv" placeholder="selection time">
                </div>
            </div>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success w-50" id="save">Save</button>
      </div>
    </div>
  </div>
</div>

        <script>
            $(document).ready(function() {
                /*fetch data*/
                var appointment=@json($events);
                $('#calendar').fullCalendar({
                   header:{
                    left:'prev,next today',
                    center: 'title',
                    right:'month ,agendaWeek,agendaDay'
                   },
                   events:appointment,
                   /*clickable case*/
                   selectable:true,
                   selectHelper:true,
                   select:function(start,end,allDays){
                    $('#exampleModal').modal('toggle');
                    /*create appointment*/
                    $('#save').click(function(){
                        var nom=$('#nom').val();
                        var prenom=$('#prenom').val();
                        var dateRdv=$('#dateRdv').val();
                        var heureRdv=$('#heureRdv').val();
                        console.log(nom,prenom,dateRdv,heureRdv);
                    });
                   }
                   
                   
                });
            });
        </script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>     
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
</script>
    </body>

    </html>
@endsection
