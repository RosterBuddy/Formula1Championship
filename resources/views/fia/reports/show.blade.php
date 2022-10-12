@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Report ID {{$report->id}} from {{$report->race->name}}</h5>

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
@endsection
