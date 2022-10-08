@extends('layouts.app')
    @section('content')
        <div class="row justify-content-center">
            <div class="content">
            <div class="title m-b-md">
                <h1> {{__('messages.add offer')}}</h1>
            </div>

            <div class="alert alert-success text-center" id="success_msg" style="display: none">
                تم الحفظ بنجاح
            </div>
            <form class="form-horizontal" id="formoffer" method="POST" enctype="multipart/form-data" >
                @csrf
                <!--start photo  field-->
                <div class="form-group form-group-lg">
                    <label  class="col-sm-2 control-label">{{__('messages.offer photo')}}</label>
                    <div class="col-md-12 col-md-6">
                        <input type="file" required class="form-control" name="photo" id="uploaded_file" >
                    </div>
                    @error('photo')
                    <span class="invalid-feedback" role="alert">
                                    <strong> {{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!--end photo field -->
                <!--start item name field -->
                <div class="form-group form-group-lg">
                    <label  class="col-sm-2  control-label">{{__('messages.offer name')}}</label>
                    <div class="col-md-12 col-md-6">
                        <input type="text" class="form-control" name="name"
                               placeholder="offer Name" >
                    </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!--end item name field -->
                <!--start Description field -->
                <div class="form-group form-group-lg">
                    <label  class="col-sm-2  control-label">{{__('messages.offer price')}}</label>
                    <div class="col-md-12 col-md-6">
                        <input type="text" class="form-control" name="price"
                               placeholder="price of offer With $" >
                    </div>
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!--end Description field -->
                <!--start price field -->
                <div class="form-group form-group-lg">
                    <label  class="col-sm-2 control-label">{{__('messages.offer details')}}</label>
                    <div class="col-md-12 col-md-6">
                        <input type="text" class="form-control"
                               name="details"
                               placeholder="details or description of offer">
                    </div>
                    @error('details')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button id="offer_save" class="btn btn-primary btn-lg">Save</button>
                    </div>
                </div>
                <!--end submit button-->
            </form>

        </div>
        </div>


    @stop

@section('script')
    <script type="application/javascript">
        $(document).on('click','#offer_save',function (e){
            e.preventDefault(); //prevent any process and execute ajax
            var formData = new FormData($('#formoffer')[0]);
            $.ajax({
                type:'post',
                enctype: 'multipart/form-data',
                url:"{{route('ajax.store')}}",
                data :formData,
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

