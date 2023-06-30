<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Exception;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctor = Doctor::all();
        return view('user.doctor-page', compact('doctor'));
    }

    public function index2()
    {
        $doctor = Doctor::all();
        return view('admin.doctor.view-doctor', compact('doctor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.doctor.add-doctor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'price' => 'required',
            'registration' => 'required',
            'speciality' => 'required'
        ]);

        try {
            $doctor = Doctor::where('phone', $request->phone)->orWhere('registration', $request->registration)->get();
            if ($doctor->isNotEmpty()) {
                return back()->with('message' , 'Doctor Already exits.');
            } else {
                $newDoctor = new Doctor();

                $newDoctor->name = $request->name;
                $newDoctor->phone = $request->phone;
                $newDoctor->room = $request->room;
                $newDoctor->visit = $request->price;
                $newDoctor->registration = $request->registration;
                $newDoctor->specialist = $request->speciality;

                if ($request->hasFile('image')) {
                    $image = $request->image;
                    $imageName = time() . '.' . $image->getClientoriginalExtension();
                    $request->image->move('doctor_image', $imageName);
                    $newDoctor->image = $imageName;
                }
                $newDoctor->save();

                return redirect('/admin-view-doctors')->with('message', 'Doctor Added Succesfully.');
            }
        } catch (Exception $exception) {
            $getTheErrorMessage = $exception->getPrevious();
            return back()->with('message', $getTheErrorMessage->errorInfo[2] ?? 'Try after some time.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $doctor = Doctor::find($id);
            return view('admin.doctor.edit-doctor', compact('doctor'));
        } catch (Exception $exception) {
            dd($exception);
            $getTheErrorMessage = $exception->getPrevious();
            return back()->with('message', $getTheErrorMessage->errorInfo[2] ?? 'Try after some time.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'price' => 'required',
            'registration' => 'required',
            'speciality' => 'required'
        ]);

        try {
                $doctor = Doctor::find($id);

                $doctor->name = $request->name;
                $doctor->phone = $request->phone;
                $doctor->room = $request->room;
                $doctor->visit = $request->price;
                $doctor->registration = $request->registration;
                $doctor->specialist = $request->speciality;

                if ($request->hasFile('image')) {
                    $image = $request->image;
                    $imageName = time() . '.' . $image->getClientoriginalExtension();
                    $request->image->move('doctor_image', $imageName);
                    $doctor->image = $imageName;
                }
                $doctor->save();

                return back()->with('message', 'Doctor Updated Succesfully.');

        } catch (Exception $exception) {
            $getTheErrorMessage = $exception->getPrevious();
            return back()->with('message', $getTheErrorMessage->errorInfo[2] ?? 'Try after some time.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $doctor = Doctor::find($id);
            $doctor->delete();

            return back()->with('message', 'Doctor Deleted Succesfully.');
        } catch (Exception $exception) {
            dd($exception);
            $getTheErrorMessage = $exception->getPrevious();
            return back()->with('message', $getTheErrorMessage->errorInfo[2] ?? 'Try after some time.');
        }
    }
}
