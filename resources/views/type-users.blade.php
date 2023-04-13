<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
</head>
<body>

  <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="row">
      <div class="col-12 text-center mb-5">
        <h1>Welcome to My Page</h1>
      </div>
      <div class="col-12 col-md-4 text-center mb-5">
        <a href="{{route('login','user')}}">
          <img src="/assets/img/user.png" class="w-25 me-3">
          
        </a>
      </div>
      <div class="col-12 col-md-4 text-center mb-5">
        <a href="{{route('login','assistant')}}">
          <img src="/assets/img/female.png" class="w-25 me-3">
          
        </a>
      </div>
      <div class="col-12 col-md-4 text-center mb-5">
        <a href="{{route('login','medecin')}}">
          <img src="/assets/img/doctor.png" class="w-25 me-3">
        </a>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
