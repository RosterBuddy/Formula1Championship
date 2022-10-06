<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Race;
use App\Models\Drivers;

use Auth;

class AdminController extends Controller
{
    public function manage_races()
    {
        $races = Race::orderBy('id', 'desc')->get();
        return view('admin.race.view_races', compact('races'));
    }

    public function create_race()
    {
        return view('admin.race.create_race');
    }

    public function store_race(Request $request)
    {
        Race::create([            
            'name' => $request->track,
            'start' => $request->start_time,
            'user_id' => Auth::id(),
            'active' => 0,
        ]);
        notify()->success('Welcome to Laravel Notify ⚡️');
        return redirect(route('admin.race.create_race'));
    }

    public function show_race($id)
    {
        $race = Race::find($id);
        return view('admin.race.show_race', compact('race'));
    }

    public function drivers_overview()
    {
        $drivers = Drivers::all();
        return view('admin.drivers.overview', compact('drivers'));
    }
}
