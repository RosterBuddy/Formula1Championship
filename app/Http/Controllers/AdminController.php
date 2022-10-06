<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Race;
use App\Models\Drivers;
use App\Models\Team;
use App\Models\Results;

Use Carbon\Carbon;
use Auth;

class AdminController extends Controller
{
    public function race_overview()
    {
        $races = Race::orderBy('id', 'desc')->get();
        return view('admin.race.overview', compact('races'));
    }

    public function race_create()
    {
        return view('admin.race.create');
    }

    public function race_store(Request $request)
    {
        Race::create([            
            'name' => $request->track,
            'start' => $request->start_time,
            'user_id' => Auth::id(),
            'active' => 0,
        ]);
        notify()->success('The race ' . $request->track . ' has been saved for ' . Carbon::parse($request->start_time)->format('H:i d/m/Y'));
        return redirect(route('admin.race_create'));
    }

    public function race_show($id)
    {
        $race = Race::find($id);
        return view('admin.race.show', compact('race'));
    }

    public function race_results($id)
    {
        $race = Race::find($id);
        $drivers = Drivers::orderBy('team', 'asc')->get();
        $results = Results::where('race_id', $id)->get();
        return view('admin.race.results.overview', compact('race', 'drivers', 'results'));
    }

    public function insert_race_results(Request $request)
    {
        $checked = 0;
        
        if (isset($request->fastest_lap)) {
            $checked = 1;
        }
        $result = Results::create([
            'race_id' => $request->race_id,
            'driver_id' => $request->driver,
            'position' => $request->position,
            'fastest_lap' => $checked,
        ]);

        notify()->success('Result Sucessfully Saved');
        return redirect(route('admin.race_results', $request->race_id));
    }

    public function drivers_overview()
    {
        $drivers = Drivers::orderBy('team', 'asc')->get();
        return view('admin.drivers.overview', compact('drivers'));
    }

    public function drivers_create()
    {
        $teams = Team::all();
        $users = User::all();

        return view('admin.drivers.create', compact('teams', 'users'));
    }

    public function drivers_store(Request $request)
    {
        Drivers::create([            
            'name' => $request->name,
            'team' => $request->team,
            'user_id' => $request->user_id,
        ]);
        notify()->success($request->name . ' has been sucessfully added');
        return redirect(route('admin.drivers_overview'));

    }
}
