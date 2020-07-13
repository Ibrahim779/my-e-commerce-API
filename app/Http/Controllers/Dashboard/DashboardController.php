<?php

namespace App\Http\Controllers\Dashboard;

use App\Message;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $products_unpublished_count = Product::unpublished()->count();
        $offers = Product::whereIsOffer(1)->take(4)->get();
        $products_unpublished = Product::unpublished()->take(4)->get();
        $pending_orders =  Order::pending()->get();
        $pending_orders_count =  Order::pending()->count();
        $latest_messages = Message::latest('created_at')->take(4)->get();
        $messages_count = Message::count();
        return view('dashboard.index',compact(
            'products_unpublished_count',
                 'products_unpublished',
                    'pending_orders',
                    'pending_orders_count',
                    'latest_messages',
                     'messages_count',
                      'offers'
                 ));


    }
}
