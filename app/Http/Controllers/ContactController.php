<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller

{
    public function index()
    {
        $contacts = Contact::all();
        return response()->json($contacts);
    }
    public function show($id)
    {
        $contact = Contact::find($id);
        return response()->json($contact);
    }
    public function create(Request $request)
    {

        
        $contact = new Contact();

        $contact->firstname = $request->firstname;
        $contact->lastname = $request->lastname;
        $contact->phone = $request->phone;
        $contact->email = $request->email;

        $contact->save();

        return response()->json("Contact created successfully");
    }
    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);

        $contact->firstname = $request->firstname;
        $contact->lastname = $request->lastname;
        $contact->price = $request->price;
        $contact->email = $request->email;

        $contact->save();

        return response()->json("Contact updated successfully");
    }
    public function delete($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return response()->json('Contact deleted successfully');
    }
}