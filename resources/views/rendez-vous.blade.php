{{--  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
@include('componentPage.head');
</head>
<body>
  @include('componentPage.navbar')
    --}}
    @extends('componentPage.index')
    @section('Rendez-vous')

<div class="container ">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <form>
        <h3 class="text-center mb-4">Appointment to Doctor</h3>
        <div class="mb-3">
          <label for="nom-patient" class="form-label">Nom Patient:</label>
          <input type="text" class="form-control" id="nom-patient">
        </div>
        <div class="mb-3">
          <label for="prenom-patient" class="form-label">Prenom Patient:</label>
          <input type="text" class="form-control" id="prenom-patient">
        </div>
        <div class="mb-3">
          <label for="cin-patient" class="form-label">CIN de Patient:</label>
          <input type="text" class="form-control" id="cin-patient">
        </div>
        <div class="mb-3">
          <label for="date-rendezvous" class="form-label">Le jour de rendez-vous:</label>
          <input type="date" class="form-control" id="date-rendezvous">
        </div>
        <div class="mb-3">
          <label for="heure-rendezvous" class="form-label">Heure de rendez-vous:</label>
          <input type="time" class="form-control" id="heure-rendezvous">
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

{{--  @include('componentPage.footer')
@include('componentPage.footer-script')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>  --}}