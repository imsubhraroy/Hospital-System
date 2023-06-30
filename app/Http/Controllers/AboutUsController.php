<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $doctor = Doctor::all();
        return view('user.about-us', compact('doctor'));
    }
}
