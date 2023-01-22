<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title'=>'required',
            'text'=>'required',
            'image'=>'required',
            'user_id'=>'required',
            
            //
        ];
    }

    public function messages(){
        return[
            'title.required'=>'a title is required',
            'text.required'=>'you must enter the text',
            'image.required'=>'image is required',
            'user_id.required'=>'user_id is required',

        ];

    }
}
