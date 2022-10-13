@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <div class="row">
                <div class="col">Driver Reports</div>
            </div>
        </h5>

      <!-- Table with stripped rows -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Report ID</th>
            <th scope="col">Title</th>
            <th scope="col">Reporter</th>
            <th scope="col">Status</th>
            <th scope="col">Opened Date</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr>
                    <th scope="row">{{$report->id}}</th>
                    <td><a href="{{route('fia.driver.driver_report_show', $report->id)}}">{{substr($report->description, 0, 50)}}...</a></td>
                    <td>{{$report->reporter->name}}</td>
                    <td><span class="btn btn-{{$report->status_color()}}">{{$report->status_text()}}</span></td>
                    <td>{{$report->created_at}}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
