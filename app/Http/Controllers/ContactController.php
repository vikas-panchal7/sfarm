<?php

namespace App\Http\Controllers;

use App\Models\contacts;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    /**
     * Display a listing of the contacts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = contacts::all();
        return view('admin/contact', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new contact.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created contact in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'contact' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        contacts::create($request->all());

        return redirect()->route('contacts.index')
            ->with('success', 'Contact created successfully.');
    }

    /**
     * Display the specified contact.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
   

    // Add other functions as needed...

    /**
     * Remove the specified contact from the database.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    
}
