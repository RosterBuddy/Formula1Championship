@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <div class="row">
                    <div class="col">Manage Races</div>
                    <div class="col text-right"><a class="btn btn-primary" href="{{route('admin.race_create')}}">Create a race</a></div>
            </div>
            </h5>
            <table class="text-center table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Start Time</th>            
                    <th scope="col">Status</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Created At</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($races as $race)
                        <tr>
                            <th scope="row">{{$race->id}}</th>
                            <td><a href="{{route('admin.race_show', $race->id)}}"><b>{{$race->name}}</b></td>
                            <td>{{$race->start}}</td>                    
                            <td><span class="btn btn-{{$race->race_status_color()}}">{{$race->race_status()}}</span></td>
                            <td>{{$race->user->name}}</td>
                            <td>{{$race->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection