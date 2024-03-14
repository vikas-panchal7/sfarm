<?php

namespace App\Http\Controllers;

use App\Models\agent_commisons;
use Illuminate\Http\Request;

class Agent_commisons_controller extends Controller
{
    public function storeOrUpdate(Request $request)
    {
        $agid = $request->input('agid');
        $commission = $request->input('commissions');
        //return $commission;

        // Check if a record with the same commission and agid exists
        $existingCommission = agent_commisons::where('agid', $agid)->first();

        if ($existingCommission) {
            // Update the existing record
            $existingCommission->commison = $commission;
            $existingCommission->update();
            return redirect("agent/commission")->with('success', 'Commission updated successfully.');
            //return redirect()->back()->with('success', 'Commission updated successfully.');
        } else {
            // Insert a new record
             $agent_commisons = new agent_commisons();
             $agent_commisons->agid = $agid;
             $agent_commisons->commison = $commission;
             $agent_commisons->save();
            return redirect("agent/commission")->with('success', 'Commission added successfully.');
        }
    }

    public function get(Request $request)
    {
        // Retrieve the agent id from session storage
        $agid = session('user_id');
        $commission = agent_commisons::where('agid', $agid)->first();

        //return compact('commission');
        return view("agent/commission",compact('commission'));
    }
}
?>