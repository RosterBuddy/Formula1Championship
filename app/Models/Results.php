<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    use HasFactory;

    protected $table = 'race_results';

    protected $fillable = [ 'race_id', 'driver_id', 'position', 'fastest_lap', 'points' ];
}
