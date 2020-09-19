<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
            'title' =>'string|max:30' ,

            'description' => 'string|max:100' ,
            'image' => '',
            'user_id' => '',

        ];

    }
    public function message(){
        return [
            'required' =>'Ecrire quelque chose' ,
            'string' => 'it should be string' ,
            'max' => 'you should add less than 100 ',



        ];
    }

}
