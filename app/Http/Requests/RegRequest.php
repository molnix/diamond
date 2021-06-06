<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'=>'required|min:2|max:100',
            'telephone'=>'required|max:11',
            'email'=>'required|email:rfc|unique:users|max:100',
            'password'=>'required|min:6|max:100',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Введите имя',
            'name.max'=>'Имя не может быть больше 100 символов',
            'name.min'=>'Имя не может быть меньше 2 символов',
            'telephone.required'=>'Введите телефон',
            'telephone.max'=>'Телефон не может быть больше 11 символов',
            'email.required'=>'Введите email',
            'email.max'=>'Email не может быть больше 100 символов',
            'email.unique'=>'Email занят',
            'password.required'=>'Введите пароль',
            'password.min'=>'Пароль не может быть меньше 6 символов',
            'password.max'=>'Пароль не может быть больше 100 символов',
        ];
    }
}
