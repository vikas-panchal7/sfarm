<?php

namespace App\Http\Controllers;

use App\Models\agent_product_prices;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\AgentProductPrice;
use Illuminate\Support\Facades\DB;

class Agent_product_prices_controller extends Controller
{
    /**
     * Fetch all products with their sub-products along with prices.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllProductsWithPrices()
    {
        try {
            // Fetch all products with their sub-products using Eloquent's with method
            $products = Products::with(['subProducts'])->get();

            // Iterate through each product and sub-product to add the price information
            foreach ($products as $product) {
                foreach ($product->subProducts as $subProduct) {
                    // Find the corresponding price in the agent_product_prices table
                    $price = agent_product_prices::where('products_id', $product->id)
                        ->where('sub_product_id', $subProduct->id)
                        ->value('price');

                    // If the price is not found, set it to 0
                    $subProduct->price = $price ?? 0;
                }
            }
            //return $products;
            return view('admin/agent_price', ['products' => $products]);
            // Return the data as a JSON response or in any other desired format
            //return response()->json(['success' => true, 'data' => $products], 200);
        } catch (\Exception $e) {
            // Handle any exceptions that may occur
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function updateOrInsertPrice(Request $request)
    {
        try {
            $productId = $request->input('product_id');
            $subProductId = $request->input('subproduct_id');
            $newPrice = $request->input('subproduct_price');

            // Use the DB facade to update or insert the price
            DB::table('agent_product_prices')
                ->updateOrInsert(
                    ['products_id' => $productId, 'sub_product_id' => $subProductId],
                    ['price' => $newPrice]
                );
            return redirect('/apprice')->with('success', 'Price updated successfully');
            // Return a success response or redirect as needed
            //return response()->json(['success' => true, 'message' => 'Price updated successfully'], 200);
        } catch (\Exception $e) {
            // Handle any exceptions that may occur
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
