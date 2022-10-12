@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Driver Championship Standings</h5>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Team</th>
            <th scope="col">Points</th>
          </tr>
        </thead>
        <tbody>
            @php
                $count = 0;
            @endphp
            @foreach($drivers as $driver)
            @php
                $count++
            @endphp
                <tr>
                    <th scope="row">{{$count}}</th>
                    <td>{{$driver->drivers->name}}</td>
                    <td>{{$driver->drivers->teams->name}}</td>
                    <td>{{$driver->points}}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
@endsection