<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormInputRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg|max:2000',
            'price'=>'required'
        ];
    }
}
