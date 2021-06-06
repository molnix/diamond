<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCategoryCreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'category'=>'required',
        ];
    }
}
