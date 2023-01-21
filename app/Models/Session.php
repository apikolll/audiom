<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Session extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function schedules(){
        return $this->belongsToMany(Schedule::class, 'sessions_schedules', 'session_id', 'schedule_id');
    }

}
