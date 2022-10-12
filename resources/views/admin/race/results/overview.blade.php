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
                <th scope="col">Fastest Lap</th>
              </tr>
            </thead>
            <tbody>
              @foreach($results as $result)
              <tr>
                <th scope="row">{{$result->position}}</th>
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


      @if($race->race_status() == "Active")
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Enter Race Result</h5>

            <!-- Horizontal Form -->
            <form id="race_results" method="POST" action="{{route('admin.insert_race_results', $race->id)}}">
              @csrf
              <div class="row mb-3">
                <label for="driver" class="col-sm-2 col-form-label">Driver Name</label>
                <div class="col-sm-10">
                  <select class="form-select" name="driver" id="driver">
                    @foreach($drivers as $driver)
                      <option value="{{$driver->id}}">{{$driver->name}} ({{$driver->teams->name}})</option>
                    @endforeach                    
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="position" class="col-sm-2 col-form-label">Finishing Position</label>
                <div class="col-sm-10">
                  <select class="form-select" name="position" id="position">
                    <option value="1">P1</option>
                    <option value="2">P2</option>
                    <option value="3">P3</option>
                    <option value="4">P4</option>
                    <option value="5">P5</option>
                    <option value="6">P6</option>
                    <option value="7">P7</option>
                    <option value="8">P8</option>
                    <option value="9">P9</option>
                    <option value="10">P10</option>
                    <option value="11">P11</option>
                    <option value="12">P12</option>
                    <option value="13">P13</option>
                    <option value="14">P14</option>
                    <option value="15">P15</option>
                    <option value="16">P16</option>
                    <option value="17">P17</option>
                    <option value="18">P18</option>
                    <option value="19">P19</option>
                    <option value="20">P20</option>
                    <option value="21">P21</option>
                    <option value="22">P22</option>
                    <option value="97">DNF</option>
                    <option value="98">DNS</option>
                    <option value="99">DQ</option>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="fastest_lap" class="col-sm-2 col-form-label">Fastest Lap</label>
                <div class="col-sm-10">
                  <input type="checkbox" class="form-check-input" name="fastest_lap" id="fastest_lap">
                </div>
              </div>         
              <input type="hidden" name="race_id" value="{{$race->id}}">               
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </form><!-- End Horizontal Form -->
          </div>
        </div>
      @endif
@endsection