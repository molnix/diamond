<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkerJobUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|numeric|max:9999999999999999999',
            'status'=>'required|integer|max:11',
            'end_date'=>'date_format:Y/m/d|max:20',
            'image_before'=>'image|mimes:jpeg,png,jpg,svg',
            'image_after'=>'image|mimes:jpeg,png,jpg,svg',
        ];
    }
}
