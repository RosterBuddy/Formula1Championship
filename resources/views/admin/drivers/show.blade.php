@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Change {{$driver->name}} team</h5>
      <!-- Vertical Form -->
      <form method="post" action="{{route('admin.drivers_update', $driver->id)}}" class="row g-3">
        @csrf
        <div class="col-12">
          <label for="name" class="form-label">Driver Name</label>
          <input type="hidden" value="{{$driver->id}}" name="driver">
          <input type="text" class="form-control" name="name" id="name" value="{{$driver->name}}" readonly required>
        </div>
        <div class="col-12">
          <label for="team" class="form-label">Team</label>
          <select class="form-select" name="team" id="team">
            <option name="team" value="{{$driver->teams->id}}">{{$driver->teams->name}}</option>
            @foreach($teams as $team)
                @if($driver->teams->id != $team->id)
                    <option value="{{$team->id}}">{{$team->name}}</option>
                @endif
            @endforeach
          </select>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- Vertical Form -->
    </div>
  </div>

@endsection
