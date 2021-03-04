<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:6',
            'content' => 'required',
            'image' => 'required',
            'category_id' => 'required|exists:categories,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Post Title Is Required',
            'content.required' => 'Post Content Is Required',
            'image.required' => 'Post Image Is Required',
            'category_id.required' => 'Please Select category for the post',
        ];
    }
}
