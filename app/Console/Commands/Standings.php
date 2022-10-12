<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DriverStandings;
use App\Models\TeamStandings;
use App\Models\Teams;
use App\Models\Drivers;
use App\Models\Results;
use DB;

class standings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:standings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $results = DB::table('race_results')
        ->select('driver_id', DB::raw('sum(points) AS points'))
        ->groupBy('driver_id')
        ->get();

        $result = json_decode(json_encode($results), true);

        foreach($results as $result){            
            $driverstanding = DriverStandings::updateOrCreate(
                ['driver_id' => $result->driver_id],
                ['points' => $result->points]
            );
            $driverstanding->save();
        }

        $team_standings = DB::table('race_results')
        ->select('team_id', DB::raw('sum(points) AS points'))
        ->groupBy('team_id')
        ->get();

        $team_standing = json_decode(json_encode($team_standings), true);

        foreach($team_standings as $team){            
            $driverstanding = TeamStandings::updateOrCreate(
                ['team_id' => $team->team_id],
                ['points' => $team->points]
            );
            $driverstanding->save();
        }
    }
}
