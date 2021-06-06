<?php

namespace App\Http\Controllers;

use App\Service\fileServices;
use Illuminate\Http\Request;
use App\Http\Requests\AdminUserAddRequest;
use App\Http\Requests\AdminUserUpdateRequest;
use App\User;
use App\Job;
use App\Statuses;
use App\Access;
use App\Category;
use App\Product;
use App\Chat;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show(){
        return view('admin.pages.adminUsers',[
            'user'=>auth()->user(),
            'allUsers'=>User::where('access_id','!=',3)->paginate(10),
            'access'=>Access::where('id','!=',3)->get(),
        ]);
    }

    public function show_main(){ 
        return view('mainPage.welcome',[
            'finishJobs'=>Job::where('status_id',4)->latest()->take(3)->get(),
        ]);
    }

    public function show_profile(){
        if(auth()->user()['access_id']===3){
            return view('user.profile',[
                'user'=>auth()->user(),
                'jobs'=>Job::with('status','worker','client')->where('client_id',auth()->user()['id'])->get(),
                'statuses'=>Statuses::all(),
                'chat'=>Chat::where('user_id',auth()->user()['id'])->first(),
                ]);
        }
        if(auth()->user()['access_id']===1){
            return view('admin.adminProfile');
        }
        if(auth()->user()['access_id']===2){
            return view('worker.workerProfile',[
                'user'=>auth()->user(),
                'clients'=>User::with('access')->where('access_id',3)->get(),
                'statuses'=>Statuses::all(),
                'jobs'=>Job::with('status','worker','client')->where('worker_id',auth()->user()['id'])->get(),
                ]);
        }
    }

    public function admin_create(AdminUserAddRequest $request)
    {
        $user=User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'telephone' => (int)$request['telephone'],
            'password' => Hash::make($request['email'] . '_' . $request['password']),
            'access_id' => (int)$request['access_id'] != null ? (int)$request['access_id'] : 3,
            'email_verified' => 1,
        ]);
        return redirect(route('profile'));
    }

    public function show_admin_update($id){
        return view('admin.updates.updateUser',[
            'userUpdate' => User::where('id', $id)->with('access')->first(),
            'access' => Access::all(),
        ]);
    }
    public function admin_update(AdminUserUpdateRequest $request ,$id){
        $user = User::find($id);
        $data =[
            'name' => $request['name'],
            'email' => $request['email'],
            'telephone' => $request['telephone'],
            'access_id' => $request['access_id'],
        ];
        if($user->email != $request['email']){
            if (User::where('email', $request['email'])->first()) {
                return back()->withErrors(['errorEmailMessage' => "Email занят"])
                    ->withInput();
            }
            if(!$request['password']){
                return back()->withErrors(['errorEmailMessage' => "При смене email смените пароль"])
                    ->withInput();
            }
        }
        if ($request['password']) {
            $data['password'] = Hash::make($request['email'] . '_' . $request['password']);
        }
        $user->update($data);
        return redirect(route('profile'));
    }
}
