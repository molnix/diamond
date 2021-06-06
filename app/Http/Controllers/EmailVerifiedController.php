<?php

namespace App\Http\Controllers;

use App\Chat;
use Illuminate\Http\Request;
use App\VerifiedEmail;
use App\User;

class EmailVerifiedController extends Controller
{
    public function email_verified($token){
        $verified_email=VerifiedEmail::where('email_verified_token',$token)->first();
        if($verified_email){
            $user = User::find($verified_email->user_id);
            if($user){
                $user->update([
                    'email_verified'=>true,
                ]);
                VerifiedEmail::where('user_id',$user->id)->delete();
                Chat::create([
                    'user_id'=>$user->id,
                ]);
                return redirect(route('login'));
            }
        }
        return abort(404);
    }
}
