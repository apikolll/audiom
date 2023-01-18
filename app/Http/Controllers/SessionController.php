<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Cabin;
use App\Models\Clinic;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $session = new Session();
        
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
        // $clinic = Clinic::find($id);
        // dd($clinic);
        // $session = new Session();

        // foreach ($request->session as $sessions) {
        //     $session->starttime = "900";
        //     $session->endtime = "1000";
        //     $clinic->session()->save($session);
        // }

        return back()->with('success', 'New Session has been created');
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

    /**xs
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $session = Session::find($id);
        // $cabin = Cabin::find($id);

        foreach ($request->session as $sessions) {
            // if ($id == $session->cabin_id) {
            //     return redirect()->route('appointment.create')->with('error', "You have set session for this cabin");
            // } else {
            if ($sessions == "session1") {
                $start_time = "900";
                $end_time = "1000";
            } else if ($sessions == "session2") {
                $start_time = "1000";
                $end_time = "1100";
            } else if ($sessions == "session3") {
                $start_time = "1100";
                $end_time = "1200";
            } else if ($sessions == "session4") {
                $start_time = "1430";
                $end_time = "1530";
            } else if ($sessions == "session5") {
                $start_time = "1530";
                $end_time = "1630";
            }

            // $available = $session->cabin_id;

            // if (!$available) {
                // Session::create([
                //     'starttime' => $start_time,
                //     'endtime' => $end_time,
                // ]);
            // } else {
                // return redirect()->route('appointment.create')->with('error', "You have set session for this cabin");
            // }

            // $clinic = Clinic::find($id);           

            $session = new Session();
            $session->starttime = $start_time;
            $session->endtime = $end_time;
            $session->save();
        }

        return redirect()->route('appointment.create')->with('success', "Successfully set session for Cabin");
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

    // public function changeStatus(Request $request)
    // {

    //     $cabin = Cabin::find($request->id);
    //     foreach ($request->status as $status) {
    //         $cabin->status = $status;
    //         $cabin->save();
    //     }
    // }
}
