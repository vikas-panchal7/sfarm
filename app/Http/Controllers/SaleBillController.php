<?php

namespace App\Http\Controllers;

use App\Models\agent_product_prices;
use App\Models\agent_products;
use App\Models\Register;
use App\Models\Sales;
use App\Models\SalesBill;
use Illuminate\Http\Request;

class SaleBillController extends Controller
{
    public function index(Request $request)
    {
        $agid = session('user_id');

        // Fetch agent products associated with the retrieved agent id
        $agentProducts =  SalesBill::with('farmer')
            ->where('agent_id', $agid)
            ->get();
        return view('agent/saledetails', ['agentBills' => $agentProducts]);
        //return $agentProducts;
    }
    public function details(Request $request)
    {
        $id = $request->input('id');
        $agentBill =SalesBill::with('farmer')
            ->where('id', $id)
            ->get();
        $agentBillProducts = Sales::with('subProduct')->where('sale_bill_id', $id)->get();
       return view('agent/saleview', compact('agentBill', 'agentBillProducts'));

        return ['agentBill' => $agentBill, 'agentBillProducts' => $agentBillProducts];
    }
    
}
