<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Time;
use App\Models\Cabin;
use App\Models\Session;
use App\Models\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myAppointments = Appointment::all();
        $session = Session::all();
        return view('staff.appointment.index', compact('myAppointments', 'session'));

        // $appointment = Appointment::find(2);
        // $appointment->cabins()->attach(2, ['session_id' => 2]);


        // $products = AppointmentCabinSession::join('appointments', )
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $session = Session::all();
        $cabin = Cabin::all();
        $sessions = Session::all();
        return view('staff.appointment.addappointment', compact('cabin', 'sessions'));
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
            // 'date' => 'required|unique:appointments,date,NULL,id,user_id,' . Auth::id(),
            'date' => 'required|unique:appointments,date,NULL,id',
            'session.*' => 'required',
        ]);

        foreach ($request->session as $sessions) {
            $appointment = new Appointment();
            $appointment->date = $request->date;
            $appointment->session_id = $sessions;
            $appointment->save();
        }

        return redirect()->back()->with('message', 'An appointment created for ' . $request->date);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $date)
    {
        $appId = $request->appointmentId;
        dd($appId);
        // $date = Appointment::where('id', $appId)->get('date')->first();
        // // $appointment = Appointment::where('date', $date)->first();
        // // Appointment::where('id', $appId)->delete();

        // foreach ($request->session as $sessions) {
        //     Appointment::create([
        //         'date' => '2023-01-01',
        //         'session_id' => $sessions
        //     ]);
        // }

        // $date = Appointment::where('id', $appointmentId)->get('date')->first()->date;
        // Session::where('appointment_id', $appointmentId)->delete();
        // foreach ($request->session as $sessions) {
        //     Appointment::create([
        //         'date' => $request->date,
        //         'session' => $sessions->id
        //     ]);
        // }
        // return redirect()->route('appointment.index')->with('message', 'Appointment time for ' . $date . ' is updated successfully!');
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

    public function showSchedule()
    {
        return view('staff.appointment.appointment_schedule');
    }

    public function check(Request $request)
    {
        // to get only one column, we use pluck comes with first method to get only one date
        $date = Appointment::where('date', '=', $request->date)->pluck('date')->first();

        // choose selected with table session and cabin [ need to use get method to get a collection ]
        $appointments = Appointment::where('date', '=', $date)->with('session')->get();

        foreach ($appointments as $appointment) {
            $app = Appointment::where('date', $date)->where('id', $appointment->id)->first();
        }

        // dd($app->session_id);
        // $appointments = Appointment::where('date', '=', $date)->first();
        // dd($appointments->id);
        // $appointment = Appointment::where('date', $date)->where('user_id', auth()->user()->id)->first();

        $sessions = Session::all();

        // check if date is not selected
        if (!$date) {
            return redirect()->to('/showSchedule')->with('errMessage', 'Please pick a date first');
        }

        // check if chosen date is not set
        if (!$date) {
            return redirect()->to('/showSchedule')->with('errMessage', 'Appointment time is not set for this date');
        };

        // return view('staff.appointment.editappointment', compact('appointments', 'date'));
        return view('staff.appointment.appointment_schedule', compact('date', 'appointments', 'sessions', 'app'));
    }
}
