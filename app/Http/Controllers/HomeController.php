<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class HomeController extends Controller
{
    private static function convertDate($type, $date)
    {
        if ($type === true) {
            $date = date('Y-m-d', strtotime($date));
            $date = date('Y-m-d H:i:s', strtotime($date . " +00 hours"));
            $date = date('Y-m-d H:i:s', strtotime($date . " +00 minutes"));
            $date = date('Y-m-d H:i:s', strtotime($date . " +00 seconds"));
            return $date;
        } else {
            $date = date('Y-m-d', strtotime($date));
            $date = date('Y-m-d H:i:s', strtotime($date . " +23 hours"));
            $date = date('Y-m-d H:i:s', strtotime($date . " +59 minutes"));
            $date = date('Y-m-d H:i:s', strtotime($date . " +59 seconds"));
            return $date;
        }
    }

    public function home()
    {

        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
                $doctor = Doctor::all();
                return view('user.home', compact('doctor'));
            } else {
                $totalDoctor = Doctor::count();
                $totalAppointment = Appointment::count();
                $from = self::convertDate(true,  today());
                $totalApprovedAppointment = Appointment::where('status', 'Approved')->whereDate('appointments.appoinmentDate', $from)->count();

                $approvedAppointment = Appointment::where('status', 'Approved')
                    ->whereDate('appointments.appoinmentDate', $from)
                    ->join('doctors', 'doctors.id', '=', 'appointments.doctorId')
                    ->select('appointments.*', 'doctors.name as doctorName', 'doctors.specialist', 'doctors.visit')
                    ->get();
                return view('admin.home', compact('totalDoctor', 'totalAppointment', 'totalApprovedAppointment', 'approvedAppointment'));
            }
        } else {
            return redirect()->back();
        }
    }

    public function index()
    {
        if (Auth::id()) {
            return redirect('home');
        }

        $doctor = Doctor::all();
        return view('user.home', compact('doctor'));
    }
}
