<?php

namespace App\Http\Controllers;

use App\Models\agent_products;
use Illuminate\Http\Request;

class Agent_product_controller extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'pid' => 'required',
            'spid' => 'required',
            'agid' => 'required',
            // Add other validation rules as needed
        ]);

        // Create a new agent product instance
        $agentProduct = new agent_products([
            'pid' => $request->input('pid'),
            'spid' => $request->input('spid'),
            'agid' => $request->input('agid'),
            // Add other fields as needed
        ]);

        // Save the agent product to the database
        $agentProduct->save();

        return redirect()->route('agent_products.index')->with('success', 'Agent product created successfully.');
    }
}
