<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rendez-vous</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <div class="container mt-5">
        <div class="card shadow rounded">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Créer un rendez-vous</h2>
                <form class="mx-2 my-1" action="{{ route('appointmentUser.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom :</label>
                        <input type="text" class="form-control border rounded" id="nom" name="nom" required>
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom :</label>
                        <input type="text" class="form-control border rounded" id="prenom" name="prenom" required>
                    </div>
                    <div class="mb-3">
                        <label for="cin" class="form-label">CIN :</label>
                        <input type="text" class="form-control border rounded" id="cin" name="cin" required>
                    </div>
                    <div class="mb-3">
                        <div class="col-md-12">
                            <h2>Veuillez choisir la date du rendez-vous</h2>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="col-md-12">
                                @if ($paginator->previousPageUrl())
                                    <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-secondary float-left"
                                        id="prev-date-btn">
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </a>
                                @endif
                                @if ($paginator->nextPageUrl())
                                    <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-secondary float-right"
                                        id="next-date-btn">Next &raquo;</a>
                                @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="col-md-12">
                            {{--  Pagination  --}}
                            <div class="d-flex justify-content-around w-100  ">
                                @foreach ($paginator as $appointment)
                                    @php
                                        $todayC = now()->format('Y-m-d');
                                    @endphp
                
                
                                    <div 
                                    @if ($todayC == $appointment['full_date']) class="day-column d-flex  flex-column align-items-center border rounded border-secondary rounded-1 bg-info text-white"
                                   @else
                                    class="day-column d-flex  flex-column align-items-center border rounded border-secondary rounded-1" 
                                    @endif
                                        @if ($appointment['day_name'] == 'Sunday') style="line-height: 1;width:60px; font-size:14px; opacity:0.5;"
                                @else
                                    style="line-height: 1;width:60px; font-size:14px;" @endif
                                        onclick="getTodayHours(`{{ $appointment['full_date'] }}`)">
                                        <div class="day-name">{{ substr($appointment['day_name'], 0, 3) . '.' }}</div>
                                        <div class="day-date fw-bold" style="font-weight: bold">{{ $appointment['date'] }}</div>
                                        <div class="day-month">{{ $appointment['month'] }}</div>
                                    </div>
                                    <!-- Répéter pour chaque jour -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h2>Veuillez choisir lheure du rendez-vous</h2>
                    </div>
                    <div class="mb-3">
                        <div class="col-md-12 d-flex">
                            <div class="hour-picker d-flex flex-wrap align-items-center justify-content-center w-75 mx-auto"
                                id="hours">
        
                                @foreach ($paginator as $appointment)
                                    @if ($appointment['full_date'] == now()->format('Y-m-d'))
                                        @foreach ($appointment['available_hours'] as $time)
                                            <input type="hidden" name="date" value={{ $appointment['full_date'] }}>
                                            <input type="hidden" name="time" value="{{ $time }}">
                                            <button class="btn btn-outline-secondary " type="submit">
                                                {{ $time }}
                                            </button>
                                            </form>
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>









                </form>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {{--  <form class="mx-2 my-1" action="{{ route('appointmentUser.store') }}" method="post">  --}}
                        {{--  @csrf

                        @method('POST')  --}}


                </div>
            </div>
            {{--  <div class="row">
                <div class="col-md-12">
                    <h2>Veuillez choisir la date du rendez-vous</h2>
                </div>
            </div>  --}}
            {{--  <div class="row">
                <div class="col-md-12">
                    @if ($paginator->previousPageUrl())
                        <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-secondary float-left"
                            id="prev-date-btn">
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    @endif
                    @if ($paginator->nextPageUrl())
                        <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-secondary float-right"
                            id="next-date-btn">Next &raquo;</a>
                    @endif

                </div>
            </div>  --}}
            {{--  <div class="d-flex justify-content-around w-100  ">
                @foreach ($paginator as $appointment)
                    @php
                        $todayC = now()->format('Y-m-d');
                    @endphp


                    <div @if ($todayC == $appointment['full_date']) class="day-column d-flex  flex-column align-items-center border rounded border-secondary rounded-1 bg-info text-white"
                @else
                    class="day-column d-flex  flex-column align-items-center border rounded border-secondary rounded-1" @endif
                        @if ($appointment['day_name'] == 'Sunday') style="line-height: 1;width:60px; font-size:14px; opacity:0.5;"
                @else
                    style="line-height: 1;width:60px; font-size:14px;" @endif
                        onclick="getTodayHours(`{{ $appointment['full_date'] }}`)">
                        <div class="day-name">{{ substr($appointment['day_name'], 0, 3) . '.' }}</div>
                        <div class="day-date fw-bold" style="font-weight: bold">{{ $appointment['date'] }}</div>
                        <div class="day-month">{{ $appointment['month'] }}</div>
                    </div>
                    <!-- Répéter pour chaque jour -->
                @endforeach
            </div>  --}}
            {{--  <div class="row">
                <div class="col-md-12">
                    <h2>Veuillez choisir lheure du rendez-vous</h2>
                </div>
            </div>  --}}
            {{--  <div class="row">  --}}
                {{--  <div class="col-md-12 d-flex">
                    <div class="hour-picker d-flex flex-wrap align-items-center justify-content-center w-75 mx-auto"
                        id="hours">

                        @foreach ($paginator as $appointment)
                            @if ($appointment['full_date'] == now()->format('Y-m-d'))
                                @foreach ($appointment['available_hours'] as $time)
                                    <input type="hidden" name="date" value={{ $appointment['full_date'] }}>
                                    <input type="hidden" name="time" value="{{ $time }}">
                                    <button class="btn btn-outline-secondary " type="submit">
                                        {{ $time }}
                                    </button>
                                    </form>
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                </div>  --}}
            {{--  </div>
        </div>
        <br>  --}}






        <script src="https://code.jquery.com/jquery-3.1.1.min.js">
            < script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" >
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            function getTodayHours(date) {
                let hours;
                $.ajax({
                    url: "/available/" + date,
                    type: 'GET',
                    success: function(data) {
                        var html = ``;
                        $.each(data.data, function(index, value) {
                            html += `
                    <form class="mx-2 my-1" action="{{ route('appointmentUser.store') }}" method="post">
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




</body>

</html>
