<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Exception;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $appointment = Appointment::where('appointments.userId', $user->id)
            ->join('doctors', 'doctors.id', '=', 'appointments.userId')
            ->select('appointments.*', 'doctors.name as doctorName', 'doctors.specialist')
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('user.view-Appointment', compact('appointment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'appointmentDate' => 'required',
            'doctor' => 'required|numeric',
        ]);

        try {
            $user = auth()->user();

            $newAppoinment = new Appointment();
            $newAppoinment->name = $request->name;
            $newAppoinment->phone = $request->phone;
            $newAppoinment->email = $request->email;
            $newAppoinment->userId = $user->id;
            $newAppoinment->appoinmentDate = $request->appointmentDate;
            $newAppoinment->doctorId = $request->doctor;
            $newAppoinment->status = 'IN Progress';
            $newAppoinment->description = $request->description;
            $newAppoinment->save();
            return back()->with('message', 'Appointment Created Succesfully. We will Inform You after Accepting Your Appointment.');
        } catch (Exception $exception) {
            $getTheErrorMessage = $exception->getPrevious();
            return back()->with('message', $getTheErrorMessage->errorInfo[2] ?? 'Try after some time.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $user = auth()->user();

            $appointment = Appointment::find($request->id);
            $appointment->status = 'Canceled';
            $appointment->save();

            return back()->with('message', 'Appointment Canceled Succesfully.');

        } catch (Exception $exception) {
            dd($exception);
            $getTheErrorMessage = $exception->getPrevious();
            return back()->with('message', $getTheErrorMessage->errorInfo[2] ?? 'Try after some time.');
        }
    }
}
