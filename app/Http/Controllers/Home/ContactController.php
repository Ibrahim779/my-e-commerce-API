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
        $this->saveData(new Message());
        return back();
    }
    private function validation()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'phone' => 'required|min:11',
            'message' => 'required|min:5',
        ]);
    }
    private function saveData(Message $message)
    {
        $this->validation();
        $message->name = request()->name;
        $message->phone = request()->phone;
        $message->message = request()->message;
        $message->user_id = auth()->id();
        $message->save();
    }
}
