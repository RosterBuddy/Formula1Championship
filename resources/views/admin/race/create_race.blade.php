@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Create a race</h5>
      <!-- Vertical Form -->
      <form method="post" action="{{route('admin.store_race')}}" class="row g-3">
        @csrf
        <div class="col-12">
          <label for="track" class="form-label">Track Name</label>
          <input type="text" class="form-control" name="track" id="track">
        </div>
        <div class="col-12">
          <label for="start_time" class="form-label">Start Time</label>
          <input type="datetime-local" class="form-control" id="start_time" name="start_time" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}T{{\Carbon\Carbon::now()->format('H:i')}}">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- Vertical Form -->
    </div>
  </div>

@endsection
