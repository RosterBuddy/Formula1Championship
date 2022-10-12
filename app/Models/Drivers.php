<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
    use HasFactory;

    protected $table = 'drivers';

    protected $fillable = [ 'name', 'team', 'user_id'];

    public function teams()
    {
        return $this->hasOne(Team::class, 'id', 'team');
    }

    public function real_checker()
    {
        if($this->user_id != 0){
            return "Real";
        }else{
            return "AI";
        }
    }
}
