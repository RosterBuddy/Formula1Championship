<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Race;
use App\Models\Drivers;

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
        notify()->success('Welcome to Laravel Notify ⚡️');
        return redirect(route('admin.race.race_create'));
    }

    public function race_show($id)
    {
        $race = Race::find($id);
        return view('admin.race.show', compact('race'));
    }

    public function drivers_overview()
    {
        $drivers = Drivers::all();
        return view('admin.drivers.overview', compact('drivers'));
    }
}
