<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminJobRequest extends FormRequest
{
    public function rules()
    {
        return [
            'worker'=>'required|integer|max:11',
            'client'=>'required|email:rfc|max:100',
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|numeric|max:99999999999999999999.999999999',
            'status'=>'required|integer|max:11',
            'end_date'=>'date_format:Y/m/d|max:20',
            'image_before'=>'image|mimes:jpeg,png,jpg,svg',
            'image_after'=>'image|mimes:jpeg,png,jpg,svg',
        ];
    }
}
