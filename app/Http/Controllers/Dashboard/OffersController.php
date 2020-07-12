<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function index()
    {
        $offers = Product::offer()->get();
        return view('dashboard.offer.index', compact('offers'));
    }
}
