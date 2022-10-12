<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DriverStandings;
use App\Models\Drivers;
use App\Models\Results;
use DB;

class driver_standings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:driverstandings';

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
    }
}
