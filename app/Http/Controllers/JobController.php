<?php

namespace App\Http\Controllers;

use App\Access;
use Illuminate\Http\Request;
use App\Http\Requests\AdminJobRequest;
use App\Http\Requests\WorkerJobRequest;
use App\Http\Requests\WorkerJobUpdateRequest;
use App\Job;
use App\User;
use App\Statuses;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Service\fileServices;

class JobController extends Controller
{
    public function show(){
        return view('admin.pages.adminJobs',[
            'jobs'=>Job::paginate(10),
            'user'=>auth()->user(),
            'workers'=>User::where('access_id',2)->get(),
            'clients'=>User::where('access_id',3)->get(),
            'statuses'=>Statuses::all(),
        ]);
    }

    public function admin_create(AdminJobRequest $request, fileServices $fileServices)
    {
        $client = User::where('email', $request['client'])->first();
        if ($client) {
            $data = [
                'worker_id' => (int)$request['worker'],
                'client_id' => (int)$client->id,
                'name' => $request['name'],
                'description' => $request['description'],
                'price' => $request['price'],
                'time_end' => $request['time_end'],
                'status_id' => (int)$request['status'],
            ];

            if ($request->hasFile('image_before')) {
                $time = str_replace('/','a',Hash::make(time()));
                $time = str_replace('.','_',$time);
                $image_path = "img/" . $client->email . "/" . $time . "/";
                $data['image_before'] = $image_path . $request->file('image_before')->getClientOriginalName();
                $fileServices->uploadFile($request->file('image_before'), $image_path);
            }

            Job::create($data);
        } else {
            return back()->withErrors(['errorEmailMessage' => "Не найден email:{$request['client']}"])
                ->withInput();
        }

        return redirect(route('admin_show_jobs'));
    }

    public function show_admin_update($id){
        return view('admin.updates.updateJob',[
            'jobUpdate' => Job::where('id', $id)->with('client', 'status')->first(),
            'workers' => User::where('access_id',2)->get(),
            'clients'=> User::where('access_id',3)->get(),
            'statuses' => Statuses::all(),
        ]);
    }
    public function admin_update(AdminJobRequest $request, fileServices $fileServices, $id){
        $client = User::where('email', $request['client'])->first();
        $job=Job::find($id);
        if (empty($client)) {
            return back()->withErrors(['errorEmailMessage' => "Не найден email:{$request['client']}"])
                ->withInput();
        }
        $data=[
            'worker_id' => $request['worker'],
            'client_id' => (int)$client->id,
            'name' => $request['name'],
            'description' => $request['description'],
            'price' => (int)$request['price'],
            'time_end' => $request['time_end'],
            'status_id' => (int)$request['status'],
        ];
        if ($request->hasFile('image_before')) {
            $time = str_replace('/','a',Hash::make(time()));
            $time = str_replace('.','_',$time);
            $image_path = "img/" . $client->email . "/" . $time . "/";
            $data['image_before'] = $image_path . $request->file('image_before')->getClientOriginalName();
            $fileServices->deleteFile($job->image_before);
            $fileServices->uploadFile($request->file('image_before'), $image_path);
        }
        if ($request->hasFile('image_after')) {
            $time = str_replace('/','a',Hash::make(time()));
            $time = str_replace('.','_',$time);
            $image_path = "img/" . $client->email . "/" . $time . "/";
            $data['image_after'] = $image_path . $request->file('image_after')->getClientOriginalName();
            $fileServices->deleteFile($job->image_after);
            $fileServices->uploadFile($request->file('image_after'), $image_path);
        }
        $job->update($data);
        return redirect(route('admin_show_jobs'));
    }

    public function worker_create(WorkerJobRequest $request, fileServices $fileServices){
        $client=User::where('email',$request['client'])->first();
        if($client){
            $data=[
                'worker_id'=>auth()->user()['id'],
                'client_id'=>(int)$client->id,
                'name' => $request['name'],
                'description' => $request['description'],
                'price'=>$request['price'],
                'status_id'=>(int)$request['status'],
                'time_end' => $request['time_end'],
            ];
            if ($request->hasFile('image_before')) {
                $time = str_replace('/','a',Hash::make(time()));
                $time = str_replace('.','_',$time);
                $image_path = "img/" . $client->email . "/" . $time . "/";
                $data['image_before'] = $image_path . $request->file('image_before')->getClientOriginalName();
                $fileServices->uploadFile($request->file('image_before'), $image_path);
            }
            Job::create($data);
        }
        else{
            return redirect()->back()->withErrors(['errorEmailMessage'=>"Не найден email:{$request['client']}"])
            ->withInput();
        }

        return redirect()->back();
    }

    public function show_worker_update($id){
        return view('worker.updates.updateJob',
        [
            'jobUpdate'=>Job::where('id',$id)->with('status')->first(),
            'statuses'=>Statuses::all(),
        ]);
    }
    public function worker_update(WorkerJobUpdateRequest $request, fileServices $fileServices, $id){
        $job=Job::find($id);
        $client=User::find($job->client_id);
        $data=[
            'name' => $request['name'],
            'description' => $request['description'],
            'price'=>(int)$request['price'],
            'status_id'=>(int)$request['status'],
            'time_end' => $request['time_end'],
        ];
        if ($request->hasFile('image_before')) {
            $time = str_replace('/','a',Hash::make(time()));
            $time = str_replace('.','_',$time);
            $image_path = "img/" . $client->email . "/" . $time . "/";
            $data['image_before'] = $image_path . $request->file('image_before')->getClientOriginalName();
            $fileServices->deleteFile($job->image_before);
            $fileServices->uploadFile($request->file('image_before'), $image_path);
        }
        if ($request->hasFile('image_after')) {
            $time = str_replace('/','a',Hash::make(time()));
            $time = str_replace('.','_',$time);
            $image_path = "img/" . $client->email . "/" . $time . "/";
            $data['image_after'] = $image_path . $request->file('image_after')->getClientOriginalName();
            $fileServices->deleteFile($job->image_after);
            $fileServices->uploadFile($request->file('image_after'), $image_path);
        }

        $job->update($data);
        return redirect(route('profile'));
    }

    public function finish($id)
    {
        Job::find($id)->update([
            'status_id' => 1,
        ]);

        return redirect(route('profile'));
    }

    public function confirm($id){
        Job::find($id)->update([
            'status_id'=>4,
        ]);
        return redirect(route('profile'));
    }

    public function delete($id, fileServices $fileServices)
    {
        $job=Job::find($id);
        $files=[$job->image_before,$job->image_after];
        $fileServices->deleteFile($files);
        $job->delete();

        return redirect(route('profile'));
    }
}
