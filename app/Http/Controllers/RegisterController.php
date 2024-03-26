<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $fillable = [
        'user_type',
        'txt_fnm',
        'txt_mnm',
        'txt_lnm',
        'txt_add',
        'txt_con',
        'txt_gen',
        'txt_em',
        'password', // Add this line for the 'password' field
    ];

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

    public function addFarmer(Request $request)
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
        $user->save();
        $request->session()->flash('success', ' Added SuccessFully!');
        return redirect()->back();
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
            $request->session()->put('user_id', $user->id);
            if ($user->user_type == 3) {
                return redirect("/agent/dashboard");
            }
            return redirect("/dashboard"); // Redirect to the intended page or dashboard
        } else {
            // Invalid email or password
            $request->session()->flash('error', 'Invalid email or password');
            return redirect('login'); // Redirect back to the login page with an error message
        }
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'old_password' => 'required',
            'new_password' => 'required',
        ]);

        $user = $user = Register::where('id', $request->input('id'))->first();

        if ($request->old_password != $user->password) {
            return redirect()->back()->with('er', 'The old password is incorrect.');
        }

        $user->password = $request->new_password;
        $user->save();
        return redirect()->back()->with('success', 'Password changed successfully.');
    }

    public function update(Request $request)
    {
        // Validation logic
        $request->validate([
            'txt_fnm' => 'required',
            'txt_lnm' => 'required',
            // Add more validation rules for other fields
        ]);
        $id = $request->input('user_id');

        // Retrieve the user with the given ID
        $user = Register::find($id);

        // Check if the user exists
        if (!$user) {
            // Redirect back or show an error message if the user is not found
            return redirect()->back()->with('er', 'User not found.');
        }

        // Update user data

        $user->first_name = $request->input('txt_fnm');
        $user->middle_name = $request->input('txt_mnm');
        $user->last_name = $request->input('txt_lnm');
        $user->address = $request->input('txt_add');
        $user->contact = $request->input('txt_con');
        $user->gender = $request->input('txt_gen');
        $user->email = $request->input('txt_em');

        // Save the updated user
        $user->save();

        // Redirect to the user list or any other desired page
        return redirect()->back()->with('success', 'User updated successfully!');
    }

    public function edit($id)
    {
        // Retrieve the user with the given ID
        $user = Register::select('id','first_name', 'middle_name', 'last_name', 'address', 'contact', 'gender', 'email')
        ->find($id);

        // Check if the user exists
        if (!$user) {
            // Redirect back or show an error message if the user is not found
            return redirect()->back()->with('er', 'User not found.');
        }
        //return compact('user');
        // Pass the user data to the edit view
        return view('admin/profile', compact('user'));
    }

    public function view()
    {
        $id = session('user_id');
        // Retrieve the user with the given ID
        $user = Register::select('id','first_name', 'middle_name', 'last_name', 'address', 'contact', 'gender', 'email')
        ->find($id);

        // Check if the user exists
        if (!$user) {
            // Redirect back or show an error message if the user is not found
            return redirect()->back()->with('er', 'User not found.');
        }
        //return compact('user');
        // Pass the user data to the edit view
        return view('agent/profile', compact('user'));
    }
}
