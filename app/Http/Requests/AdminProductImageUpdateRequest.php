<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductImageUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'update_image_file'=>'required|image|mimes:jpeg,png,jpg,svg',
        ];
    }
}
