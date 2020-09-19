<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
             'title' => 'required|string|max:20 ',
             'description' => 'required|string|max:200',
             'subtitle' => 'required|string|max:30',
             'images' => 'max:5',
             'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'addprice' => 'integer|nullable',
             'category' => '',
             'price' => 'required'
        ];

    }
    public function messages()
    {
        return [


        ];
    }
}
