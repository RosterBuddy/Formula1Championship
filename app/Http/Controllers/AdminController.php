<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Race;
use Auth;

class AdminController extends Controller
{
    public function manage_races()
    {
        $races = Race::orderBy('id', 'desc')->get();
        return view('admin.view_races', compact('races'));
    }

    public function create_race()
    {
        return view('admin.create_race');
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
        return redirect(route('admin.create_race'));
    }

    public function show_race($id)
    {
        $race = Race::find($id);
        return view('admin.show_race', compact('race'));
    }
}
