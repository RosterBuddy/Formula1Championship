@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <div class="row">
                <div class="col">My Reports</div>
                <div class="col text-right"><a class="btn btn-primary" href="{{route('fia.report_create')}}">Create a report</a></div>
            </div>
        </h5>

      <!-- Table with stripped rows -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Report ID</th>
            <th scope="col">Title</th>
            <th scope="col">Status</th>
            <th scope="col">Opened Date</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr>
                    <th scope="row">{{$report->id}}</th>
                    <td>{{substr($report->description, 0, 50)}}...</td>
                    <td>PENDING RESPONSE</td>
                    <td>2022-10-12 23:00</td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
