<?php

namespace App\Http\Controllers\Dashboard;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->get();
        return view('dashboard.order.index',compact('orders'));
    }
    public function show(Order $order)
    {
        return view('dashboard.order.show',compact('order'));
    }
    public function destroy(Order $order)
    {
       $order->delete();
       return redirect()->back();
    }

}
