<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Subproducts;
use Exception;
use Illuminate\Http\Request;

class SubproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subproducts = Subproducts::all();
        $products = Products::all();
        return view('admin/subproduct', ['subproducts' => $subproducts, 'products' => $products]);
        //return view('subproducts.index', compact('subproducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subproduct_name' => 'required|unique:sub_products',
            'subproduct_description' => 'required',
            'product_crop_details' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_id' => 'required|exists:products,id',
        ]);

        $file = $request->file('image');
        $imageName = $file->getClientOriginalName();
        $destinationPath = 'uploads';
        $file->move($destinationPath, $imageName);

        $subproduct = new Subproducts;
        $subproduct->subproduct_name = $request->subproduct_name;
        $subproduct->subproduct_description = $request->subproduct_description;
        $subproduct->product_crop_details = $request->product_crop_details;
        $subproduct->image = $imageName;
        $subproduct->product_id = $request->product_id;
        $subproduct->save();

        return redirect("/subproducts")->with('success', 'Subproduct added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subproduct = Subproducts::findOrFail($id);
        return view('subproducts.show', compact('subproduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subproduct = Subproducts::findOrFail($id);
        return view('subproducts.edit', compact('subproduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'subproduct_name' => 'required|unique:sub_products',
            'subproduct_description' => 'required',
            'product_crop_details' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_id' => 'required|exists:products,id',
        ]);

        $subproduct = Subproducts::findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = $file->getClientOriginalName();
            $destinationPath = 'uploads';
            $file->move($destinationPath, $imageName);
            $subproduct->image = $imageName;
        }

        $subproduct->subproduct_name = $request->subproduct_name;
        $subproduct->subproduct_description = $request->subproduct_description;
        $subproduct->product_crop_details = $request->product_crop_details;
        $subproduct->product_id = $request->product_id;
        $subproduct->save();

        return redirect("/subproducts")->with('success', 'Subproduct updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subproduct = Subproducts::findOrFail($id);
        $subproduct->delete();

        return redirect("/subproducts")->with('success', 'Subproduct deleted successfully');
    }
}
