<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
    @yield('style')
    <title>MedControlManager</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>MedControl</div>
            <div class="list-group list-group-flush my-3">
                {{--  <button type="submit" class="btn btn-primary">Submit</button>  --}}
                <div class="d-flex justify-content-center">
                    {{--  <a class="btn btn-primary">Click me</a>  --}}
                    <a href="{{route('patient.create') }}"
                        class=" btn  btn-primary  second-text active w-75 align-items-center ">+ Ajouter
                        Patient</a>

                </div>
                <a href="" class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fas fa-tachometer-alt me-2"></i>MedControl</a>
                    <div class="">
                        <a href="#" class="list-group-item list-group-item-action active" data-bs-toggle="collapse"
                            data-bs-target="#patient">
                            <i class="fas fa-chart-line me-2"></i>Patient
                            <i class="fa fa-caret-down float-end"></i></a>
                        <div class="collapse" id="patient">
                            <a href="{{route('patient.index')}}" class="list-group-item list-group-item-action">All Patient</a>
                            <a href="{{route('patient.create') }}" class="list-group-item list-group-item-action">Ajouter patient</a>
                        </div>
                    </div>

                <div class="">
                    <a href="#" class="list-group-item list-group-item-action active" data-bs-toggle="collapse"
                        data-bs-target="#submenu1"><i class="far fa-calendar-alt me-2"></i>Rendez-vous
                        <i class="fa fa-caret-down float-end"></i></a>
                    <div class="collapse" id="submenu1">
                        <a href="#" class="list-group-item list-group-item-action">Item 1</a>
                        <a href="#" class="list-group-item list-group-item-action">Item 2</a>
                    </div>
                </div>
                <div class="">
                    {{--  <a href="#" class="list-group-item list-group-item-action ">Main Menu</a>  --}}
                    <a href="#" class="list-group-item list-group-item-action active" data-bs-toggle="collapse"
                        data-bs-target="#consult">
                        <i class="fas fa-chart-line me-2"></i>Consultation
                        <i class="fa fa-caret-down float-end"></i></a>
                    <div class="collapse" id="consult">
                        <a href="{{route('consultation.index')}}" class="list-group-item list-group-item-action">Ajouter consult</a>
                        <a href="" class="list-group-item list-group-item-action">Item 2</a>
                    </div>
                </div>
                <div class="">
                    {{--  <a href="#" class="list-group-item list-group-item-action ">Main Menu</a>  --}}
                    <a href="#" class="list-group-item list-group-item-action active" data-bs-toggle="collapse"
                        data-bs-target="#document">
                        <i class="fas fa-paperclip me-2"></i>Document Med</a>
                    <div class="collapse" id="document">
                        <a class="list-group-item list-group-item-action" href="{{ route('users.index') }}">All
                            users</a>
                        <a class="list-group-item list-group-item-action" href="{{ route('roles.index') }}">Role &
                            Permission</a>
                        <a class="list-group-item list-group-item-action" href="{{ route('roles.index') }}">Role &
                            Permission</a>
                    </div>
                </div>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gift me-2"></i>Dossier medicaux</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-comment-dots me-2"></i>Analytics</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-map-marker-alt me-2"></i>Calendar</a>

                <div class="">
                    {{--  <a href="#" class="list-group-item list-group-item-action ">Main Menu</a>  --}}
                    <a href="#" class="list-group-item list-group-item-action active" data-bs-toggle="collapse"
                        data-bs-target="#users"><i class="fas fa-users-cog me-2"></i> users
                        <i class="fa fa-caret-down float-end"></i></a>
                    <div class="collapse" id="users">
                        <a class="list-group-item list-group-item-action" href="{{ route('users.index') }}">All
                            users</a>
                        <a class="list-group-item list-group-item-action" href="{{ route('roles.index') }}">Role &
                            Permission</a>
                        <a class="list-group-item list-group-item-action" href="{{ route('roles.index') }}">Role &
                            Permission</a>
                    </div>
                </div>
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i> Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContents" aria-controls="navbarSupportedContents"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContents">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#"
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>
                                @if (Route::has('login'))
                                @endif
                            </a>
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
            </nav>
            <div class="container px-4 py-5">
                @yield('app')
            </div>

        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>
    @yield('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>
