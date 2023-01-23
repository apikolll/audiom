<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Staff;
use App\Models\Patient;
// use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::all()->count();
        $doctor = Doctor::all()->count();
        $patient = Patient::all()->count();
        $appointment = Appointment::all()->count();
        return view('staff.dashboard', compact('staff', 'doctor', 'patient', 'appointment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = Staff::find($id);
        return view('staff.showstaff', compact('staff'));
    }

    /**
     * Show the form for editing the ss
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        // $staff = Staff::find($id);
        return view('staff.editstaff', compact('staff'));
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
            'image' => 'required',
            'contact' => 'required',
            'address' => 'required'
        ]);

        // Staff::create([
        //     $request->all()
        // ]);

        $staff = Staff::find($id);
        $staff->name = $request->name;
        $staff->age = $request->age;
        $staff->dob = $request->dob;
        if ($request->hasFile('image')) {
            $staff->image = $request->file('image')->store('staff', 'public');
        }
        $staff->gender = $request->gender;
        $staff->race = $request->race;
        $staff->contact = $request->contact;
        $staff->address = $request->address;
        $staff->save();

        return back()->with('success', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changePassword()
    {
        return view('staff.changepassword');
    }

    public function detail()
    {
        return view('staff.detail');
    }

    public function updatePassword(Request $request)
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
}
