<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>'emailkhông được để trống.',
            'email.email'=>'email không được vượt quá 10 ký tự',
            'password.required'=>'password sản phẩm đã tồn tại',
            'password.min'=>'password không được để trống',
        ];
    }
}
