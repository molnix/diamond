<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email'=>'required|email:rfc|max:100',
            'password'=>'required|max:100',
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Введите email',
            'email.max'=>'Email не может быть больше 100 символов',
            'password.required'=>'Введите пароль',
            'password.max'=>'Пароль не может быть больше 100 символов',
        ];
    }
}
