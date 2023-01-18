<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Cabin;
use App\Models\Session;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'session'
    ];

    public function cabin(){
        return $this->belongsTo(Cabin::class, 'cabin_id', 'id');
    }

    public function session(){
        return $this->belongsTo(Session::class, 'session_id', 'id');
    }
}
