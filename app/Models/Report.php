<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Appointment;

class Report extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    public $incrementing = false;

    public function patient(){
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function appointment(){
        return $this->hasOne(Appointment::class);
    }
}
