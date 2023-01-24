<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Session;
use App\Models\User;
use Illuminate\Support\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{

    public function index(){
        $appointments = Appointment::all();
        if(auth()->user()->role === 'staff'){
            return view('staff.appointment.index', compact('appointments'));
        }
        else if(auth()->user()->role === 'patient'){

            $id = auth()->user()->patient->id;
            $appointments = Appointment::where('patient_id', $id)->where('status', 'Pending')->get();
            return view('patient.bookAppointment', compact('appointments'));
        }
       
    }

    public function create(){
        return view('staff.appointment.create_appointment');
    }

    public function storeAppointment(Request $request){

         $request->validate([
            'patient' => 'required',
            'doctor' => 'required',
            'session' => 'required',
            'cabin' => 'required',
            'description' => 'required'
        ]);

        $sessionid = Appointment::pluck('session_id')->first();
        $cabinid = Appointment::pluck('cabin')->first();
        $scheduleid = Appointment::pluck('schedule_id')->first();     
        $schedules = Schedule::where('date', $request->date)->first();

        if($sessionid == $request->session && $cabinid == $request->cabin && $scheduleid == $schedules->id){
            return redirect()->route('app.create')->with('error','Please choose another cabin or session');
        }
        
        $id = IdGenerator::generate(['table' => 'appointments', 'length' => 6, 'prefix' => 'APP']);

        Appointment::create([
            'id' => $id,
            'patient_id' => $request->patient,
            'doctor_id' => $request->doctor,
            'cabin' => $request->cabin,
            'status' => 'Pending',
            'description' => $request->description,
            'session_id' => $request->session,
            'schedule_id' => $schedules->id
        ]);

        if(auth()->user()->role === 'staff'){
            return redirect()->route('app.index')->with('sucess', 'Successfully created');
        }else if(auth()->user()->role === 'patient'){
            return redirect()->route('app-patient.index')->with('success', 'Successfully created');
        }
       
    }

    public function checkSessions(Request $request)
    {
        $request->validate([
            'date' => 'required'
        ]);

        $date = $request->date;
        $schedule = Schedule::where('date', $date)->first();
        $sessions = Schedule::with(['sessions'])->where('date', $date)->get();
        $patients = Patient::all();
        $doctors = Doctor::all();

        if (!$schedule) {
            return back()->with('error', 'No Schedule available for ' . Carbon::createFromFormat('Y-m-d', $request->date)->format('M d,
                Y'));
        }

        if(auth()->user()->role === 'staff'){
            return view('staff.appointment.check_appointment', compact('sessions', 'date', 'patients', 'doctors'));
        }else if(auth()->user()->role === 'patient'){
            return view('patient.addAppointment', compact('sessions', 'date', 'doctors'));
        }
        
    }

    public function show($id){
        $appointment = Appointment::find($id);

        if(auth()->user()->role === 'staff'){
            return view('staff.appointment.details_appointment', compact('appointment'));
        }else if(auth()->user()->role === 'patient'){
            return view('patient.detail', compact('appointment'));
        }
    }
       

    public function delete($id){
        $appointment = Appointment::find($id);
        $appointment->delete();

        if(auth()->user()->role === 'staff'){
            return redirect()->route('app.index')->with('success' ,'Successfully deleted');
        }else if(auth()->user()->role === 'patient'){
            return redirect()->route('app-patient.index')->with('success' ,'Successfully deleted');
        }
       
    }

    public function changeStatus(Request $request){

        $appointment = Appointment::find($request->app_id);
        $appointment->status = $request->status;
        $appointment->save();

        if($request->status === "Cancelled"){
            $appointment->delete();
        }

        return back();
    }

}
