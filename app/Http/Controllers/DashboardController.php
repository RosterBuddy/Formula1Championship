<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DriverStandings;
use App\Models\TeamStandings;
use App\Models\Results;
use Auth;
use DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $driverposition = DB::table('driver_standings')
        ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY driver_id DESC) AS Row, points'))
        ->where('driver_id', Auth::id())
        ->get();


        $teamposition = DB::table('team_standings')
        ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY team_id DESC) AS Row, points'))
        ->where('team_id', Auth::user()->driver->teams->id)
        ->get();
        
        $avgfinish = Results::where('driver_id', Auth::user()->driver->id)->get();
        $avg = ceil($avgfinish->avg('position'));

        $drivers = DriverStandings::orderBy('points', 'desc')->get();

        $teams = TeamStandings::orderBy('points', 'desc')->get();

        return view('dashboard', compact('driverposition', 'teamposition', 'avg', 'drivers', 'teams'));
    }
}
