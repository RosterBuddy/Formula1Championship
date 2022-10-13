@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <div class="row">
                    <div class="col">Manage Races</div>
                    <div class="col text-right"><a class="btn btn-primary" href="{{route('admin.race_results', $race->id)}}">Update Results</a></div>
            </div>
            </h5>
            <table class="text-center table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Start Time</th>            
                    <th scope="col">
                      Status
                      @if($race->active == 0)
                      (<a href="{{route('admin.race_activate', $race->id)}}">Activate Race</a>)
                    @elseif($race->active == 1)
                      (<a href="{{route('admin.race_complete', $race->id)}}">Complete Race</a>)
                    @elseif($race->active == 2)
                      (<a href="{{route('admin.race_activate', $race->id)}}">Activate Race</a>)
                    @endif
                    </th>
                    <th scope="col">Created By</th>
                    <th scope="col">Created At</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{$race->id}}</th>
                        <td>{{$race->name}}</td>
                        <td>{{$race->start}}</td>                    
                        <td><span class="btn btn-{{$race->race_status_color()}}">{{$race->race_status()}}</span></td>
                        <td>{{$race->user->name}}</td>
                        <td>{{$race->created_at}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-center card">
      <div class="card-body">
        <h5 class="card-title">Race Results</h5>
        <!-- Race Results -->
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Team</th>
              <th scope="col">Points</th>
              <th scope="col">Fastest Lap</th>
            </tr>
          </thead>
          <tbody>
            @foreach($results as $result)
            <tr>
              <th scope="row">{{$result->positions()}}</th>
              <td>{{$result->driver->name}}</td>
              <td>{{$result->driver->teams->name}}</td>
              <td>{{$result->points}}</td>
              <td>{{$result->fastest_lap_check()}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <!-- End Race Results -->
      </div>
    </div>
@endsection