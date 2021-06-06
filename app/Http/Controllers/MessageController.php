<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Message;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MessageController extends Controller
{
    public function create(Request $request, $id){
        $data=array();
        if($request->hasFile('file')){
            $file=$request->file('file');
            $time = str_replace('/','a',Hash::make(time()));
            $time = str_replace('.','_',$time);
            $image_path = "messages_image/" . auth()->user()['email'] . "/" . $time . "/";
            $data['image']=$image_path.$file->getClientOriginalName();
            $file->move($image_path,$file->getClientOriginalName());
        }
        if($request['message']){
            $data['message']=$request['message'];
        }
        if(!$request->hasFile('file') && !$request['message']){
            return response(json_encode(['error'=>'Отправьте сообщение или файл']));
        }
        $data['user_id']=auth()->user()['id'];
        $data['chat_id']=$id;
        $message=Message::create($data);
        Chat::find($message->chat_id)->update(['new_message'=>$message->created_at,]);
        if($message){
            return response(json_encode(['error'=>'Сообщение отправленно']));
        }
        return response(json_encode(['error'=>'Сообщение не отправленно']));
    }
    public function get($id){
        return view('chat.getMessages',[
            'messages'=>Message::where('chat_id',$id)->with('user')->get(),
        ]);
    }
}
