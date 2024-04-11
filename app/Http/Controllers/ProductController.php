<?php

namespace App\Http\Controllers;

use App\Models\agent_products;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Products;

class ProductController extends Controller
{
    // Create a new product
    public function create(Request $request)
    {
        $request->validate([
            'product_name' => 'required|unique:products',
        ]);

        $product = new Products();
        $product->product_name = $request->input('product_name');
        $product->save();
        return redirect('/products')->with('success', 'Product created successfully');
        //return response()->json(['message' => 'Product created successfully']);
    }

    // Update an existing product
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|unique:products',
        ]);

        $product = Products::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->product_name = $request->input('product_name');
        $product->save();
        return redirect('/products')->with('success', 'Product Updated successfully');
       // return response()->json(['message' => 'Product updated successfully']);
    }

    // Delete a product
    public function delete($id)
    {
        $product = Products::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();
        return redirect('/products')->with('success', 'Product deleted successfully');
        //return response()->json(['message' => 'Product deleted successfully']);
    }

    // Get all products
    public function index()
    {
        $products = Products::all();

        return view('admin/product', ['products' => $products]);
    }
    public function getSubProducts()
    {
        $products = Products::with('subProducts')->get();
        $agent_product = agent_products::with('product', 'subproduct')
        ->where('agid', '4')->get();
       //return $products;
        return view('agent/product', ['products' => $products,'agent_product' => $agent_product]);
    }
}
