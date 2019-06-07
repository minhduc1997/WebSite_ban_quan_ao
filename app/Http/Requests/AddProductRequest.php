<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'product_code'=>'required|max:10|unique:product,code',
            'product_name'=>'required|min:3|unique:product,name',
            'product_price'=>'required|numeric',
            'product_img'=>'image'
        ];
    }
    public function messages()
    {
        return [
            'product_code.required'=>'Mã sản phẩm không được để trống.',
            'product_code.max'=>'Mã sản phẩm không được vượt quá 10 ký tự',
            'product_code.unique'=>'mã sản phẩm đã tồn tại',
            'product_name.required'=>'Tên sản phẩm không được để trống',
            'product_name.min'=>'Tên sản phẩm không được nhỏ hơn 3 ký tự',
            'product_name.unique'=>'Tên sản phẩm đã tồn tại',
            'product_price.required'=>'Giá sản phẩm không được để trống!',
            'product_price.numeric'=>'Giá sản phẩm đúng định dạng!',
            'product_img.image'=>'File tải lên không đúng định dạng'
        ];
    }
}
