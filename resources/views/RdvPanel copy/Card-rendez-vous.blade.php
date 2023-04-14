<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('assets\css\rdvstyle.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        //
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets\css\HoureStyle.css') }}">
    </head>
<body>
    
    <div class="container mt-5">
    <div class="card">
        <div class="form">
            <div class="left-side">
                <div class="left-heading">
                    <h3>indeed</h3>
                </div>
                <div class="steps-content">
                    <h3>Step <span class="step-number">1</span></h3>
                    <p class="step-number-content active">Enter your personal information to get closer to companies.</p>
                    <p class="step-number-content d-none">Get to know better by adding your diploma,certificate and education life.</p>
                    <p class="step-number-content d-none">Help companies get to know you better by telling then about your past experiences.</p>
                    <p class="step-number-content d-none">Add your profile piccture and let companies find youy fast.</p>
                </div>
                <ul class="progress-bar">
                    <li class="active">Personal Information</li>
                    <li>Education</li>
                    
                    <li>User Photo</li>
                </ul>
            </div>
            <div class="right-side">
                <div class="main active">
                    <div class="text">
                        <h2>Information Personnelle</h2>
                        <p>Veuillez remplir tous les champs requis pour compléter le formulaire.</p>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" required require id="user_name" name="nomPatient">
                            <span>Nom</span>
                        </div>
                        <div class="input-div"> 
                            <input type="text" required name="prenomPatient">
                            <span>Prenom</span>
                        </div>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" required require name="telefonePatient">
                            <span>Telefone</span>
                        </div>
                        <div class="input-div">
                            <input type="text" required require name="cin">
                            <span>CIN</span>
                        </div>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" required require name="name="adressPatient"">
                            <span>Adress</span>
                        </div>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <select  name="sexePatient">
                                <option >sex</option>
                                <option value="monsieur">Monsieur</option>
                                <option value="madane">Madame</option>
                                <option value="autre">Autre</option>
                            </select>
                        </div>
                        <div class="input-div">
                            <input type="date" class="form-control shadow-sm" id="dateNaissancePatient" name="dateNaissancePatient" required>
                        </div>
                    </div>
                    <div class="buttons">
                        <button class="next_button">Next Step</button>
                    </div>
                </div>
                <div class="main">
                    <h1>jjjj</h1>
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
                                          {{--  @foreach ($available_times as $time)   --}}
                                            <div class="col-md-3">
                                              {{--  <button type="button" class="btn 3 border rounded-1 mt-1 mb-1 bg-light " >{{$time}}</button>  --}}
                                            </div>
                                            {{--  @endforeach   --}}
                                             {{--  w-100  --}}
                                        </div>
                                    </div>
                                  </div>
                                </form>                    
                    <div class="buttons button_space">
                        <button class="back_button">Back</button>
                        <button class="next_button">Next Step</button>
                    </div>
                </div>
                <div class="main">
                     <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                         <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                    </svg>
                     
                    <div class="text congrats">
                        <h2>Congratulations!</h2>
                        <p>Thanks Mr./Mrs. <span class="shown_name"></span> your information have been submitted successfully for the future reference we will contact you soon.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets\js\rdv.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
//
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.js"></script>
<script src="{{ asset('assets\js\HoureJs.js') }}"></script>  


</body>
</html>
