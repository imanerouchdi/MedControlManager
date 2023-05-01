@extends('layouts.app-first')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-5">
                <h2 class="h2">Annuler un Rendez-Vous</h2>
            </div>
            <div class="pull-right mt-5">
                <a class="btn btn-success mb-4" href="{{ route('appointmentAdmin.create') }}"> Back</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col-6">
            <div class="input-group mb-3 w-100">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Result</label>
                </div>
                <input class="form-control " id="filterCIN" placeholder="CIN">
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="row">
        
        <table class="table table-bordered">
                <tr class="tr-style">
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenon</th>
                    <th>CIN</th>
                    <th>date Rendez-Vous</th>
                    <th>Heure</th>
                    <th width="280px" class="thBorderright">Action</th>
                </tr>
            <tbody class="dataApp">
                @foreach ($appointment as $key => $appointment)
                    <tr>
                       <td>{{ $appointment->id }}</td>
                        <td>{{ $appointment->nom }}</td>
                        <td>{{ $appointment->prenom }}</td>
                        <td>{{ $appointment->cin }}</td>
                        <td>{{ $appointment->dateRdv }}</td>
                        <td>{{ $appointment->heureRdv }}</td>
                        <td>
                            {{--  <form action="{{ route('appointmentAdmin.destroy', $appointment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                @can('appointment-delete')
                                <a href="javascript:void(0)" data-id='.$cinAppointment->id.' class="btn btn-warning delete-btn> Delete</a>

                                @endcan
                            </form>  --}}
                            <a href="javascript:void(0)" data-id='.$cinAppointment->id.' class="btn btn-warning delete-btn"> Delete</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tbody id='content' class="filterDataApp">

            </tbody>
        </table>
    </div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript">

    $(document).ready(function () {

        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();
            let idApp=$(this).data('id');
            //alert(idApp);

            if(confirm('delete? ')){
                $.ajax({
                    url     :"{{route('delete')}}",
                    method  :"DELETE",
                    data    : {id:idApp},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(res){
                        if(res.status=='success'){
                            $('.table').load(location.href+'.table');
                        }
                    }
                });
            }
        });


        $('#filterCIN').on('keyup',function(){
            $value=$(this).val();

            if($value){
                $('.dataApp').hide();
                $('.filterDataApp').show();
            }
            else{
                $('.dataApp').show();
                $('.filterDataApp').hide();
            }

            $.ajax({
                type:'get',
                url:'{{URL::to('filterCIN')}}',
                data:{'filterCIN':$value},

                success:function(data){
                    
                    $('#content').html(data)
                }
            });
        });
});

</script>
@endsection
