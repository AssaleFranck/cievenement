<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditEventRequest extends FormRequest
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
            'name' => ['required', 'string', "regex:/^[a-zA-Z0-9 ']*$/", 'min:3', 'max:255'],
            'contact_one' => ['required', 'digits:10'],
            'contact_two' => ['nullable', 'digits:10'],
            'description' => ['required', 'string', 'min:3'],
            'vip' => ['required', 'digits_between:4,7'],
            'standard' => ['required', 'digits_between:4,7'],
            'img' => ['nullable', 'image', 'mimes:jpeg,jpg,png'],
            'date' => ['required', 'string'],
            'time' => ['required', 'string', "regex:/^[0-9:]*$/"],
            'place' => ['required', 'string', "regex:/^[a-zA-Z0-9 ']*$/"],
            'url' => ['required', 'string', 'min:12'],
        ];
    }
}
