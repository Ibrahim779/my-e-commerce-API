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
        $products_not_allow_count = Product::notAllow()->count();
        $offers = Product::whereIsOffer(1)->take(4)->get();
        $products_not_allow = Product::notAllow()->take(4)->get();
        $pending_orders =  Order::pending()->get();
        $pending_orders_count =  Order::pending()->count();
        $latest_messages = Message::latest('created_at')->take(4)->get();
        $messages_count = Message::count();
        return view('dashboard.index',compact(
            'products_not_allow_count',
                 'products_not_allow',
                    'pending_orders',
                    'pending_orders_count',
                    'latest_messages',
                     'messages_count',
                      'offers'
                 ));


    }
}
