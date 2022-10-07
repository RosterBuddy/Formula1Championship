<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    protected $table = 'races';

    protected $fillable = [ 'name', 'start', 'user_id', 'active' ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function race_status_color()
    {
        switch($this->attributes['active']) {
            case '0': return 'danger';
            case '1': return 'success';
            case '2': return 'info';
        }
    }

    public function race_status()
    {
        switch($this->attributes['active']) {
            case '0': return 'Inactive';
            case '1': return 'Active';
            case '2': return 'Completed';
        }
    }
}
