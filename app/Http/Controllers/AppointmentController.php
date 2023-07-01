<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use App\Notifications\AppointmentNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $appointment = Appointment::where('appointments.userId', $user->id)
            ->join('doctors', 'doctors.id', '=', 'appointments.doctorId')
            ->select('appointments.*', 'doctors.name as doctorName', 'doctors.specialist')
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('user.view-Appointment', compact('appointment'));
    }

    public function index2()
    {

        $appointment = Appointment::join('doctors', 'doctors.id', '=', 'appointments.doctorId')
            ->select('appointments.*', 'doctors.name as doctorName', 'doctors.specialist', 'doctors.visit')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('admin.appointment', compact('appointment'));
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
    public function approve(Request $request)
    {
        try {

            $appointment = Appointment::find($request->id);
            $appointment->status = 'Approved';
            $appointment->save();

            $user = User::find($appointment->userId);
            $doctor = Doctor::find($appointment->doctorId);

            $details = [
                'gretting' => 'Hello ' . $user->name,
                'body' => 'Your Appointment on ' . $appointment->appoinmentDate . ' with Dr. ' . $doctor->name . ' Specialist in ' . $doctor->specialist . ' Approve. We hope you have a great day.',
                'actionText' => 'View Appointment',
                'actionUrl' => 'http://127.0.0.1:8000/my-appointment',
                'endPart' => 'Thanks from MeHealth'
            ];

            Notification::route('mail', $user->email)
                ->notify(new AppointmentNotification($details));

            return back()->with('message', 'Appointment Approved.');
        } catch (Exception $exception) {
            $getTheErrorMessage = $exception->getPrevious();
            return back()->with('message', $getTheErrorMessage->errorInfo[2] ?? 'Try after some time.');
        }
    }

    public function cancel(Request $request)
    {
        try {

            $appointment = Appointment::find($request->id);
            $appointment->status = 'Canceled';
            $appointment->save();

            $user = User::find($appointment->userId);
            $doctor = Doctor::find($appointment->doctorId);

            if (Auth::user()->usertype == '1') {

                $details = [
                    'gretting' => 'Hello ' . $user->name,
                    'body' => 'Your Appointment on ' . $appointment->appoinmentDate . ' with Dr. ' . $doctor->name . ' Specialist in ' . $doctor->specialist . ' Cancel because all the slots are booked on that day. Try to book an Appointment on another day. We hope you have a great day.',
                    'actionText' => 'View Appointment',
                    'actionUrl' => 'http://127.0.0.1:8000/my-appointment',
                    'endPart' => 'Thanks from MeHealth'
                ];

                Notification::route('mail', $user->email)
                    ->notify(new AppointmentNotification($details));
            }

            return back()->with('message', 'Appointment Canceled Succesfully.');
        } catch (Exception $exception) {
            $getTheErrorMessage = $exception->getPrevious();
            return back()->with('message', $getTheErrorMessage->errorInfo[2] ?? 'Try after some time.');
        }
    }
    public function destroy(Request $request)
    {
        try {

            $appointment = Appointment::find($request->id);
            $appointment->delete();

            return back()->with('message', 'Appointment Deleted Succesfully.');
        } catch (Exception $exception) {
            $getTheErrorMessage = $exception->getPrevious();
            return back()->with('message', $getTheErrorMessage->errorInfo[2] ?? 'Try after some time.');
        }
    }
}
