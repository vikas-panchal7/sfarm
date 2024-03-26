<?php

namespace App\Http\Controllers;

use AgentProductPrice;
use AgentProducts;
use App\Models\agent_commisons;
use App\Models\agent_product_prices;
use App\Models\agent_products;
use App\Models\Register;
use App\Models\SubProducts;
use App\Models\Purchase;
use App\Models\PurchaseBill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'agent_id' => 'required',
            'farmer_id'=>'required',
            'total_amount' => 'required'
        ]);

        // Calculate total amount
        
        $total_amount = $request->total_amount;
        $commission = agent_commisons::where('agid', $request->agent_id)->first();
        //return $commission;
        $commission_amount = $total_amount * ($commission->commison / 100);
        $bill_amount = $total_amount - $commission_amount;
        // Create new purchase record
        $purchase = PurchaseBill::create([
            'agent_id' => $request->agent_id,
            'farmer_id' => $request->farmer_id,
            'total_amount' => $total_amount,
            'bill_amount' => $bill_amount,
            'commission' => $commission->commison,
        ]);
//return $purchase;
        $productIds = $request->txt_spid;
        $prices = $request->txt_price;
        $quantities = $request->txt_proqty;
        $totalAmounts = $request->txt_tamt;
        $purchase_id = $purchase->id;
    //return $purchase_bill_id ;
        foreach($productIds as $key => $productId) {
           
            $quantity = $quantities[$key];
            if($quantity > 0) {
                $data = Purchase::create([
                    'purchase_bill_id' => $purchase_id,
                    'sproduct_id' => $productId,
                    'price' => $prices[$key],
                    'quantity' => $quantity,
                    'total_amount' => $totalAmounts[$key]
                ]);
            }
        }
        return redirect('agent/purchase')->with('success', 'Purchase successfully');
        // Return success response or redirect as needed
    }

    public function index(Request $request)
    {
        // Retrieve the agent id from session storage
        $agid = session('user_id');

        // Fetch agent products associated with the retrieved agent id
        $agentProducts = agent_products::with('subproduct')
        ->where('agid', $agid)
        ->get();
        //$prices = agent_product_prices::where('sub_product_id', 6)->get();
        //dd($prices);
        $agentProductsWithPrices = [];

        foreach ($agentProducts as $agentProduct) {
           
                // Retrieve the price for the current sub-product
                $price = agent_product_prices::where('sub_product_id', $agentProduct->spid)->value('price');
                
                // Construct an array containing sub-product and price details
                $subproductWithPrice = [
                    'subproduct' => $agentProduct->subproduct,
                    'price' => $price,
                ];
                
                // Add the sub-product with price details to the array
                $agentProductsWithPrices[] = $subproductWithPrice;
            
        }
        $farmers = Register::where('user_type', '1')->get();
        //return ['agentProductsWithPrices' => $agentProductsWithPrices,'farmers' =>$farmers];
        // Return the agent products to the view
        return view('agent/purchase', ['agentProductsWithPrices' => $agentProductsWithPrices,'farmers' =>$farmers]);
    }
}
