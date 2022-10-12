<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    use HasFactory;

    protected $table = 'race_results';

    protected $fillable = [ 'race_id', 'driver_id', 'team_id', 'position', 'fastest_lap', 'points' ];

    public function driver()
    {
        return $this->hasOne(Drivers::class, 'id', 'driver_id');
    }

    public function fastest_lap_check()
    {
        if($this->fastest_lap == 1){
            if($this->position <= 10 && $this->position != "DNS" && $this->position != "DNF" && $this->position != "DQ"){
                return "True";
            }else{
                return "True (Outside Top 10)";
            }
        }else{
            return "False";
        }
    }

    public function positions()
    {
        if($this->position == 97){
            return "DNF";
        }elseif($this->position == 98){
            return "DNS";
        }elseif($this->position == 99){
            return "DQ";
        }else{
            return $this->position;
        }
    }
}
