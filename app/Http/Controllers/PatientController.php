<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Patient;
use App\Models\Appointment;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $patients = Patient::with('users')->paginate(4);
        $patients = Patient::orderBy('created_at', 'ASC')->with('users')->paginate(4);

        if (auth()->user()->role === "staff") {
            return view('staff.managepatient.patient', compact('patients'));
        } else if (auth()->user()->role === "patient") {
            $id = auth()->user()->patient->id;
            $upcomingAppointments = Appointment::where('patient_id', $id)->where('status', 'Approve')->get();
            $followupAppointments = Appointment::where('patient_id', $id)->where('status', 'FollowUp')->get();
            return view('patient.homepage', compact('upcomingAppointments', 'followupAppointments'));
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->role === 'staff'){
            return view('staff.managepatient.addpatient');
        }else if(auth()->user()->role === 'patient'){
            return view('patient.addAppointment');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'race' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'contact' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            'address' => 'required'
        ]);
        // dd($request->all());

        $exist = User::where('email', $request->email)->first();
        
        if($exist){
            return back()->with('error', 'Email is already taken.');
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = "patient";
        $user->save();

        $patient = new Patient;
        $patient->name = $request->name;
        $patient->age = $request->age;
        $patient->dob = $request->dob;
        if ($request->hasFile('image')) {
            $patient->image = $request->file('image')->store('patient', 'public');
        }
        $patient->gender = $request->gender;
        $patient->race = $request->race;
        $patient->user_id = $user->id;
        $patient->contact = $request->contact;
        $patient->address = $request->address;
        $patient->save();

        return redirect()->route('patient.index')->with('success', 'Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        // $patient = Patient::find($id);
        if(auth()->user()->role === "staff"){
            return view('staff.managepatient.detailpatient', compact('patient'));
        }else if(auth()->user()->role === "patient"){
            return view('patient.detail', compact('patient'));
        }

       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        if (auth()->user()->role === "staff") {
            return view('staff.managepatient.editpatient', compact('patient'));
        } else if (auth()->user()->role === "patient") {
            return view('patient.editprofile', compact('patient'));
        }
        // return view('staff.managepatient.editpatient', compact('patient'));
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
            'age' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'race' => 'required',
            'contact' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'address' => 'required'
        ]);

        $patient = Patient::find($id);
        $patient->name = $request->name;
        $patient->age = $request->age;
        $patient->dob = $request->dob;
        $patient->gender = $request->gender;
        $patient->race = $request->race;
        $patient->contact = $request->contact;
        if ($request->hasFile('image')) {
            $patient->image = $request->file('image')->store('patient', 'public');
        }
        $patient->address = $request->address;
        $patient->save();

        if (auth()->user()->role === "staff") {
            return redirect()->route('patient.index')->with('success', 'Successfully updated this profile');
        } else if (auth()->user()->role === "patient") {
            return redirect()->route('patients.index')->with('success', 'Successfully updated this profile');
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);
        $user = User::find($patient->user_id);
        $user->delete();
        $patient->delete();

        return back()->with('success', 'Successfully deleted');
    }

    public function changePatientPassword()
    {
        return view('patient.changepassword');
    }

    public function updatePatientPassword(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }

    public function bookAppointment(){
        return view('patient.bookAppointment');
    }

    public function detail(){
        return view('patient.detail');
    }
}
