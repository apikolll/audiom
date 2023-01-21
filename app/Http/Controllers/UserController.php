<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Staff;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    // function to register user
    public function createUser(UserCreateRequest $request)
    {

        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->role = "patient";
        $user->password = Hash::make($request->password);
        $user->save();

        // if ($request->roleuser == 'patient') {
        //     $user->role = "patient";
        // } elseif ($request->roleuser == 'staff') {
        //     $user->role = "staff";
        // } elseif ($request->roleuser == 'doctor') {
        //     $user->role = "doctor";
        // }
        // $user->save();

        $patient = new Patient();
        // $staff = new Staff();

        if ($user->role == 'patient') {
            $patient->user_id = $user->id;
            $patient->name = $request->name;
            $patient->save();
            return redirect()->route('patient.page');

        } elseif ($user->role == 'staff') {
            // $staff->user_id = $user->id;
            // $staff->name = $request->name;
            // $staff->save();
            return redirect()->route('staff.page');

        } elseif ($user->role == 'doctor') {
            return redirect()->route('doctor.page');
        }
    }

    // function to login user
    public function customLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerateToken();

            if (auth()->user()->role == "patient") {
                return redirect()->route('patient.page');
            } elseif (auth()->user()->role == "staff") {
                return redirect()->route('staff.page');
            } elseif (auth()->user()->role == "doctor") {
                return redirect()->route('doctor.page');
            }
        }
        return back()->with('error', 'Email or password is wrong ');
    }

    //patient homepage
    public function patient()
    {
        return view('patient.homepage');
    }

    //staff homepage
    public function staff()
    {
        $staff = User::all()->count();
        return view('staff.dashboard', compact('staff'));
    }

    //doctor homepage
    public function doctor()
    {
        return view('doctor.homepage');
    }

    // function to log user out
    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate(); //regenerate the id

        $request->session()->regenerateToken(); //regenerate the csrf token

        return redirect('/');
    }

    //function to manage user profile
    public function userProfile()
    {

        $users = DB::table('users')->get();
        return view('patient.profile', ['users' => $users]);
    }


    public function sendResetLink(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);
    }

    public function bookAppointment()
    {
        return view('patient.bookAppointment');
    }
}
