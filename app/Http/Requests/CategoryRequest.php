<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            //
            'name'=>'required | min:3|max:20'
        ];
    }


    public function messages()
    {
        return [
            'name.required'=>'category name required',
            'name.min'=>'category min length 3 character ',
            'name.max'=>'category max length 10 character',
        ];
    }
}
