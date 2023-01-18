<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Session;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function schedules(){
        return $this->belongsToMany(Session::class, 'sessions_schedules', 'session_id', 'schedule_id');
    }
}
