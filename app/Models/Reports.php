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

    // 1 Opened
    // 2 Pending Review
    // 3 Open for Appeal
    // 4 Closed

    public function status_color()
    {
        switch($this->attributes['status']) {
            case '1': return 'info';
            case '2': return 'secondary';
            case '3': return 'warning';
            case '4': return 'success';
        }
    }

    public function status_text()
    {
        switch($this->attributes['status']) {
            case '1': return 'Opened';
            case '2': return 'Pending Review';
            case '3': return 'Open For Appeal';
            case '4': return 'Closed';
        }
    }
}
