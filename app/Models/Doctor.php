<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Report;

class Doctor extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $fillable = [
    //     'name',
    //     'gender',
    //     'race',
    //     'contact',
    //     'address',
    // ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function appointment(){
        return $this->hasOne(Appointment::class);
    }

    public function report(){
        return $this->hasMany(Report::class);
    }
}
