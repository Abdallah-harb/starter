
@extends('layouts.app')
@section('content')

    <div class="container">
        <h1 class="text-center"> Hospitals information's</h1>
        <div class="table-responsive">
            <table class="main-table text-center table table-bordered">

                <tr>
                    <td scope="col">#id</td>
                    <td scope="col">Name</td>
                    <td scope="col">Address</td>
                    <td scope="col">Content</td>

                </tr>
                @foreach($hospitals as $hospital)
                    <tr>
                        <td>{{$hospital->id}}</td>
                        <td>{{$hospital->name}}</td>
                        <td>{{$hospital->address}}</td>
                        <td>
                            <a href="{{route('hospital.doctors',$hospital->id)}}" class="btn btn-success">Show Doctors</a>
                            <a href="{{route('hospital.delete',$hospital->id)}}" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop
