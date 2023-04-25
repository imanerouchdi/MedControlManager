<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token() }}">
    <title>Rendez-vous</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Ajouter vos styles CSS ici */
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Veuillez choisir la date du rendez-vous</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-secondary float-left" id="prev-date-btn">Précédent</button>
                <button class="btn btn-secondary float-right" id="next-date-btn">Suivant</button>
            </div>
        </div>
        <div class="d-flex justify-content-around w-100 my-2 ">
            @foreach($data as $appointment)
                
                    @php
                        $todayC = now()->format('Y-m-d');
                    @endphp
                    
                   
                <div  
                @if ($todayC == $appointment['full_date'])
                    class="day-column d-flex  flex-column align-items-center border rounded border-secondary rounded-1 bg-info text-white"
                @else
                    class="day-column d-flex  flex-column align-items-center border rounded border-secondary rounded-1"
                @endif 
                @if ($appointment['day_name'] == 'Sunday')
                    style="line-height: 1;width:60px; font-size:14px; opacity:0.5;"
                @else
                    style="line-height: 1;width:60px; font-size:14px;"
                @endif
                
                onclick="getTodayHours(`{{ $appointment['full_date'] }}`)">
                        <div class="day-name">{{ substr($appointment['day_name'],0,3).'.'}}</div>
                        <div class="day-date fw-bold" style="font-weight: bold">{{$appointment['date']}}</div>
                        <div class="day-month">{{$appointment['month']}}</div>
                    </div>
                    <!-- Répéter pour chaque jour -->
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>Veuillez choisir lheure du rendez-vous</h2>
            </div>
        </div>
           <div class="row">
            <div class="col-md-12 d-flex" > 
                <div class="hour-picker d-flex flex-wrap align-items-center justify-content-center w-75 mx-auto" id="hours">     
            @foreach($data as $appointment)
                    @if($appointment['full_date'] == now()->format('Y-m-d'))   
                        @foreach($appointment['available_hours'] as $time)
                            
                                 <form class="mx-2 my-1" action="{{route('appointmentUser.store')}}" method="post">
                            @csrf 
                                
                                 @method('POST')
                                <input type="hidden" name="date" value={{$appointment['full_date']}}>
                                <input type="hidden" name="time" value="{{$time}}">
                                <button class="btn btn-outline-secondary " type="submit">
                                    {{$time}}
                                </button>
                            </form>
                         @endforeach 
                      @endif 
                  
                  
              @endforeach 
                </div>
            </div>  
        </div>   
    </div>
    <br>






    {{--  <div class="row">
        <div class="col">
          <button class="btn btn-secondary float-start">&lt;</button>
        </div>
        <div class="col text-center">
            @foreach($data as $appointment)
          <h4 class="fw-bold">{{$appointment['date']}}</h4>
        </div>
        @endforeach
        <div class="col">
          <button class="btn btn-secondary float-end">&gt;</button>
        </div>
      </div>  --}}
      <script>

// Disable next button if current date is not in the current week


function getTodayHours(date){
    let hours;
    $.ajax({
        url : "/available/" + date,
        success : function(data){
            var html=``;
        $.each(data.data,function(index,value){
           html+=`
           
                    <form class="mx-2 my-1" action="{{route('appointmentUser.store')}}" method="post">
                        @csrf 
                        @method('POST')
                           <input type="hidden" name="date" value=" ${date}">
                           <input type="hidden" name="time" value=" ${value}">
                           <button class="btn btn-outline-secondary " type="submit">
                               ${value}
                           </button>
                       </form>
           `
           $('#hours').html(html)
        })
          
        }
    });


}
      </script>


 
    <script src="https://code.jquery.com/jquery-3.1.1.min.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>