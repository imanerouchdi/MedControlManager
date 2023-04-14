  @extends('components.RDV')  
@section('RDV')  



    {{--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">  --}}
    
    {{--  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{ asset('assets\css\HoureStyle.css') }}">
    <script src="{{ asset('assets\js\HoureJs.js') }}"></script>



      <div class="container-fluid px-0 px-sm-4 mx-auto">
        <div class="row justify-content-center mx-0">
          <div class="col col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Dr. John Smith</h5>
                <h6 class="card-subtitle mb-2 text-muted">Specialty: Cardiology</h6>
                <p class="card-text">123 Main Street, Suite 101, Anytown, USA</p>
              </div>
              <div class="card border-0">
                <form autocomplete="off">
                  <div class="card-body ">
                    <div class="mx-0 mb-0 row justify-content-space justify-content-start px-1">
                      <h5 class="font-weight-normal  px-3 mt-2">Veuillez choisir la date du rendez-vous</h5>
                      <input type="text" id="dp1" class="datepicker" placeholder="Pick Date" name="date" readonly><span class="fa fa-calendar icon"></span>
                    </div>
                  </div>
                  
                  <div class="card-body  ">
                    <div class="row text-center mx-0">
                        <div class="row">
                          {{--  @foreach ($available_times as $time) 
                            <div class="col-md-3">
                              <button type="button" class="btn w-100 mt-3 mb-3 border rounded-1 bg-light" >{{ $time }}</button>
                            </div>
                             @endforeach   --}}
                        </div>
                    </div>
                  </div>
                </form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.js"></script>

@endsection
