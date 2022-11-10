@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="table-responsive">
            <table class="main-table text-center table table-bordered">

                <tr>
                    <td scope="col">{{__('messages.id')}}</td>
                    <td scope="col">{{__('messages.name')}}</td>
                    <td scope="col">{{__('messages.price')}}</td>
                    <td scope="col">{{__('messages.details')}}</td>
                    <td scope="col">{{__('messages.offer photo')}}</td>

                </tr>
                @foreach($offers as $offer)
                    <tr>
                        <td>{{$offer->id}}</td>
                        <td>{{$offer->name}}</td>
                        <td>{{$offer->price}}</td>
                        <td>{{$offer->details}}</td>
                        <td>
                            <img src=" {{asset('images/offers/'.$offer->photo)}}" width="50px" height="60px">
                        </td>
                        <td>
                            <a href="{{url('offers/edit/'.$offer->id)}}" class="btn btn-success">{{__('messages.Edit')}}</a>
                            <a href="{{route('ajax_delete',$offer->id)}}" data_id = "{{$offer->id}}" id= "btn_delete" class="btn btn-danger">ajax-delete</a>

                        </td>

                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop
@section('script')
    <script type="application/javascript">
        $(document).on('click','#btn_delete',function (e){
            e.preventDefault(); //prevent any process and execute ajax
            var id = $('#btn_delete').attr('data_id');
            $.ajax({
                type:'post',
                enctype: 'multipart/form-data',
                url:"{{route('ajax_delete')}}",
                data :{
                    '_token' : "{{csrf_token()}}",
                    'id' :id,
                },
                processData :false,
                contentType:false,
                cache :false,
                success: function (data){

                    if(data.status == true){

                        $('#success_msg').show();
                    }
                },error: function (reject){

                },

            });
        });

    </script>

@stop


