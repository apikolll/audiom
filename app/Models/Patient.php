<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Appointment;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'dob',
        'gender',
        'race',
        'contact',
        'address',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function appointment(){
        return $this->hasOne(Appointment::class);
    }
}
