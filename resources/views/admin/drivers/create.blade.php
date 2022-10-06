@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Add a driver</h5>
      <!-- Vertical Form -->
      <form method="post" action="{{route('admin.drivers_store')}}" class="row g-3">
        @csrf
        <div class="col-12">
          <label for="name" class="form-label">Driver Name</label>
          <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="col-12">
          <label for="team" class="form-label">Team</label>
          <select class="form-select" name="team" id="team">
            @foreach($teams as $team)
                <option value="{{$team->id}}">{{$team->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-12">
            <label for="user_id" class="form-label">Link Driver</label>
            <select class="form-select" name="user_id" id="user_id">
              @foreach($users as $user)
                  <option value="{{$user->id}}">{{$user->name}}</option>
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
