<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Staff;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
    ];

    public function patient(){
        return $this->hasOne(Patient::class);
    }

    public function doctor(){
        return $this->hasOne(Doctor::class);
    }

    public function staff(){
        return $this->hasOne(Staff::class);
    }
}
