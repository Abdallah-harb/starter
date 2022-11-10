
@extends('layouts.app')
@section('content')

    <div class="container">
        <h1 class="text-center"> {{$hospital->name}} Doctors information's</h1>
        <div class="table-responsive">
            <table class="main-table text-center table table-bordered">

                <tr>
                    <td scope="col">#id</td>
                    <td scope="col">Name</td>
                    <td scope="col">Specialist</td>
                    <td>Info</td>
                </tr>
                @foreach($doctors as $doctor)
                    <tr>
                        <td>{{$doctor->id}}</td>
                        <td>{{$doctor->name}}</td>
                        <td>{{$doctor->spechalist}}</td>
                        <td> <a href="{{url('hospitals')}}" class="btn btn-info">Back</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop
