<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('staff.schedule.checkschedule');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sessions = Session::all();
        return view('staff.schedule.addschedule', compact('sessions'));
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
            'date' => 'required|unique:schedules,date,NULL,id',
            'session' => 'required',
        ]);

        $schedule = Schedule::where('date', $request->date)->first();

        if($schedule){
            return back()->with('error', "Appointment for ".  Carbon::createFromFormat('Y-m-d', $request->date)->format('M d,
            Y') . " has been set.");
        }

        $date = new Schedule();
        $date->date = $request->date;
        $date->save();

        $app = Schedule::where('date', $request->date)->first();
        foreach ($request->session as $session) {
            $app->sessions()->attach([$session]);
        }

        return redirect()->route('schedule.create')->with('message', 'An appointment created for ' . Carbon::createFromFormat('Y-m-d', $request->date)->format('M d,
        Y'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = Schedule::where('id', $id)->first();
        $date = $id->date;
        $app = Schedule::where('date', $date)->first();
        
        $date = $request->session;
        $app->sessions()->sync($date);

        return redirect()->route('schedule.showSchedule')->with('message', 'Successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }

    public function showSchedule()
    {
        return view('staff.schedule.checkschedule');
    }

    public function check(Request $request)
    {
        $request->validate([
            'date' => 'required'
        ]);
        
        $date = $request->date;
        $schedule = Schedule::where('date', $date)->first();
        $sessions = Schedule::with(['sessions'])->where('date', $date)->get();
        $allsessions = Session::all();

        if(!$schedule){
            return back()->with('errMessage', 'Session for '. Carbon::createFromFormat('Y-m-d', $request->date)->format('M d,
                Y') .' is not set');
        }

        return view('staff.schedule.checkschedule', compact('sessions', 'date', 'allsessions'));

    }
}
