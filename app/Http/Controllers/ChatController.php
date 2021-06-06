<?php

namespace App\Http\Controllers;

use App\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(){
        return view('admin.pages.adminChats',[
            'chats'=>Chat::orderBy('new_message','desc')->get(),
            'chats_tracked'=>Chat::where('tracked',1)->orderBy('new_message','desc')->get(),
        ]);
    }
    public function get_chats(){
        return view('chat.getChats',[
            'chats'=>Chat::orderBy('new_message','desc')->get(),
        ]);
    }

    public function get_tracked_chats(){
        return view('chat.getTrackedChats',[
            'chats_tracked'=>Chat::where('tracked',1)->orderBy('new_message','desc')->get(),
        ]);
    }

    public function tracked($id){
        $chat=Chat::find($id);
        if($chat->tracked == 0){
            $chat->update([
                'tracked'=>1,
            ]);
        }
        else{
            $chat->update([
                'tracked'=>0,
            ]);
        }
        return redirect()->back();
    }
}
