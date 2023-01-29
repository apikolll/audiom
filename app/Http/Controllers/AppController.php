<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Session;
use App\Models\User;
use App\Mail\Notify;
use Illuminate\Support\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;



class AppController extends Controller
{

    public function index()
    {
        $appointments = Appointment::all();
        if (auth()->user()->role === 'staff') {
            return view('staff.appointment.index', compact('appointments'));
        } else if (auth()->user()->role === 'patient') {

            $id = auth()->user()->patient->id;
            $appointments = Appointment::where('patient_id', $id)->get();
            return view('patient.bookAppointment', compact('appointments'));
        }
    }

    public function create()
    {

        if (auth()->user()->role === "staff") {
            return view('staff.appointment.create_appointment');
        } else if (auth()->user()->role === "patient") {
            return view('patient.addAppointment');
        }
    }


    public function storeAppointment(Request $request)
    {

        $request->validate([
            'patient' => 'required',
            'doctor' => 'required',
            'session' => 'required',
            'cabin' => 'required',
            'description' => 'required'
        ]);

        $sessionid = Appointment::pluck('session_id')->first();
        $cabinid = Appointment::pluck('cabin')->first();
        $schedule = Schedule::where('date', $request->date)->first();
        $sessionid = Appointment::where('session_id', $request->session)->first();
        $cabinid = Appointment::where('cabin', $request->cabin)->first();
        $scheduleid = Appointment::where('schedule_id', $schedule->id)->first();

        if ($cabinid && $sessionid && $scheduleid) {
            if(auth()->user()->role == 'staff'){
                return redirect()->route('app.create')->with('error', 'Please choose another cabin or session');
            }elseif(auth()->user()->role == 'patient'){
                return redirect()->route('app-patient.create')->with('error', 'Please choose another cabin or session');
            }     
        }

        // if (!$cabinid == $request->cabin && !$sessionid == $request->session && !$scheduleid == $schedules->id) {
        //     return redirect()->route('app.create')->with('error', 'Please choose another cabin or session');
        // }

        $id = IdGenerator::generate(['table' => 'appointments', 'length' => 6, 'prefix' => 'APP']);

        Appointment::create([
            'id' => $id,
            'patient_id' => $request->patient,
            'doctor_id' => $request->doctor,
            'cabin' => $request->cabin,
            'status' => 'Pending',
            'description' => $request->description,
            'session_id' => $request->session,
            'schedule_id' => $schedule->id
        ]);

        if (auth()->user()->role == 'staff') {
            return redirect()->route('app.index')->with('sucess', 'Successfully created');
        } else if (auth()->user()->role == 'patient') {
            return redirect()->route('app-patient.index')->with('success', 'Successfully created');
        }
    }

    public function checkSessions(Request $request)
    {
        $request->validate([
            'date' => 'required'
        ]);
        $curDate = Carbon::now();
        // $curDate = Carbon::now()->format('M d, Y');

        if ($request->date <= $curDate) {
            return back()->with('error', 'Please select the date after ' . Carbon::createFromFormat('Y-m-d H:i:s', $curDate)->format('M d, Y'));
        }

        // $appointment = Appointment::where('patient_id', 1)->first();

        $date = $request->date;
        $schedule = Schedule::where('date', $date)->first();
        $sessions = Schedule::with(['sessions'])->where('date', $date)->get();
        $patients = Patient::all();
        $doctors = Doctor::all();

        if (!$schedule) {
            return back()->with('error', 'No Schedule available for ' . Carbon::createFromFormat('Y-m-d', $request->date)->format('M d,
                Y'));
        }


        // if(!$appointment->schedule_id == $schedule->id){
        //     return back()->with('error', 'Cannot set more than one appointment in the same day.');
        // }

        if (auth()->user()->role === 'staff') {
            return view('staff.appointment.check_appointment', compact('sessions', 'date', 'patients', 'doctors'));
        } else if (auth()->user()->role === 'patient') {
            return view('patient.addAppointment', compact('sessions', 'date', 'doctors'));
        }
    }

    public function show($id)
    {
        $appointment = Appointment::find($id);

        if (auth()->user()->role === 'staff') {
            return view('staff.appointment.details_appointment', compact('appointment'));
        } else if (auth()->user()->role === 'patient') {
            return view('patient.detail', compact('appointment'));
        } else {
            return view('doctor.detail-patient', compact('appointment'));
        }
    }


    public function delete($id)
    {
        $appointment = Appointment::where('id', $id)->first();
        $appointment->delete();

        if (auth()->user()->role === 'staff') {
            return redirect()->route('app.index')->with('success', 'Successfully deleted');
        } else if (auth()->user()->role === 'patient') {
            return redirect()->route('app-patient.index')->with('success', 'Successfully deleted');
        }
    }

    public function changeStatus(Request $request)
    {
        $appointment = Appointment::find($request->app_id);
        $appointment->status = $request->status;
        $appointment->save();

        if ($request->status === "Cancelled") {
            $appointment->delete();
        }

        $patient = Patient::where('id', $appointment->patient_id)->first();
        $doctor = Doctor::where('id', $appointment->doctor_id)->first();
        $schedule = Schedule::where('id', $appointment->schedule_id)->first();
        $session = Session::where('id', $appointment->session_id)->first();
        $user = User::where('id', $patient->user_id)->first();

        $date = Carbon::createFromFormat('Y-m-d', $schedule->date)->format('M d, Y');
        $starttime = Carbon::createFromFormat('H:i:s', $session->starttime)->format('g:i A');
        $endtime = Carbon::createFromFormat('H:i:s', $session->endtime)->format('g:i A');

        $data = [
            'id' => $appointment->id,
            'patient_name' => $patient->name,
            'doctor_name' => $doctor->name,
            'date' => $date,
            'session' => $session->id,
            'starttime' => $starttime,
            'endtime' => $endtime,
            'cabin' => $appointment->cabin,
        ];

        if ($appointment->status == 'Approve') {
            Mail::to($user->email)->send(new Notify($data));
        }

        return back();

        // return redirect('/send');
    }

    public function reschedule($id)
    {
        $app = Appointment::find($id);
        $doctor = $app->doctor->name;
        $date = $app->schedule->date;
        $sessions = Schedule::with(['sessions'])->where('date', $date)->get();

        return view('patient.reschedule', compact('date', 'sessions', 'doctor', 'app'));
    }

    public function updateReschedule(Request $request, $id)
    {

        $appointment = Appointment::find($id);

        $appointment->status = "Pending";
        $appointment->cabin = $request->cabin;
        $appointment->session_id = $request->session;
        $appointment->save();

        return redirect()->route('app-patient.index')->with('sucess', "Succesfully reschedule");
    }
}
