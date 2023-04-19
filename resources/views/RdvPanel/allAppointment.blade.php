@extends('layouts.app-first')
@section('content')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{csrf_token()}}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('assets\css\styles.css') }}">
        <meta charset='utf-8' />
        {{--  <script src='{{ asset("assets/js/calendar.js") }}'></script>  --}}
        <script src='{{ asset("assets/js/index.global.js") }}'></script>
        <script src='{{ asset("assets/js/index.global.min.js") }}'></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        {{--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.0.0/index.min.js">  --}}
        
        {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.0.0/index.js"></script>  --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

       
    </head>
<body>
  <style>
      
    body {
      margin: 40px 10px;
      padding: 0;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
      font-size: 14px;
    }
  
    #calendar {
      max-width: 1100px;
      margin: 0 auto;
    }
    .fc-timeGridWeek-view,.fc-dayGridMonth-view,.fc-timeGridDay-view,.fc-listWeek-view{
        background-color : white
    }
     

    .fc-header-toolbar{
        background-color: #002B5B !important;
        border-top-left-radius: 25px !important; 
        border-top-right-radius: 25px !important; 
        padding: 20px !important; 
        color: #F9F5EB !important;
        margin-bottom: 0 !important;
    }

    .fc-view-harness,.fc-view-harness-passive{
        background-color:#F9F5EB !important;
    }
    .fc .fc-button-primary{
    background-color:#002B5B !important;
    /*/border-color: #F9F5EB !important;*/
    }
    

  
  </style>
  </head>
  <body>
    <div class="container">
        <p><h1>All Appointments</h1></p>
        <div class="">
          <div id="error_messages"></div>
            <div id="calendar"></div>
        </div>
        
    </div>
    
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
                        <span id="errornom" class="text-danger"></span>
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

        document.addEventListener('DOMContentLoaded', function() {
          var appointment=@json($events);
          $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            });
          var calendarEl = document.getElementById('calendar');
           
          var calendar = new FullCalendar.Calendar(calendarEl, {
            
              headerToolbar:{
               left:'prev,next today',
               center: 'title',
               right:'dayGridMonth,timeGridWeek,timeGridDay'
              },
              events:appointment,
              /*clickable case*/
              height: 'auto',
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            selectable: true,
            selectMirror: true,
            nowIndicator: true,
            select:function(start,end,allDays){
              $('#exampleModal').modal('toggle');
              /*create appointment*/
              $('#save').click(function(){
                $('.error_messages').html('');
                  var nom=$('#nom').val();
                  var prenom=$('#prenom').val();
                  var cin=$('#cin').val();
                  var dateRdv=$('#dateRdv').val();
                  var heureRdv=$('#heureRdv').val();
                  
                  $.ajax({
                    url:"{{route('calendar.store')}}",
                    type:"POST",
                    dataType:"json",
                    data:{nom,prenom,cin,dateRdv,heureRdv},
                    success:function(result){
                      console.log(result)
                    },
                    error:function(result)
                    {
                      console.log(result)
                      if(result.responseJSON.errors){
                        $('#errornom').html(result.responseJSON.errors.nom);
                      }  
                    }
                  });
              });
             }
            
             
           
          });
      
          calendar.render();
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
