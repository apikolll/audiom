<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;

class UserController extends Controller
{
    // function to register user
    public function createUser(UserCreateRequest $request)
    {

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if ($request->roleuser == 'patient') {
            $user->role = "patient";
        } elseif ($request->roleuser == 'staff') {
            $user->role = "staff";
        } elseif ($request->roleuser == 'doctor') {
            $user->role = "doctor";
        }
        $user->save();

        if ($request->roleuser == 'patient') {
            return redirect('patient');
        } elseif ($request->roleuser == 'staff') {
            return redirect('staff');
        } elseif ($request->roleuser == 'doctor') {
            return redirect('doctor');
        }
    }

    // function to login user
    public function customLogin(Request $request)
    {

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            if (auth()->user()->role == "patient") {
                return redirect()->route('patient.page');
            } elseif (auth()->user()->role == "staff") {
                return redirect()->route('staff.page');
            } elseif (auth()->user()->role == "doctor") {
                return redirect()->route('doctor.page');
            }
        }
        return back()->with('error', 'Username or password is wrong ');
    }

    //patient homepage
    public function patient()
    {
        return view('patient.homepage');
    }

    //staff homepage
    public function staff()
    {
        return view('staff.homepage');
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

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    //function to manage user profile
    public function userProfile(){
        
        $users = DB::table('users')->get();
        return view('patient.profile', ['users' => $users]);
     
    }
}
