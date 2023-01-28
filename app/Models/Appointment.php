<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Session;
use App\Models\Schedule;
use App\Models\Report;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $incrementing = false;

    public function sessions(){
        return $this->belongsTo(Session::class, 'session_id');
    }

    public function patient(){
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function schedule(){
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }

    public function report(){
        return $this->belongsTo(Report::class, 'report_id');
    }

}
