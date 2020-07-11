<?php

namespace App\Http\Controllers\Dashboard\API;

use App\Message;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticController extends Controller
{
    public function productsNotAllow()
    {
        return Product::notAllow()->take(4)->get();
    }
    public function productsNotAllowCount()
    {
        return Product::notAllow()->count();
    }
    public function pendingOrders()
    {
        return Order::pending()->get();
    }
    public function pendingOrdersCount()
    {
        return Order::pending()->count();
    }
    public function getMessagesCount()
    {
        return Message::count();
    }
    public function getLatestMessages()
    {
        return Message::latest('created_at')->take(4)->get();
    }
}
