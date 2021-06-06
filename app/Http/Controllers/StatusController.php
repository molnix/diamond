<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminStatusAddRequest;
use App\Statuses;

class StatusController extends Controller
{
    public function addStatus(AdminStatusAddRequest $request)
    {
        Statuses::create([
            'name' => $request['status'],
        ]);
        return redirect(route('profile'));
    }

    public function deleteStatus($id)
    {
        $status = Statuses::with('job')->where('id', $id)->first();
        if (empty($status->job[0])) {
            Statuses::find($id)->delete();
        }
        return redirect(route('profile'));
    }
}
