<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Register;

class CartController extends Controller
{

    public function index()
    {
        $u_id = session('user_id');
        $carts = Cart::where('uid', $u_id)->with('subProduct')->get();
        //return compact('carts');
        return view('user/cart', compact('carts'));
    }
    public function adminindex()
    {
        $farmer = Register::where('user_type','1')->count();
        $agent = Register::where('user_type','3')->count();
        $user = Register::where('user_type','2')->count();

        return view('admin/index',compact('farmer','agent','user'));  

    }


    public function count()
    {
        $u_id = session('user_id');
        $totalProductsInCart = Cart::where('uid', $u_id)->count();
        return response()->json([
            'totalProductsInCart' => $totalProductsInCart
        ]);
        // You can create a form view to add items to the cart here
    }

    public function updateCartQuantity(Request $request)
    {
        // Retrieve the cart ID and quantity from the request
        $cartId = $request->input('cart_id');
        $quantity = $request->input('quantity');

        try {
            // Find the cart item
            $cart = Cart::findOrFail($cartId);
             $price = $cart->price;
            // Update the quantity
            $cart->qty = $quantity;
            $cart->total_price = $quantity * $price;
            $cart->save();

            // You can return a success response if needed
            return response()->json(['success' => 'Cart quantity updated successfully']);

        } catch (\Exception $e) {
            // Return error response if something goes wrong
            return response()->json(['error' => 'Failed to update cart quantity'], 500);
        }
    }
    public function getTotalCartValue()
    {
        // Get the current authenticated user
        $userid = session('user_id');

        // Retrieve cart items for the user
        $cartItems = Cart::where('uid', $userid)->get();

        // Calculate total cart value
        $totalCartValue = 0;
        foreach ($cartItems as $item) {
            $totalCartValue += $item->total_price;
        }
        return view('user/checkout', compact('totalCartValue'));
        // You can return the total cart value or perform any additional processing
        return compact('totalCartValue');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'spid' => 'required',
            'price' => 'required',
        ]);

        // Get the user ID from session
        $u_id = session('user_id');

        // Check if the item already exists in the cart
        $existingCartItem = Cart::where('uid', $u_id)
            ->where('spid', $request->input('spid'))
            ->first();

        if ($existingCartItem) {
            // If the item already exists in the cart, update the quantity and total price
            $existingCartItem->qty += 1;
            $existingCartItem->total_price += $request->input('price');
            $existingCartItem->save();
            $totalProductsInCart = Cart::where('uid', $u_id)->count();

            return response()->json([
                'success' => 'Item quantity updated in the cart',
                'total' => $totalProductsInCart
            ]);
        } else {
            // If the item does not exist in the cart, create a new cart item
            $cart = new Cart();
            $cart->uid = $u_id;
            $cart->spid = $request->input('spid');
            $cart->price = $request->input('price');
            $cart->qty = 1;
            $cart->total_price = $request->input('price');
            $cart->save();
            $totalProductsInCart = Cart::where('uid', $u_id)->count();

            return response()->json([
                'success' => 'Item added to cart successfully',
                'total' => $totalProductsInCart
            ]);
        }
    }

    public function show(Cart $cart)
    {
        return view('carts.show', compact('cart'));
    }
    public function edit(Cart $cart)
    {
        // You can create an edit form view to update cart items here
    }
    public function update(Request $request, Cart $cart)
    {
        // Validate the request
        $request->validate([
            'uid' => 'required',
            'spid' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'total_price' => 'required',
        ]);

        // Update the cart item
        $cart->update($request->all());

        return redirect()->route('carts.index')
            ->with('success', 'Item updated successfully.');
    }


    public function destroy(Request $request, $id)
    {

        // Find the cart item by its ID
        $cart = Cart::find($id);

        // Check if the cart item exists
        if (!$cart) {
            return response()->json(['error' => 'Cart item not found.'], 404);
        }

        // Delete the cart item
        $cart->delete();

        // Return a success response
        return response()->json(['success' => 'Item removed from cart successfully.']);
    }
}
