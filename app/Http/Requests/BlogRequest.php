<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class BlogRequest extends FormRequest
{
    /**
     * @var mixed
     */

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
            'title' => 'required',
            'description' => 'required',
            'active' => 'required',
            'content_text' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Name Category is required',
            'description.required' => 'Description is required',
            'active.required' => 'Title is required',
            'content_text.required' => 'Price is required',
            'avatar.required' => 'Image is required',
            'avatar.mimes' => 'Type file not true'
        ];
    }
}
