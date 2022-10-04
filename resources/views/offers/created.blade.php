<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Offers</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-nav" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=""> Home</a>
            </div>
            <div class="collapse navbar-collapse" id="app-nav">
                <ul class="nav navbar-nav">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>



            </div>
        </div>
    </nav>


        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    {{__('messages.add offer')}}
                </div>

                @if(Session::has('success'))
                    <span>{{Session::get('success')}}</span>
                @endif
                <form class="form-horizontal" method="POST" action="{{route('offer.store')}}" enctype="multipart/form-data" >
                    @csrf
                    <!--start photo  field -->
                    <div class="form-group form-group-lg">
                        <label  class="col-sm-2 control-label">{{__('messages.offer photo')}}</label>
                        <div class="col-sm-10 col-md-6">
                            <input type="file" class="form-control" name="photo" >
                        </div>
                        @error('photo')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!--end photo field -->
                    <!--start item name field -->
                    <div class="form-group form-group-lg">
                        <label  class="col-sm-2 control-label">{{__('messages.offer name')}}</label>
                        <div class="col-sm-10 col-md-6">
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
                        <label  class="col-sm-2 control-label">{{__('messages.offer price')}}</label>
                        <div class="col-sm-10 col-md-6">
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
                        <div class="col-sm-10 col-md-6">
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
                            <input type="submit" class="btn btn-primary btn-lg"
                                   value="Save">
                        </div>
                    </div>
                    <!--end submit button-->
                </form>

            </div>
        </div>
    </body>
</html>
