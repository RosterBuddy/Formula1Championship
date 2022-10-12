<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamStandings extends Model
{
    use HasFactory;

    protected $table = 'team_standings';

    protected $fillable = [ 'team_id', 'points'];

    public function teams() {
        return $this->hasOne(Team::class, 'id', 'team_id');
    }
}
