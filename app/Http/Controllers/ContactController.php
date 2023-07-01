<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('user.contact');
    }

    public function index2()
    {
        $contact = Contact::all();
        return view('admin.contacts', compact('contact'));
    }

    public function destroy(string $id)
    {
        try {

            $contact = Contact::find($id);
            $contact->delete();

            return back()->with('message', 'Contact Deleted Succesfully.');
        } catch (Exception $exception) {
            $getTheErrorMessage = $exception->getPrevious();
            return back()->with('message', $getTheErrorMessage->errorInfo[2] ?? 'Try after some time.');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        try {
            $user = auth()->user();
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->phone = $request->phone;
            $contact->email = $request->email;
            $contact->userId = $user->id;
            $contact->message = $request->message;
            $contact->save();
            return back()->with('message', 'Application Submitted Succesfully.');
        } catch (Exception $exception) {
            $getTheErrorMessage = $exception->getPrevious();
            return back()->with('message', $getTheErrorMessage->errorInfo[2] ?? 'Try after some time.');
        }
    }
}
