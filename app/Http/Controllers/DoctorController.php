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
        //
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

                return back()->with('message', 'Doctor Added Succesfully.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
