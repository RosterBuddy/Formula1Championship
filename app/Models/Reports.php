<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = ['race_id', 'reporter_id', 'reportee_id', 'description', 'reference', 'status' ];

    
    public function reporter() {
        return $this->hasOne(Drivers::class, 'id', 'reporter_id');
    }

    public function reportee() {
        return $this->hasOne(Drivers::class, 'id', 'reportee_id');
    }

    public function race()
    {
        return $this->hasOne(Race::class, 'id', 'race_id');
    }
}
