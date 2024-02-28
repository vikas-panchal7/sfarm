<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validation logic
        $request->validate([
            'txt_ut' => 'required',
            'txt_fnm' => 'required',
            'txt_lnm' => 'required',
            // Add more validation rules for other fields
        ]);

        // Create a new user in the database
        $user = new Register();
        $user->user_type = $request->input('txt_ut');
        $user->first_name = $request->input('txt_fnm');
        $user->middle_name = $request->input('txt_mnm');
        $user->last_name = $request->input('txt_lnm');
        $user->address = $request->input('txt_add');
        $user->contact = $request->input('txt_con');
        $user->gender = $request->input('txt_gen');
        $user->email = $request->input('txt_em');
        $user->password = $request->input('txt_pass'); // Hash the password
        $user->save();
        $request->session()->flash('success', 'Registered SuccessFully!');
        return redirect('register');
    }
    public function getFarmers()
    {
        $customers = Register::where('user_type', '1')->get();
        return view('admin/farmer', compact('customers'));
    }

    // Function to get all users with user_type 'customer'
    public function getCustomers()
    {
        $customers = Register::where('user_type', '2')->get();
        return view('admin/customer', compact('customers'));
    }

    // Function to get all users with user_type 'agent'
    public function getAgents()
    {
        $customers = Register::where('user_type', '3')->get();
        return view('admin/agent', compact('customers'));
    }

    // Function to get all users with user_type 'assistance'
    public function getAssistants()
    {
        $customers = Register::where('user_type', '4')->get();
        return view('admin/assistant', compact('customers'));
    }

    public function login(Request $request)
    {
        // Validation logic
        $request->validate([
            'txt_em' => 'required',
            'txt_pass' => 'required',
        ]);

        $user = Register::where('email', $request->input('txt_em'))->first();

        if ($user && ($request->input('txt_pass') == $user->password)) {
            // Password is correct
            // Log in the user
            return redirect("/dashboard"); // Redirect to the intended page or dashboard
        } else {
            // Invalid email or password
            $request->session()->flash('error', 'Invalid email or password');
            return redirect('login'); // Redirect back to the login page with an error message
        }
    }

    
}
