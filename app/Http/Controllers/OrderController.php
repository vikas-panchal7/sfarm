<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_products;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function placeOrder(Request $request)
    {

        $userid = session('user_id');
        $cartItems = Cart::where('uid', $userid)->get();
        // Create a new Order instance and fill it with form data
        $order = new Order();
        $order->user_id =  $userid;
        $order->first_name = $request->input('first_name');
        $order->last_name = $request->input('last_name');
        $order->street_address = $request->input('street_address');
        $order->town_city = $request->input('town_city');
        $order->postcode_zip = $request->input('postcode_zip');
        $order->phone = $request->input('phone'); // Phone is optional, so use input method to get it
        $order->email_address = $request->input('email_address');
        $order->total_amount = $request->input('carttotal');
        $order->save();


        foreach ($cartItems as $cartItem) {
            $orderProduct = new Order_products();
            $orderProduct->oid = $order->id;
            $orderProduct->spid = $cartItem->spid;
            $orderProduct->price = $cartItem->price;
            $orderProduct->qty = $cartItem->qty;
            $orderProduct->total_price = $cartItem->total_price;
            $orderProduct->save();
        }
        Cart::where('uid', $userid)->delete();
        // Redirect or return success message
        return redirect('/shop')->with('success', 'Order placed successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        //
        $userid = session('user_id');
        $orders = Order::where('user_id', $userid)->get();
        return view('user/order', ['orders' => $orders]);
    }

    public function orderList()
    {
        $orders = Order::get();
        //return ['orders' => $orders];
        return view('admin/orderslist', ['orders' => $orders]);
    }
    public function orderdetails(Request $request)
    {
        $id = $request->input('id');
        $orders = Order::where('id', $id)->get();
        $orderProducts = Order_products::with('subProduct')->where('oid', $id)->get();
        //return ['orders' => $orders,'orderProducts ' => $orderProducts ];
        return view('user/orderview', compact('orders', 'orderProducts'));
    }
    // In your controller
    public function updateOrderStatus(Request $request)
    {
        $orderId = $request->input('orderId');
        $status = $request->input('status');

        // Update order status in the database
        $order = Order::find($orderId);
        $order->status = $status;
        $order->save();

        // Optionally, you can return a response to the AJAX request
        return response()->json(['success' => true]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
