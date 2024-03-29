<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPostRequest extends FormRequest
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
            'title' => ['required', 'unique:posts,category_id', 'string', 'min:3', 'max:255'],
            'body' => ['required', 'string', 'min:3'],
            'imagePath' => ['nullable', 'image', 'mimes:jpeg,jpg,png'],
            'category_id' => ['required'],
        ];
    }
}
