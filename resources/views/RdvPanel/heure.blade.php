{{--  @extends('RdvPanel.Card-rendez-vous')  --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">  
    <link rel="stylesheet" href="{{ asset('assets\css\HoureStyle.css') }}"> 
</head>

<body> 


      <div class="container-fluid px-0 px-sm-4 mx-auto">
        <div class="row justify-content-center mx-0">
            <div class="col col-md-8">
                <div class="card">
                    <h5>sunday</h5>
                    <h4>1 jan</h4>
                        <div class="card border-0">
                          @foreach (['12:00','12:30'] as $time )
                          <form method="post" >
                             <input type="text" name="date" value="2023-04-29">
                              <input type="text" name="time" value="{{$time}}">
                              <button type="submit">{{$time}}</button>
                          </form>
                          @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div> 


    

    



                     










<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.js"></script>
<script src="{{ asset('assets\js\HoureJs.js') }}"></script> 

</body>

</html> 
