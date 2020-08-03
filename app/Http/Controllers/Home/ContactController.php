<?php

namespace App\Http\Controllers\Home;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        return view('site.contact.index');
    }
    public function store()
    {
        Message::create($this->validation());
        return redirect()->back();
    }
    private function validation()
    {
        return \request()->validate([
            'name' => 'required|min:3',
            'phone' => 'required|min:11',
            'message' => 'required|min:5'

        ]);
    }
}
