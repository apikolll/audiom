<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Session;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sessions(){
        return $this->belongsToMany(Session::class, 'sessions_schedules', 'schedule_id', 'session_id');
    }
}
