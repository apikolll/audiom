<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Report;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ReportController extends Controller
{
    public function index(){
        $doctor = Doctor::where('user_id', auth()->user()->id)->pluck('id')->first();
        $appointments = Appointment::with('patient')->with('doctor')->where('doctor_id', $doctor)->get();
        return view('doctor.report.index', compact('appointments'));
    }

    public function create($id){

        $appointment = Appointment::where('id', $id)->first();
        // $doctor = Doctor::where('user_id', auth()->user()->id)->pluck('id')->first();
        return view('doctor.report.createreport', compact('appointment'));
    }

    public function store(Request $request){

        $request->validate([
            'patient' => 'required',
            'testresult' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'result' => 'required',
            'comment' => 'required'
        ]);

        $id = IdGenerator::generate(['table' => 'reports', 'length' => 3, 'prefix' => 'R']);
        $doctor = Doctor::where('user_id', auth()->user()->id)->pluck('id')->first();

        $report = new Report;
        $report->id = $id;
        $report->patient_id = $request->patient;
        $report->doctor_id = $doctor;
        if ($request->hasFile('testresult')) {
            $report->testresult = $request->file('testresult')->store('testreport', 'public');
        }
        $report->result = $request->result;
        $report->comment = $request->comment;
        $report->save();

        $appointment = Appointment::where('id', $request->id)->first();
        $appointment->report_id = $id;
        $appointment->save();

        return redirect()->route('report.index')->with('success', 'Successfully Created');
        
    }

    public function detailReport($id){
        $appointment = Appointment::with('patient')->with('doctor')->with('report')->where('id', $id)->first();
        return view('doctor.report.detail', compact('appointment'));
    }
}
