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
        <div class="text-center">
          @if ($report->status < 4)
            <a href="{{route('fia.report_withdraw', $report->id)}}" type="submit" class="btn btn-warning">Withdraw</a>
          @endif          
        </div>
    </div>
  </div>
@endsection
