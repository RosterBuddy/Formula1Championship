@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <div class="row">
                    <div class="col">Manage Drivers</div>
                    <div class="col text-right"><a class="btn btn-primary" href="{{route('admin.drivers_create')}}">Add a driver</a></div>
            </div>
            </h5>
            <table class="text-center table table-hover">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Team</th>            
                    <th scope="col">Type</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($drivers as $driver)
                        <tr>
                            <td>{{$driver->name}}</td>
                            <td>{{$driver->team}}</td>                    
                            <td>{{$driver->real_checker()}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection