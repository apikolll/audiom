<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cabin;
use App\Models\Appointment;
use App\Models\Clinic;

class Session extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function appointments(){
        return $this->hasMany(Appointments::class);
    }
    
    public function schedules(){
        return $this->belongsToMany(Schedule::class, 'sessions_schedules', 'session_id', 'schedule_id');
    }

}
