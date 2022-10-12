@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Create a report</h5>

      <!-- Horizontal Form -->
      <form method="POST" action="{{route('fia.report_store')}}">
        @csrf
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Event</label>
            <div class="col-sm-10">
                <select class="form-select" name="event" id="event">
                    @foreach ($races as $race)
                        <option value="{{$race->id}}">{{$race->name}}</option>    
                    @endforeach
                </select>
            </div>
          </div>
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Your Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value="{{Auth::user()->name}}" disabled>
            <input type="hidden" id="reporter_id" name="reporter_id" value="{{Auth::user()->id}}">
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Report Driver</label>
          <div class="col-sm-10">
            <select class="form-select" name="reportee_id" id="reportee_id">
                @foreach ($drivers as $driver)
                    @if ($driver->name != Auth::user()->name && $driver->teams->name != "Not Set")
                        <option value="{{$driver->id}}">{{$driver->name}}</option>
                    @endif
                @endforeach
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <label for="description" class="col-sm-2 col-form-label">Description</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="description" name="description"></textarea>
          </div>
        </div>
        <div class="row mb-3">
            <label for="description" class="col-sm-2 col-form-label">Reference</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="reference" name="reference">
            </div>
          </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End Horizontal Form -->

    </div>
  </div>

@endsection
