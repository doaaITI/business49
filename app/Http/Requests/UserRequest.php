<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UserRequest extends FormRequest
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
            'name' => 'required|max:50|min:3|max:100|regex:/^[\pL\s]+$/u',
            'email' => [
                'required','email',
                Rule::unique('users'),
            ],

            'password' => 'required|min:6',
            'password_confirmation'=> 'required|same:password',

        ];

    }

    public function messages()
    {
        return [
            'email.required' => trans('admin.validation.email_required'),
            'email.valid' => trans('admin.validation.email_valid'),
            'name.required' =>trans('admin.validation.name_required'),
            'name.max'=>'الاسم لا يجب أن يزيد عن 100 حرف',
            'name.min'=>trans('admin.validation.name_min'),

            'name.regex'=>'الاسم يجب أن يكون نص',

            'password.required' =>trans('admin.validation.password_required'),
            'password.min' =>trans('admin.validation.password_min'),

            'password.confirmed' =>trans('admin.validation.password_confirm'),

            'password_confirmation.required' =>'تأكيد كلمة المرور مطلوب',
            'password_confirmation.same'=>trans('admin.validation.password_confirm'),
            'email.unique'=>trans('admin.validation.email_unique'),

        ];
    }
}
