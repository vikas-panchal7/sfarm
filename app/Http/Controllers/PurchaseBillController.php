<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\PurchaseBill;
use Illuminate\Http\Request;


class PurchaseBillController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'agent_id' => 'required|exists:registers,id',
            'farmer_id' => 'required|exists:registers,id',
            'commission' => 'required|numeric|min:0',
            'bill_amount' => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
        ]);

        // Create new purchase bill record
        $purchaseBill = PurchaseBill::create([
            'agent_id' => $request->agent_id,
            'farmer_id' => $request->farmer_id,
            'commission' => $request->commission,
            'bill_amount' => $request->bill_amount,
            'total_amount' => $request->total_amount,
        ]);

        // Return success response or redirect as needed
    }

    public function index(Request $request)
    {
        $agid = session('user_id');

        // Fetch agent products associated with the retrieved agent id
        $agentProducts =  PurchaseBill::with('farmer')
            ->where('agent_id', $agid)
            ->get();
        return view('agent/purchasedetails', ['agentBills' => $agentProducts]);
        //return $agentProducts;
    }
    public function details(Request $request)
    {
        $id = $request->input('id');
        $agentBill =  PurchaseBill::with('farmer')
            ->where('id', $id)
            ->get();
        $agentBillProducts = Purchase::with('subProduct')->where('purchase_bill_id', $id)->get();
       return view('agent.purchaseview', compact('agentBill', 'agentBillProducts'));

        return ['agentBill' => $agentBill, 'agentBillProducts' => $agentBillProducts];
    }
}
