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
            'name' =>['required', 'string', 'max:255'] ,
            'email' =>['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'] ,
            'title' => ['required', 'string', 'max:30'],
            'title' => ['required', 'string', 'max:30'],
            'slug' => ['required', 'string', 'max:35'],
            'description' => ['required', 'string', 'max:100'],
            'image' => ['required'],

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
