


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{--  <link rel="stylesheet" href="{{ asset('assets\css\rdvstyle.css') }}">  --}}
        {{--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  --}}
        {{--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">  --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('assets\css\HoureStyle.css') }}">
        
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

    <div class=" MyCard">
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
                    <ul class="steper">
                        <li class="active">Personal Information</li>
                        <li>Education</li>
                        <li>Work Experience</li>
                        <li>User Photo</li>
                    </ul>
                    
    
                    
                </div>
                <div class="right-side">

                    <!-- 1 -->
                    <div class="main active">
                        <small><i class="fa fa-smile-o"></i></small>
                        <div class="text">
                            <h2>Veuillez choisir la date du rendez-vous</h2>
                        </div>
                        
                        <div class="buttons">
                            <button class="next_button" type="submit">Next Step</button>
                        </div>
                    </div>  
                    


                   
                    
                    <div class="main ">
                        <small><i class="fa fa-smile-o"></i></small>
                        <div class="text">
                            <h2>Your Personal Information</h2>
                            <p>Enter your personal information to get closer to copanies.</p>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" required require id="user_name">
                                <span>First Name</span>
                            </div>
                            <div class="input-div"> 
                                <input type="text" required>
                                <span>Last Name</span>
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" required require>
                                <span>Phone number</span>
                            </div>
                            <div class="input-div">
                                <input type="text" required require>
                                <span>E-mail Address</span>
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <select>
                                    <option>Select Country</option>
                                    <option>India</option>
                                    <option>France</option>
                                    <option>UK</option>
                                    <option>USA</option>
                                    <option>Germany</option>
                                    <option>Russia</option>
                                    <option>China</option>
                                    <option>Japan</option>
                                    <option>Pakistan</option>
                                </select>
                            
                            </div>
                            <div class="input-div">
                                
                                <select>
                                    <option>Select City</option>
                                    <option>New Delhi</option>
                                    <option>Paris</option>
                                    <option>London</option>
                                    <option>Washington D.C.</option>
                                    <option>Berlin</option>
                                    <option>Moscow</option>
                                    <option>Bejing</option>
                                    <option>Tokyo</option>
                                    <option>Islamabad</option>
                                </select>
                            </div>
                        </div>
                        <div class="buttons button_space">
                            <button class="back_button">Back</button>
                            <button class="next_button">Next Step</button>
                        </div>

                        
                    </div>

                   
                    <div class="main">
                        <small><i class="fa fa-smile-o"></i></small>
                        <div class="text">
                            <h2>Work Experiences</h2>
                            <p>Can you talk about your past work experience?</p>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" required require>
                                <span>Experience 1</span>
                            </div>
                            <div class="input-div"> 
                                <input type="text" required require>
                                <span>Position</span>
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" required>
                                <span>Experience 2</span>
                            </div>
                            <div class="input-div">
                                <input type="text" required>
                                <span>Position</span>
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" required>
                                <span>Experience 3</span>
                            </div>
                            <div class="input-div">
                                <input type="text" required>
                                <span>Position</span>
                            </div>
                        </div>
                        <div class="buttons button_space">
                            <button class="back_button">Back</button>
                            <button class="next_button">Next Step</button>
                        </div>
                    </div>
                    
                    
                    
                    <div class="main">
                        <small><i class="fa fa-smile-o"></i></small>
                        <div class="text">
                            <h2>User Photo</h2>
                            <p>Upload your profile picture and share yourself.</p>
                        </div>
                        <div class="user_card">
                            <span></span>
                            <div class="circle">
                                <span><img src="https://i.imgur.com/hnwphgM.jpg"></span>
                                
                            </div>
                            <div class="social">
                                <span><i class="fa fa-share-alt"></i></span>
                                <span><i class="fa fa-heart"></i></span>
                                
                            </div>
                            <div class="user_name">
                                <h3>Peter Hawkins</h3>
                                <div class="detail">
                                    <p><a href="#">Izmar,Turkey</a>Hiring</p>
                                    <p>17 last day . 94Apply</p>
                                </div>
                            </div>
                        </div>
                        <div class="buttons button_space">
                            <button class="back_button">Back</button>
                            <button class="submit_button">Submit</button>
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
    

    
  @include('Mylayout.footer')





<script src="{{ asset('assets\js\rdv.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.js"></script>
<script src="{{ asset('assets\js\HoureJs.js') }}"></script>  
@yield('script')

</body>
</html>
