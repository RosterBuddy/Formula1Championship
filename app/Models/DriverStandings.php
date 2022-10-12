<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverStandings extends Model
{
    use HasFactory;
    
    protected $table = 'driver_standings';

    protected $fillable = [ 'driver_id', 'points'];

    public function drivers() {
        return $this->hasOne(Drivers::class, 'id', 'driver_id');
    }
}
