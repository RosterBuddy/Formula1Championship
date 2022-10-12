<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drivers;
use App\Models\Reports;
use App\Models\Race;

class FIAController extends Controller
{
    public function report_overview()
    {
        $reports = Reports::all();
        return view('fia.reports.overview', compact('reports'));
    }

    public function report_create()
    {
        $drivers = Drivers::all();
        $races = Race::all();
        return view('fia.reports.create', compact('drivers', 'races'));
    }
    
    public function report_store(Request $request)
    {        
        Reports::create([            
            'race_id' => $request->event,
            'reporter_id' => $request->reporter_id,
            'reportee_id' => $request->reportee_id,
            'description' => $request->description,
            'reference' => $request->reference,
            'status' => 1
        ]);

        notify()->success('Report Created');
        return redirect(route('fia.report_overview'));
    }
}
