<?php

namespace App\Http\Controllers;

use App\ResetPassword;
use Illuminate\Http\Request;
use App\Mail\PasswordResetMail;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class PasswordResetController extends Controller
{
    public function show_password_reset(Request $request){
        if(!$request['email']){
            return view('passwordReset.FormPasswordReset');
        }
        else{
            $user = User::where('email',$request['email'])->first();
            if($user){
                $token=Hash::make(Str::random(200));
                $token = str_replace('/','a',$token);
                $token = str_replace('.','s',$token);
                $token = $user->email.$token;
                ResetPassword::where('user_id',$user->id)->delete();
                ResetPassword::create([
                    'user_id'=>$user->id,
                    'password_reset_token'=>$token,
                ]);
                $data=URL::temporarySignedRoute('newPassword', now()->addMinutes(10), ['token' => $token]);
                Mail::to($request['email'])->send(new PasswordResetMail($data));
            }
            return redirect(route('login'))->withErrors(['errorAuthMessage'=>"Вам на почту отправлено письмо с инструкцией"]);
        }
    }
    public function password_reset(Request $request, $token){
        $reset_password=ResetPassword::where('password_reset_token',$token)->first();
        if($reset_password){
            $user = User::find($reset_password->user_id);
            if($user){
                if(!$request['password']){
                    return view('passwordReset.FormNewPassword');
                }
                else{
                    $user->update([
                        'password'=>Hash::make($user->email.'_'.$request['password']),
                    ]);
                    ResetPassword::where('password_reset_token',$token)->delete();
                    return redirect(route('login'));
                }
            }
        }
        return abort(404);
    }
}
