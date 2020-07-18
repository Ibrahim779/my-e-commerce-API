<?php

namespace App\Http\Controllers\Dashboard;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Product::offer()->get();
        return view('dashboard.offer.index', compact('offers'));
    }
}
