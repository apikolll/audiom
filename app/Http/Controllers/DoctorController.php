<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Schedule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor = Doctor::all();

        if (auth()->user()->role === "staff") {
            return view('staff.managedoctor.doctor', compact('doctor'));
        } else if (auth()->user()->role === "doctor") {
            $doctor = auth()->user()->doctor->id;
            $patients = Appointment::with('patient', 'schedule')->where('doctor_id', $doctor)->where('status', 'Approve')->get();
            $date = Carbon::now()->format('Y-m-d');
            $schedule = Schedule::where('date', $date)->first();
            if(!$schedule){
                $todayAppointments = 0;
            }else{
                $todayAppointments = Appointment::where('schedule_id', $schedule->id)->where('doctor_id', $doctor)->count();
            }
            
            // $tests = Appointment::with('schedule')->where('status', 'Approve')->where('doctor_id', $doctor)->get();

            // if ($tests > 0) {
            //     $todayAppointments = $tests;
            // } else {
            //     $todayAppointments = 0;
            // }

            return view('doctor.dashboard', compact('patients', 'todayAppointments'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.managedoctor.adddoctor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'gender' => 'required',
        //     'race' => 'required',
        //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        //     'contact' => 'required',
        //     'email' => 'required',
        //     'password' => 'required|confirmed',
        //     'address' => 'required'
        // ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = "doctor";
        $user->save();

        Doctor::create([
            'name' => $request->name,
            'user_id' => $user->id,
            'image' => $request->file('image')->store('doctor', 'public'),
            'contact' => $request->contact,
            'race' => $request->race,
            'gender' => $request->gender,
            'address' => $request->address
        ]);

        return redirect()->route('doctor.index')->with('success', 'Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return view('staff.managedoctor.detaildoctor', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        // $doctor = Doctor::find($id);

        return view('staff.managedoctor.editdoctor', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'race' => 'required',
            'gender' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'address' => 'required'
        ]);


        // $user = new User();

        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $user->save();

        $doctor = Doctor::find($id);
        $doctor->name = $request->name;
        $doctor->contact = $request->contact;
        $doctor->race = $request->race;
        if ($request->hasFile('image')) {
            // Storage::delete($doctor->image);
            $doctor->image = $request->file('image')->store('doctor', 'public');
        }
        $doctor->gender = $request->gender;
        $doctor->address = $request->address;
        $doctor->save();

        return redirect()->route('doctor.index')->with('success', 'Successfully updated this profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $user = User::find($id);
        $doctor = Doctor::find($id);
        $user = User::find($doctor->user_id);
        $user->delete();
        $doctor->delete();

        return back()->with('success', 'Successfully deleted');
    }

    public function todayApp()
    {
        $doctor = auth()->user()->doctor->id;
        $date = Carbon::now()->format('Y-m-d');
        $schedule = Schedule::where('date', $date)->first();
        if(!$schedule){
            return back();
        }
        
        $apps = Appointment::where('schedule_id', $schedule->id)->where('doctor_id', $doctor)->get();

        return view('doctor.todayappointment.index', compact('apps'));
    }
}
