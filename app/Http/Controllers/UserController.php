<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = User::all();

        return view('admin.users' ,compact('user'));
    }

    public function destroy(string $id)
    {
        try {

            $user = User::find($id);
            $user->delete();

            return back()->with('message', 'User Deleted Succesfully.');
        } catch (Exception $exception) {
            dd($exception);
            $getTheErrorMessage = $exception->getPrevious();
            return back()->with('message', $getTheErrorMessage->errorInfo[2] ?? 'Try after some time.');
        }
    }
}
