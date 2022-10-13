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

    public function status_color()
    {
        switch($this->attributes['status']) {
            case '1': return 'info';
            case '2': return 'secondary';
            case '3': return 'warning';
            case '4': return 'success';
            case '5': return 'primary';
        }
    }

    public function status_text()
    {
        switch($this->attributes['status']) {
            case '1': return 'Pending Review';
            case '2': return 'Response Sent';
            case '3': return 'Open For Appeal';
            case '4': return 'Closed';
            case '5': return 'Withdrawn';
        }
    }
}
