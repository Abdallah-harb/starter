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
    <h1 class="text-center"> Show Offers </h1>
    @if(Session::has('error'))
         <div class="alert alert-danger text-center"  role="alert">
            {{Session::get('error')}}
        </div>
    @endif
    @if(Session::has('delete-success'))

        <div class="alert alert-danger text-center" role="alert">
            {{Session::get('delete-success')}}
        </div>
    @endif
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
                    <a href="{{route('offer.delete',$offer->id)}}" class="btn btn-danger">{{__('messages.Delete')}}</a>

                </td>

            </tr>
            @endforeach
        </table>
    </div>
    </body>
</html>
