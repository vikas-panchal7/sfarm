<?php

namespace App\Http\Controllers;

use App\Models\Pincodes;
use Illuminate\Http\Request;

class PincodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pincodes = Pincodes::all();
        return view('admin/pincode', ['pincodes' => $pincodes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pincode.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pincode' => 'required|string|unique:pincodes',
            'is_active' => 'boolean',
        ]);

        $pincode = new Pincodes;
        $pincode->pincode = $request->pincode;
        $pincode->is_active = $request->has('is_active') ? true : false;
        $pincode->save();

        return redirect()->route('pincodes.index')->with('success', 'Pincode added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pincode  $pincode
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pincode  $pincode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pincodes $pincode)
    {
        $request->validate([
            'pincode' => 'required|string|unique:pincodes,pincode,' . $pincode->id,
            'is_active' => 'boolean',
        ]);

        $pincode->pincode = $request->pincode;
        $pincode->is_active = $request->has('is_active') ? true : false;
        $pincode->save();

        return redirect()->route('pincodes.index')->with('success', 'Pincode updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pincode  $pincode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pincodes $pincode)
    {
        $pincode->delete();

        return redirect()->route('pincodes.index')->with('success', 'Pincode deleted successfully');
    }
}
