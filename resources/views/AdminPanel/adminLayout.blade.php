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
    @yield('links')
    <title>MedControlManager</title>
</head>

<body>
    @include('sweetalert::alert')

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="sideBar" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                <i class="fas fa-clinic-medical me-2"></i>MedControl</div>
            <div class="list-group list-group-flush my-3">
                <div class="d-flex justify-content-center">
                    {{--  <a href="{{route('patient.create') }}"
                        class=" btn  btn-primary  second-text active w-75 align-items-center ">+ Ajouter
                        Patient</a>  --}}

                </div>
                <a href="" class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fas fa-tachometer-alt me-2"></i>MedControl</a>
                    <div class="">
                        <a href="#" class="list-group-item list-group-item-action active" data-bs-toggle="collapse"
                            data-bs-target="#patient">
                            <i class="fas fa-chart-line me-2"></i>Patient
                            <i class="fa fa-caret-down float-end"></i></a>
                        <div class="collapse" id="patient">
                            <a href="{{route('patient.index')}}" class="list-group-item list-group-item-action listPatient"><i class="fas fa-hospital-user me-2"></i>All Patient</a>
                            <a href="{{route('patient.create') }}" class="list-group-item list-group-item-action listPatient"><i class="fas fa-user-injured me-2"></i>Ajouter patient</a>
                        </div>
                    </div>

                <div class="">
                    <a href="#" class="list-group-item list-group-item-action active" data-bs-toggle="collapse"
                        data-bs-target="#submenu1"><i class="far fa-calendar-alt me-2"></i>Appointment
                        <i class="fa fa-caret-down float-end"></i></a>
                    <div class="collapse" id="submenu1">
                        <a href="{{route('appointmentAdmin.create')}}" class="list-group-item list-group-item-action ">ajouter Appointment</a>
                        <a href="{{route('fullcalendar.index')}}" class="list-group-item list-group-item-action">Calendar</a>
                        <a href="{{route('showAllAppointment')}}" class="list-group-item list-group-item-action">Annule Appointment</a>
                    </div>
                </div>
                <div class="">
                    {{--  <a href="#" class="list-group-item list-group-item-action ">Main Menu</a>  --}}
                    <a href="#" class="list-group-item list-group-item-action active" data-bs-toggle="collapse"
                        data-bs-target="#consult">
                        <i class="fas fa-chart-line me-2"></i>Consultation
                        <i class="fa fa-caret-down float-end"></i></a>
                    <div class="collapse" id="consult">
                        <a href="{{route('appointmentConsultation')}}" class="list-group-item list-group-item-action">Add Consultation </a>
                        <a href="{{route('consultation.index')}}" class="list-group-item list-group-item-action"> all consultultation</a>
                    </div>
                </div>
                <div class="">
                    <a href="#" class="list-group-item list-group-item-action active" data-bs-toggle="collapse"
                        data-bs-target="#document">
                        <i class="fas fa-paperclip me-2"></i>Dossier Patient</a>
                    <div class="collapse" id="document">
                        <a class="list-group-item list-group-item-action" href="{{ route('dossierPatient.index') }}">All
                            dossier Patients</a>
                        <a class="list-group-item list-group-item-action" href="{{ route('dossierPatient.create') }}">add
                                dossier</a>
                        
                    </div>
                </div>
                <div class="">
                    <a href="#" class="list-group-item list-group-item-action active" data-bs-toggle="collapse"
                        data-bs-target="#document">
                        <i class="fas fa-paperclip me-2"></i>Document medicaux</a>
                    <div class="collapse" id="document">
                        <a class="list-group-item list-group-item-action" href="{{ route('users.index') }}">All
                            users</a>
                        <a class="list-group-item list-group-item-action" href="{{ route('roles.index') }}">Role &
                            Permission</a>
                    </div>
                </div>
                <div class="">
                    <a href="#" class="list-group-item list-group-item-action active" data-bs-toggle="collapse"
                        data-bs-target="#document">
                        <i class="fas fa-comment-dots me-2"></i>Analytics</a>
                    <div class="collapse" id="document">
                        <a class="list-group-item list-group-item-action" href="{{ route('users.index') }}">All
                            users</a>
                        <a class="list-group-item list-group-item-action" href="{{ route('roles.index') }}">Role &
                            Permission</a>
                    </div>
                </div>


                <div class="">
                    
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
            <nav class="navbar navbar-expand-lg navbar-light  py-4 px-4">
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
            <div class="container px-4 py-2">
                @yield('app')
            </div>

        </div>
    </div>
    <!-- /#page-content-wrapper -->bootstrap@5.0.2
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
