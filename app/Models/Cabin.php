<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Session;
use App\Models\Appointment;
use App\Models\Clinic;

class Cabin extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'cabin',
        'status'
    ];

    public function appointments(){
        return $this->hasMany(Appointments::class);
    }

}
