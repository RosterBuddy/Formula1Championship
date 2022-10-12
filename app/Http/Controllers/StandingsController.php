<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DriverStandings;
use App\Models\TeamStandings;
use DB;

class StandingsController extends Controller
{
    public function driver_standings()
    {
        $drivers = DriverStandings::orderBy('points', 'desc')->get();
        return view('standings.drivers', compact('drivers'));
    }

    public function team_standings()
    {
        $teams = TeamStandings::orderBy('points', 'desc')->get();
        return view('standings.team', compact('teams'));
    }
}
