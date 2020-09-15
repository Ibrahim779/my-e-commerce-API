<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('site.profile.edit');
    }
    public function orders()
    {
        return view('site.profile.orders.index');
    }
    public function orderShow()
    {
        return view('site.profile.orders.show');
    }
}
