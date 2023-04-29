<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    
    <nav class="navbar navbar-light navbar-expand-md navbar-shrink py-3 d-felx justify-content-center " id="mainNav">
        <div class="">
            <a class="navbar-brand d-flex align-items-center" href="/">
                {{--  <span>Imane</span>  --}}
            </a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
                <span class="visually-hidden">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="integrations.html">Rendez-vous</a></li>
                    <li class="nav-item"><a class="nav-link" href="#apropos">A propos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact_nous">Contact-nous</a></li>
                    @if (Route::has('login'))
                        @auth
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle second-text fw-bold" href="#"
                                            id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fas fa-user me-2"></i></a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="{{ route('profile.show') }}"
                                                    :active="request() - > routeIs('profile.show')">Profile </a></li>
                                            <li>
                                                <form method="POST" action="{{ route('logout') }}" x-data>
                                                    @csrf
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        @else
                        @endauth
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Connexion</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">enregistrer</a></li>
                    @endif
                </ul>
    
            </div>
        </div>
    </nav>
    @if (session('status'))
        <div class="alert alert-success">
            <p>{{ session('status') }}</p>
        </div>
        @endif
    <div class="container mt-5 px-5">
        <div class="card shadow rounded border-0">
            <div class="card-body">
                <h2 class="card-title text-start mb-4">Mes rendez-vous</h2>
                <form class="mx-2 my-1" action="{{route('appointmentUser.store')}}" method="POST">
                    @csrf 
                    @method('POST')
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Heure</th>
                                <th scope="col">Nom Prenom </th>
                                <th scope="col">CIN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $appointment)
                            <tr>
                                {{--  <th scope="row">{{$appointment->id}}</th>  --}}
                                <td>{{$appointment->dateRdv}}</td>
                                <td>{{$appointment->heureRdv}}</td>
                                <td>@mdo</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>




                </form>
            </div>
        </div>
    </div>
        

        

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

    </body>

    </html>
