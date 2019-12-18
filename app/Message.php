<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function getMy_Message()
    {
        $messages = Message::where([
            ['id_user_send', '=', Auth::user()->id],
            ['id_user_received', '=', Auth::user()->id],
        ])->get();

        return $messages;
    }
}
