<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegRequest;
use App\Mail\emailVerifiedMail;
use App\VerifiedEmail;
use App\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function show_login(){
        return view('authorization');
    }
    public function login(AuthRequest $request){
        $user=User::where('email',$request['email'])->first();
        if($user && $user->email_verified && Hash::check($request['email'].'_'.$request['password'], $user->password)){
            auth()->login($user);
            return redirect(route('profile'));
        }
        return redirect()->back()->withErrors(['errorAuthMessage'=>"Неверно введены данные"])->withInput();
    }

    public function show_register(){
        return view('registration');
    }
    public function registration(RegRequest $request){
        $token=Hash::make(Str::random(200));
        $token = str_replace('/','a',$token);
        $token = str_replace('.','s',$token);
        $token = $request['email'].$token;
        $user=User::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'telephone'=>(int)$request['telephone'],
            'password'=>Hash::make($request['email'].'_'.$request['password']),
        ]);
        VerifiedEmail::create([
            'user_id'=>$user->id,
            'email_verified_token'=>$token,
        ]);
        $data=URL::temporarySignedRoute('email_verified', now()->addMinutes(10), ['token' => $token]);
        Mail::to($request['email'])->send(new emailVerifiedMail($data));
        return redirect(route('login'))->withErrors(['errorAuthMessage'=>"Вам на почту отправлено письмо с подтверждением email"]);
    }

    public function logout(){
        auth()->logout();
        return redirect(route('main'));
    }
}
