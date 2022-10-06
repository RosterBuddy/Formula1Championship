@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <div class="row">
                    <div class="col">Manage Races</div>
            </div>
            </h5>
            <table class="text-center table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Start Time</th>            
                    <th scope="col">Active</th>
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
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Ciaran Breen</td>
                <td>McLaren</td>
                <td>26</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Lando Norris</td>
                <td>McLaren</td>
                <td>20</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Max Verstappen</td>
                <td>Red Bull</td>
                <td>15</td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>David Ward</td>
                <td>Mercedes</td>
                <td>12</td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td>Davin Crawford</td>
                <td>Mercedes</td>
                <td>10</td>
              </tr>
            </tbody>
          </table>
          <!-- End Race Results -->

        </div>
      </div>
@endsection