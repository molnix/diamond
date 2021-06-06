<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceCreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'work_type_id'=>'required|integer',
            'name'=>'required',
            'price'=>'required',
        ];
    }
}
