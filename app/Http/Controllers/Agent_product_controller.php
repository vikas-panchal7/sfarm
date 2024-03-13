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

        // Check if a record with the specified pid, spid, and agid exists
        $existingAgentProduct = agent_products::where('pid', $request->input('pid'))
            ->where('spid', $request->input('spid'))
            ->where('agid', $request->input('agid'))
            ->first();

        if ($existingAgentProduct) {
            // If a record exists, update it
            $existingAgentProduct->update([
                'pid' => $request->input('pid'),
                'spid' => $request->input('spid'),
                'agid' => $request->input('agid'),
                // Add other fields here if needed
            ]);
            $message = 'Agent Product Already Exists.';
            return redirect("agent/product")->with('er', $message);
            
        } else {
            // If no record exists, create a new one
            $agentProduct = new agent_products();
            $agentProduct->pid = $request->input('pid');
            $agentProduct->spid = $request->input('spid');
            $agentProduct->agid = $request->input('agid');
            // Add other fields here if needed
            $agentProduct->save();
            $message = 'Agent product created successfully.';
        }

        return redirect("agent/product")->with('success', $message);
    }



    public function index(Request $request)
    {
        // Retrieve the agent id from session storage
        $agid = session('user_id');

        // Fetch agent products associated with the retrieved agent id
        $agent_products = agent_products::with('product', 'subproduct')
            ->where('agid', $agid)
            ->get();

        // Return the agent products to the view
        return view('agent.product.index', compact('agent_products'));
    }


    public function destroy($id)
    {
        $product = agent_products::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();
        return redirect('agent/product')->with('success', 'Product deleted successfully');
        //return response()->json(['message' => 'Product deleted successfully']);
    }
}
