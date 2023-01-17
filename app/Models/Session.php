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

    protected $fillable = [
        'cabin_id',
        'starttime',
        'endtime'
    ];

    // public function getEventStartAttribute()
    // {
    //     return $this->date_of_event->format('F j, Y') . ' ' .$this->start->format('g:i A');
    // }

    // public function cabin(){
    //     return $this->belongsToMany(Cabin::class);
    // }

    // public function appointment(){
    //     return $this->belongsTo(Appointment::class);
    // }


    public function appointments(){
        return $this->hasMany(Appointments::class);
    }

}
