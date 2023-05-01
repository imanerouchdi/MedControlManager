<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rendez-vous</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .day-column:hover {
            background-color: rgb(239, 237, 239) !important;
        }

        .border-secondary::after {
            color: rgb(23, 162, 184) !important;
        }
        
    </style>

</head>

<body>

    @include('Mylayout.navigation')
    @if (session('status'))
        <div class="alert alert-success">
            <p>{{ session('status') }}</p>
        </div>
    @endif
    <div class="container px-5 py-5 mt-5 ">

        <div class=" card shadow-lg p-3 mb-5 bg-body rounded rounded border-1 mt-5 py-5">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Créer un rendez-vous</h2>
                <form id="formappointmentUser" class="mx-2 my-1" action="{{ route('appointmentUser.store') }}"
                    method="POST">
                    @csrf
                    @method('POST')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nom" class="form-label">Nom :</label>
                            <input type="text" class="form-control rounded-pill shadow-sm" id="nom"
                                name="nom" required placeholder="Nom">
                        </div>
                        <div class="col-md-6">
                            <label for="prenom" class="form-label">Prénom :</label>
                            <input type="text" class="form-control rounded-pill shadow-sm" id="prenom"
                                name="prenom" required placeholder="Prénom">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="cin" class="form-label">CIN :</label>
                        <input type="text" class="form-control rounded-pill shadow-sm" id="cin" name="cin"
                            required placeholder="CIN">
                    </div>
                    <div class="mb-3">
                        <div class="col-md-12">
                            <h4><em>Veuillez choisir la date du rendez-<mark>vous</mark></em></h4>
                        </div>
                    </div>


                    <input type="hidden" name="date" id="date">
                    <input type="hidden" name="time" id="time">

                    <div class="row">
                        <div class="col-md-12">
                            @if ($paginator->previousPageUrl())
                                <a href="{{ $paginator->previousPageUrl() }}"
                                    class="btn btn-success float-left"id="prev-date-btn">
                                    <i class="fa-solid fa-backward"></i>
                                </a>
                            @endif
                            @if ($paginator->nextPageUrl())
                                <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-success py-2 mb-3 float-right"
                                    id="next-date-btn">
                                    <i class="fa-solid fa-forward"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex justify-content-around w-100 mb-5 ">
                        @foreach ($paginator as $appointment)
                            @php
                                $todayC = now()->format('Y-m-d');
                            @endphp
                            <div @if ($todayC == $appointment['full_date']) class="  day-column d-flex  flex-column align-items-center border rounded border-secondary  rounded-1 bg-info text-white"
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
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <h4><em>Veuillez choisir lheure du rendez-<mark>vous</mark></em></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <div class="hour-picker d-flex flex-wrap align-items-center justify-content-center w-75 mx-auto"
                                id="hours">

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

                        html += `  <button class="btn btn-outline-success  mx-2 my-2  "
                          onclick= "dateAndTime('${date}','${value}')"
                          type="button">
                               ${value}
                           </button>
                      
                        `

                    })
                    $('#hours').html(html)



                }
            });


        }

        function dateAndTime(a, b) {
            const form = $("#formappointmentUser");
            console.log(form)
            $("#date").val(a)
            $("#time").val(b)
            form.submit();


        }
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
        integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{--  <script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>  --}}

</html>
