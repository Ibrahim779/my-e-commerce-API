<?php

namespace App\Http\Controllers\Home;

use App\Subscribe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscribeController extends Controller
{
    public function store()
    {
        Subscribe::create($this->validation());
        return redirect()->back();
    }
    private function validation()
    {
       return request()->validate([
            'email' => 'required|email|unique:subscribes'
        ]);
    }
}
