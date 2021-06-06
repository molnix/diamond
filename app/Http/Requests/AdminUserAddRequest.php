<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserAddRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'=>'required|min:2|max:20',
            'telephone'=>'required|max:11',
            'email'=>'required|email:rfc|unique:users|max:100',
            'password'=>'required|min:6|max:100',
            'access_id'=>'required|integer|max:11',
        ];
    }
}
