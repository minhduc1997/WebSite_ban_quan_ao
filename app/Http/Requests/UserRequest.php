<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'email'=>'required|email',
            'password'=>'required|min:3',
            'full'=>'required|min:3',
            'address'=>'required',
            'phone'=>'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>'email không được để trống.',
            'email.email'=>'email không được vượt quá 10 ký tự',
            'password.required'=>'password không được để trống',
            'password.min'=>'password không được để trống',
            'full.required'=>'full không được để trống.',

            'address.required'=>'address không được để trống.',
            'phone.required'=>'phone không được để trống.',
            'phone.numeric'=>'full phải là số.',
        ];
    }
}
