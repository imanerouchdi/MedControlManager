<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row center">
            <h1 class="center">bussinessHours</h1>
        </div>
        <div class="row d-flex">
            <form action="{{route ('rendez-vous.store')}}" method="POST">
                @method('POST')
               
            @csrf
            @foreach ($bussinessHours as $bussinessHour )
                <div class="col s3">
                    <h4>{{$bussinessHour->day}}</h4>
                </div>
                <input type="hidden" name="data[{{$bussinessHour->day}}][day]" value="{{$bussinessHour->day}}"/>
                <div class="input-field col s3">
                    <input type="datetime" class="timepicker" name="data[{{$bussinessHour->day}}][from]"  value="{{$bussinessHour->from}}"/>
                </div>
                <div class="input-field col s3">
                    <input type="datetime" name="data[{{$bussinessHour->day}}][to]" value="{{$bussinessHour->to}}"/>
                </div>
                <div class="input-field col s3">
                    <input type="numbre" name="data[{{$bussinessHour->day}}][step]" value="{{$bussinessHour->step}}"/>
                </div>
                <div class="input-field col s3">
                    <p>
                        <label for="">
                            <input type="checkbox" class="filled-in" name="data[{{$bussinessHour->day}}][off]" @checked($bussinessHour->off)/>
                            <span>OFF</span>
                        </label>
                    </p>
                </div>
            @endforeach()
                <div class="col s12">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    
       
        
            {{--  <h4>{{$bussinessHour->day}}</h4>  --}}
        
                {{--  data[{{$bussinessHour->day}}][name]  --}}
    </div>
</body>
</html>