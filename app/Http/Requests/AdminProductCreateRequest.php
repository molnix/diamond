<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductCreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|numeric|max:99999999999999999999.999999999',
            'images'=>'array',
            'images.*'=>'required|mimes:jpeg,png,jpg,svg',
        ];
    }
}
