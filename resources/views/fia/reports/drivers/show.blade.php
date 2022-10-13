@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <div class="row">
                <div class="col">Report ID {{$report->id}} from {{$report->race->name}}</div>
                <div class="col text-right"><span style="color:white;" class="btn btn-{{$report->status_color()}}">{{$report->status_text()}}</span></div>
            </div>
        </h5>

        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Reporter</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputText" value="{{$report->reporter->name}}" disabled>
          </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Reportee</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputText" value="{{$report->reportee->name}}" disabled>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword" class="col-sm-2 col-form-label">Textarea</label>
            <div class="col-sm-10">
              <textarea class="form-control" style="height: 200px" disabled>{{$report->description}}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Reference</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputText" value="{{$report->reference}}" disabled>
            </div>
        </div>
    </div>
  </div>

  @if($responses)
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">
          Previous Responses
      </h5>      
      <div class="row mb-3">
        @foreach($responses as $response)
          <label for="inputPassword" class="col-sm-2 col-form-label" >Response from {{$response->user->name}}</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="description" name="description" disabled>{{$response->description}}</textarea>
            <br>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  @endif

  <div class="card">
    <div class="card-body">
        <h5 class="card-title">
            FIA Response
        </h5>
        <form method="POST" action="{{route('fia.driver.report_respond', $report->id)}}">
        @csrf
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Offical</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value="{{Auth::user()->name}}" disabled>
            <input type="hidden" id="fia_offical" name="fia_offical" value="{{Auth::user()->id}}">
          </div>
        </div>        
        <div class="row mb-3">
          <label for="inputPassword" class="col-sm-2 col-form-label">Textarea</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="description" name="description"></textarea>
          </div>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-dark">Respond</button>
          <a onclick="return confirm('Are you sure you want to close this report?')" href="#" class="btn btn-warning">Close</a>
        </div>
      </form>
    </div>
  </div>
@endsection
