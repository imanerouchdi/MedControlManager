{{--  @extends('RdvPanel.Card-rendez-vous')  --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">      --}}
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">  --}}
    <link rel="stylesheet" href="{{ asset('assets\css\HoureStyle.css') }}">  --}}
</head>

<body> 


      <div class="container-fluid px-0 px-sm-4 mx-auto">
        <div class="row justify-content-center mx-0">
            <div class="col col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Dr. John Smith</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Specialty: Cardiology</h6>
                        <p class="card-text">123 Main Street, Suite 101, Anytown, USA</p>
                    </div>
                        <div class="card border-0">
                          <form autocomplete="off">
                            <div class="card-body ">
                              <div class="mx-0 mb-0 row justify-content-sm-center justify-content-start px-1">
                                <input type="text" id="dp1" class="datepicker" placeholder="Pick Date" name="date" readonly><span class="fa fa-calendar icon"></span>
                              </div>
                            </div>
                            <div class="card-body p-3 p-sm-5">
                              <div class="row text-center mx-0">
                                <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">9:00AM</div></div>
                                <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">9:30AM</div></div>
                                <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">9:45AM</div></div>
                                <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">10:00AM</div></div>
                                <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">10:30AM</div></div>
                                <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">10:45AM</div></div>
                              </div>
                              <div class="row text-center mx-0">
                                <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">11:00AM</div></div>
                                <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">11:30AM</div></div>
                                <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">11:45AM</div></div>
                                <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">12:00PM</div></div>
                                <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">12:30PM</div></div>
                                <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">12:45PM</div></div>
                              </div>
                              <div class="row text-center mx-0">
                                <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">1:00PM</div></div>
                                <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">1:30PM</div></div>
                                <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">1:45PM</div></div>
                                <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">2:00PM</div></div>
                                <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">2:30PM</div></div>
                                <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">2:45PM</div></div>
                              </div>
                              <div class="row text-center mx-0">
                                <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">3:00PM</div></div>
                                <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">3:30PM</div></div>
                                <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">4:15PM</div></div>
                                <div class="col-md-2 col-4 my-1 px-2"><div class="cell py-1">5:00PM</div></div>
                              </div>
                            </div>
                          </form>
                        </div>
                </div>
            </div>
        </div>
    </div> 


    <div class="container-fluid px-0 px-sm-4 mx-auto">
      <div class="row justify-content-center mx-0">
        <div class="  col-md-6">
          <div class="card-sm ">
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
                             <div class="col-md-3">
                            <button type="button" class="btn w-100 mt-3 mb-3 border rounded-1 bg-light" >cc</button>
                          </div>
                          
                      </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    @section('heure')
    <div class="container-fluid px-0 px-sm-4 mx-auto">
      <div class="row justify-content-center mx-0">
        <div class="col col-md-4">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Dr. Rouchdi Imane</h5>
              <h6 class="card-subtitle mb-2 text-muted">Specialte: Cardiologie</h6>
              <p class="card-text">19 Fath , EL Hay Mohamadi, Youssoufia</p>
            </div>
            <div class="card border-0">
              <form autocomplete="off">
                <div class="card-body  ">
                  <div class="mx-0 mb-0 row justify-content-space d-flex px-1">
                    <span class="font-weight-normal  px-3 mt-2">Veuillez choisir la date du rendez-vous</span>
                    <input type="date" name="date" class=" shadow-sm" >
                  </div>
                  <div class="row text-center mx-0">
                      <div class="row">
                          <div class="col-md-3">
                              <button type="button" class="btn 3 border rounded-1 mt-1 mb-1 bg-light " >vvv</button>  
                          </div>
                         
                      </div>
                  </div>
                </div>
              </form>
              @endsection</body> 



                     










 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.js"></script>
<script src="{{ asset('assets\js\HoureJs.js') }}"></script>  --}}

</body>

</html> 
