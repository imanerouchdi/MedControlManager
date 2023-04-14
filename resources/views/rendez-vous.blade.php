<h1>ff</h1>


{{--  @extends('componentPage.index')
@section('Rendez-vous')  --}}

{{--  <div>
  <h1 class="center">Available Appointments</h1>
  <div class="row">
    <div class="col 1">
      <h5>jan</h5>
      @foreach (['11:00','11:30','12:00'] as $time)
          @csrf
      
      <form action="" method="post">
        <input type="hidden" name="date" value="2022-01-01">
        <input type="hidden" name="time" value="{{$time}}">
        <button class="wave-effect waves-light btn-info darken-2" type="submit">
          {{$time}}
        </button>
        <br><br>
      </form>
      @endforeach
    </div>
  </div>
</div>  --}}

<div>
  <h1 class="center">Available Appointments</h1>
  <div class="row">
    <div class="col 1">
      <h5>jan</h5>
      @foreach ($available_times as $time)
      <form action="" method="post">
        @csrf
        <input type="hidden" name="date" value="2022-01-01">
        <input type="hidden" name="time" value="{{$time}}">
        <button class="wave-effect waves-light btn-info darken-2" type="submit">
          {{$time}}
        </button>
        <br><br>
      </form>
      @endforeach
    </div>
  </div>
</div>











{{--  @endsection  --}}