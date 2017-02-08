<?php

namespace Admailer\Http\Controllers\Portal;

use Admailer\Http\Controllers\Controller;
use Admailer\Models\Portal\Message;
use Input;
use Request;
use Vinkla\Pusher\Facades\Pusher;

class ChatController extends Controller {
    
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    public function getLogin()
    {
        return view("portal.login");
    }
 
    public function getChat()
    {

        return view("portal.chat");
    }
 
    public function saveMessage()
    {
        if(Request::ajax()) {
            $data = Input::all();
            $message = new Message;
            $message->author = $data["author"];
            $message->message = $data["message"];
            $message->save();
 
            Pusher::trigger('chat', 'message', ['message' => $message]);
        }
 
    }
 
    public function listMessages(Message $message) {
        return response()->json($message->orderBy("created_at", "DESC")->take(5)->get());
    }
}
