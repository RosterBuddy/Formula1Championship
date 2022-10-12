@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

          <!-- Driver Position -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Driver Championship Position <span></span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                  </div>
                  <div class="ps-3">
                    <h6>P{{$driverposition[0]->Row ?? '0'}}</h6>
                    <span class="small pt-1 fw-bold">{{$driverposition[0]->points ?? '0'}}</span> <span class="text-muted small pt-2 ps-1">points</span>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Driver Position -->

          <!-- Team Position -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">Team Championship Position <span></span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-3">
                    <h6>P{{$teamposition[0]->Row ?? '0'}}</h6>
                    <span class="small pt-1 fw-bold">{{$teamposition[0]->points ?? '0'}}</span> <span class="text-muted small pt-2 ps-1">points</span>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Team Position -->

          <!-- Avg Finishing Position -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">
              <div class="card-body">
                <h5 class="card-title">Average Finishing Position <span></span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>P{{$avg ?? '0'}}</h6>
                    {{-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> --}}
                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Avg Finishing Position -->

          <!-- Driver Standings -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">
              <div class="card-body">
                <h5 class="card-title">Driver Standings <span></span></h5>
                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">Position</th>
                      <th scope="col">Driver</th>
                      <th scope="col">Team</th>
                      <th scope="col">Points</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $count = 0;
                    @endphp
                    @foreach($drivers as $driver)
                    @php
                        $count++
                    @endphp
                        <tr>
                            <th scope="row">{{$count}}</th>
                            <td>{{$driver->drivers->name}}</td>
                            <td>{{$driver->drivers->teams->name}}</td>
                            <td>{{$driver->points}}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div><!-- End Driver Standings -->
        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">

        {{-- <!-- Latest News -->
        <div class="card">

          <div class="card-body">
            <h5 class="card-title">Latest News <span>| Today</span></h5>

            <div class="activity">

              <div class="activity-item d-flex">
                <div class="activite-label">32 min</div>
                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                <div class="activity-content">
                  Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label">56 min</div>
                <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                <div class="activity-content">
                  Voluptatem blanditiis blanditiis eveniet
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label">2 hrs</div>
                <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                <div class="activity-content">
                  Voluptates corrupti molestias voluptatem
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label">1 day</div>
                <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                <div class="activity-content">
                  Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label">2 days</div>
                <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                <div class="activity-content">
                  Est sit eum reiciendis exercitationem
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label">4 weeks</div>
                <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                <div class="activity-content">
                  Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                </div>
              </div><!-- End activity item-->

            </div>

          </div>
        </div><!-- End Latest News --> --}}

        <!-- Team Standings -->
        <div class="card">
          <div class="card-body pb-0">
            <h5 class="card-title">Team Standings <span></span></h5>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col">Position</th>
                  <th scope="col">Team</th>
                  <th scope="col">Points</th>
                </tr>
              </thead>
              <tbody>
              @php
                  $count = 0;
              @endphp
              @foreach($teams as $team)
                @php
                  $count++
                @endphp
                  <tr>
                    <th scope="row">{{$count}}</th>
                    <td>{{$team->teams->name}}</td>
                    <td>{{$team->points}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>

          </div>
        </div><!-- End Team Standings-->

      </div><!-- End Right side columns -->

    </div>
  </section>
@endsection
