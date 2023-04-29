<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rendez-vous</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .day-column:hover{
        background-color:rgb(239, 237, 239)!important;        
    }
    .border-secondary::after{
        color: rgb(23, 162, 184)!important;
    }
    
</style>

</head>

<body>
    {{--  <div class="container mt-5">
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
        </div>  --}}

        @include('Mylayout.navigation')
        @if (session('status'))
        <div class="alert alert-success">
            <p>{{ session('status') }}</p>
        </div>
        @endif
        
        {{--  <header class=" mt-2">
            <div class="container pt-4 pt-xl-5 mt-5">
                <div class="row pt-5">
                    <div class="col-md-8 text-center text-md-start mx-auto">
                        <div class="text-center">
                            <h1 class="display-4 fw-bold mb-5">rendez-vous chez votre &nbsp;<span class="underline">médecin</span>!</h1>
                            
                        </div>
                    </div>
                </div>
            </div>
        </header>  --}}

        {{--  <div class="container my-5 px-5">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{asset('assets/img/med.jpg')}}"  alt="Photo du médecin" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title">Dr. John Doe</h2>
                            <h3 class="card-subtitle mb-2 text-muted">Médecin généraliste</h3>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu purus sed arcusemper vitae ac ipsum. Nunc malesuada ante id mauris efficitur, ac aliquet sapien volutpat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>  --}}
        
        <div class="container mt-5 px-5">
            <div class="card shadow rounded border-0">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Créer un rendez-vous</h2>
                    <form class="mx-2 my-1" action="{{route('appointmentUser.store')}}" method="POST">
                        @csrf 
                        @method('POST')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nom" class="form-label">Nom :</label>
                                <input type="text" class="form-control rounded-pill shadow-sm" id="nom" name="nom" required placeholder="Nom">
                            </div>
                            <div class="col-md-6">
                                <label for="prenom" class="form-label">Prénom :</label>
                                <input type="text" class="form-control rounded-pill shadow-sm" id="prenom" name="prenom" required placeholder="Prénom">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="cin" class="form-label">CIN :</label>
                            <input type="text" class="form-control rounded-pill shadow-sm" id="cin" name="cin" required placeholder="CIN">
                        </div>
                        <div class="mb-3">
                            <div class="col-md-12">
                                <h2>Veuillez choisir la date du rendez-vous</h2>
                            </div>
                        </div>
                        
                       


                        <div class="row">
                            <div class="col-md-12">
                                @if ($paginator->previousPageUrl())
                                    <a href="{{ $paginator->previousPageUrl()}}" class="btn btn-secondary float-left"id="prev-date-btn">
                                        <i class="fa-solid fa-backward"></i>
                                    </a>
                                @endif
                                @if ($paginator->nextPageUrl())
                                    <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-secondary  float-right" id="next-date-btn">
                                        <i class="fa-solid fa-forward"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-around w-100  ">
                            @foreach ($paginator as $appointment)
                                    @php
                                        $todayC = now()->format('Y-m-d');
                                    @endphp
                                <div 
                                            @if ($todayC == $appointment['full_date']) class="  day-column d-flex  flex-column align-items-center border rounded border-secondary rounded-1 bg-info text-white"
                                            @else
                                                class="day-column d-flex  flex-column align-items-center border rounded border-secondary rounded-1" 
                                            @endif
                                            @if ($appointment['day_name'] == 'Sunday') style="line-height: 1;width:60px; font-size:14px; opacity:0.5;"
                                            @else
                                                style="line-height: 1;width:60px; font-size:14px;" 
                                            @endif
                                    onclick="getTodayHours(`{{ $appointment['full_date'] }}`)">
                                            <div class="day-name">{{ substr($appointment['day_name'], 0, 3) . '.' }}</div>
                                            <div class="day-date fw-bold" style="font-weight: bold">{{ $appointment['date'] }}</div>
                                            <div class="day-month">{{ $appointment['month'] }}</div>
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
                            <div class="col-md-12 d-flex">
                                <div class="hour-picker d-flex flex-wrap align-items-center justify-content-center w-75 mx-auto" id="hours">
                                    @foreach ($paginator as $appointment)
                                        @if ($appointment['full_date'] == now()->format('Y-m-d'))
                                            @foreach ($appointment['available_hours'] as $time)
                                                <input type="hidden" name="date" value={{ $appointment['full_date'] }}>
                                                <input type="hidden" name="time" value="{{ $time }}">
                                                <button class="btn btn-outline-success btnhover " type="submit">{{ $time }}</button>   
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @include('Mylayout.footer')
        </div>  















        

        




        
        
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>



<script>

    
    
    
    
    
            function getTodayHours(date) {
                let hours;
                $.ajax({
                    url: "/available/" + date,
                    type: 'GET',
                    success: function(data) {
                        var html = ``;
                    $.each(data.data, function(index, value) {
                          
                  /*  <form class="mx-2 my-1" action="{{ route('appointmentUser.store') }}" method="post">
                        @csrf 
                        @method('POST') </form>*/
                    /* end had patien mkonikia m*/

                        html += `     <input type="hidden" name="date" value=" ${date}">
                           <input type="hidden" class='time' name="time" value=" ${value}">
                           <button class="btn btn-outline-success  " type="submit">
                               ${value}
                           </button>
                      
                        `
                            $('#hours').html(html)
                        })

                    }
                });

            
            }
           

    
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>