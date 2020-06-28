<?php

namespace App\Http\Controllers\Dashboard\API;

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
       return Message::get();
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
