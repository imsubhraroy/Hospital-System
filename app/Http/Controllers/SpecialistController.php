<?php

namespace App\Http\Controllers;

use App\Models\Specialist;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SpecialistController extends Controller
{
    public function index()
    {
        $specialist = Specialist::all();

        return view('admin.specialist.view-specialist', compact('specialist'));
    }

    public function create()
    {
        return view('admin.specialist.add-specialist');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $name = Str::upper($request->name);
            $specialist = Specialist::where('name', $name)->get();
            if ($specialist->isNotEmpty()) {
                return back()->with('message', 'Specialist Already exits.');
            } else {
                $specialist = new Specialist();
                $specialist->name = $name;
                $specialist->save();
                return back()->with('message', 'Specialist Created Succesfully.');
            }
        } catch (Exception $exception) {
            $getTheErrorMessage = $exception->getPrevious();
            return back()->with('message', $getTheErrorMessage->errorInfo[2] ?? 'Try after some time.');
        }
    }

    public function show($id)
    {
        try {

            $specialist = Specialist::find($id);


            return view('admin.specialist.edit-specialist' , compact('specialist'));

        } catch (Exception $exception) {
            $getTheErrorMessage = $exception->getPrevious();
            return back()->with('message', $getTheErrorMessage->errorInfo[2] ?? 'Try after some time.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $name = Str::upper($request->name);
            $specialist = Specialist::find($id);
            $specialist->name = $name;
            $specialist->save();

            return back()->with('message', 'Specialist Updated Succesfully.');

        } catch (Exception $exception) {
            $getTheErrorMessage = $exception->getPrevious();
            return back()->with('message', $getTheErrorMessage->errorInfo[2] ?? 'Try after some time.');
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $specialist = Specialist::find($id);
            $specialist->delete();

            return back()->with('message', 'Specialist Deleted Succesfully.');

        } catch (Exception $exception) {
            $getTheErrorMessage = $exception->getPrevious();
            return back()->with('message', $getTheErrorMessage->errorInfo[2] ?? 'Try after some time.');
        }
    }
}
