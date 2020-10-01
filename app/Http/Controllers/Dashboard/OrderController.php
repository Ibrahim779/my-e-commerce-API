<?php

namespace App\Http\Controllers\Dashboard;

use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::pending()->get();
        return view('dashboard.order.index',compact('orders'));
    }
    public function completed()
    {
        $orders = Order::completed()->get();
        return view('dashboard.order.index',compact('orders'));
    }
    public function show(Order $order)
    {
        $cartItems = Cart::getUserCart($order->user_id)->whereOrderId($order->id)->get();
        return view('dashboard.order.show',compact('order','cartItems'));
    }
    public function update(Order $order)
    {
        $this->saveData($order);
        return back();
    }
    public function destroy(Order $order)
    {
       $order->delete();
       return redirect()->back();
    }
    private function validation()
    {
        return request()->validate([
            'status' => 'required|min:3|max:191',
        ]);
    }
    private function saveData($order)
    {
        $this->validation();
        $order->status = request()->status;
        $order->save();
    }

}
