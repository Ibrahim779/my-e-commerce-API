<?php

namespace App\Http\Controllers\Dashboard;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        Message::get();
        return view('dashboard.message.index');
    }

    /**
     * @param Message $message
     * @throws \Exception
     */
    public function destroy(Message $message)
    {
       $message->delete();
    }
}
