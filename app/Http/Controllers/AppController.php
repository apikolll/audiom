<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Patient;
use App\Models\Session;
use Illuminate\Support\Carbon;

class AppController extends Controller
{

    public function index(){
        return view('staff.appointment.index');
    }

    public function create(){
        return view('staff.appointment.create_appointment');
    }

    public function storeAppointment(Request $request){

         $request->validate([
            'name' => 'required',
            'session' => 'required',
            'cabin' => 'required',
            'description' => 'required'
        ]);

        $patient = new Patient();
        $patient->name = $request->name;
        $patient->save();

        $patient_id = Patient::where('name', $request->name)->pluck('id')->first();
        $schedules = Schedule::where('date', $request->date)->first();

        Appointment::create([
            'name' => $request->name,
            'patient_id' => $patient_id,
            'cabin' => $request->cabin,
            'description' => $request->description,
            'session_id' => $request->session,
            'schedule_id' => $schedules->id
        ]);

    }

    public function checkSessions(Request $request)
    {
        $request->validate([
            'date' => 'required'
        ]);

        $date = $request->date;
        $schedule = Schedule::where('date', $date)->first();
        $sessions = Schedule::with(['sessions'])->where('date', $date)->get();

        if (!$schedule) {
            return back()->with('error', 'No Schedule available for ' . Carbon::createFromFormat('Y-m-d', $request->date)->format('M d,
                Y'));
        }

        return view('staff.appointment.check_appointment', compact('sessions', 'date'));
    }

}
