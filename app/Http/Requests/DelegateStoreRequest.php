<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class DelegateStoreRequest extends FormRequest
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
           'name'=>'required|min:6',
           'email'=>[ 'required', 'email',Rule::unique('delegates')],
           'phone'=>['required',Rule::unique('delegates')],
           'delegate_serial'=>['required',Rule::unique('delegates')]

        ];
    }
}
