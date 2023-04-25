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
        <div class="row ">
            @foreach($data as $appointment)
            <div class="col-md-12">
                <div class="d-flext ">
                    <div class="day-column  ">
                        <div class="day-name">{{$appointment['day_name']}}</div>
                        <div class="day-date">{{$appointment['date']}}</div>
                        <div class="day-month">{{$appointment['month']}}</div>
                    </div>
                    <!-- Répéter pour chaque jour -->
                </div>
            </div>
        </div>
        @endforeach
        <div class="row">
            <div class="col-md-12">
                <h2>Veuillez choisir lheure du rendez-vous</h2>
            </div>
        </div>
        {{--  <div class="row">
            <div class="col-md-12">
                <div class="hour-picker d-flex justify-content-center">
                    @if(!$appointment['off'])   
                        @foreach($appointment['available_hours'] as $time)
                            {{--  @csrf  error 419 -> page expere --}} 
                            {{--  <form action="{{route('appointmentUser.store')}}" method="post">
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
                  
                </div>  --}}  
            {{--  @endforeach  --}}
{{--  
            </div>
        </div>  --}}
    </div>
    <br>



    //



    <div class="row">
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
      </div>
      <script>
        let currentDate = new Date();
let currentWeek = currentDate.getWeek();

function isCurrentWeek(date) {
  return date.getWeek() === currentWeek;
}

// Disable next button if current date is not in the current week
if (!isCurrentWeek(new Date())) {
  document.querySelector('#next-btn').disabled = true;
}
      </script>


 

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>