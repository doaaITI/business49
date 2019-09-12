<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required |min:6',
            'base_location'=>'required',
            'department'=>'required',
            'description'=>'required',
            'brand_image'=>'required |mimes:jpeg,jpg,bmp,png',
            'mobile'=>'required'
        ];
    }
}
