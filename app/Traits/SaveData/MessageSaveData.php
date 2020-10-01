<?php


namespace App\Traits\SaveData;


use App\Message;

trait MessageSaveData
{
    private function validation()
    {
        return request()->validate([
            'name' => 'required|min:3|max:191',
            'phone' => 'required|numeric|digits:11|max:191',
            'message' => 'required|min:10',
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
