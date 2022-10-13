<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportResponse extends Model
{
    use HasFactory;

    protected $table = 'reports_response';

    protected $fillable = ['report_id', 'responder', 'description'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'responder');
    }
}
