<?php

namespace App\Http\Controllers\Home;

use App\Message;
use App\Traits\SaveData\MessageSaveData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    use MessageSaveData;
    public function index()
    {
        return view('site.contact.index');
    }
    public function store()
    {
        $this->saveData(new Message());
        return back();
    }
}
