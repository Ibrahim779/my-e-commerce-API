<?php

namespace App\Http\Controllers\Dashboard;

use App\Subscribe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscribeController extends Controller
{
    public function index()
    {
        $subscribes = Subscribe::all();
        return view('dashboard.subscribe.index', compact('subscribes'));
    }
    public function destroy(Subscribe $subscribe)
    {
        $subscribe->delete();
        return redirect()->back();
    }
}
