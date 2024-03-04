<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'vip' => ['required', 'digits_between:4,7'],
            'standard' => ['required', 'digits_between:4,7'],
            'img' => ['required', 'image', 'mimes:jpeg,jpg,png'],
            'contact_one' => ['required', 'digits:10'],
            'contact_two' => ['nullable', 'digits:10'],
            'description' => ['required', 'string', 'min:3'],
            'date' => ['required', 'date', 'date_format:Y-m-d'],
            'time' => ['required', "date_format:H:i"],
            'place' => ['required', 'string', "regex:/^[a-zA-Z0-9 ']*$/"],
            'url' => ['required', 'string', 'min:12'],
            'name_invit' => ['required', 'string', "regex:/^[a-zA-Z0-9 ']*$/", 'min:2', 'max:25'],
            'surname_invit' => ['required', 'string', "regex:/^[a-zA-Z0-9 ']*$/", 'min:2', 'max:255'],
            'compagny_invit' => ['required', 'string', 'min:3', 'max:255'],
            'statut' => ['required', 'boolean'],
            'img_invit' => ['nullable', 'image', 'mimes:jpeg,jpg,png'],
            'description_invit' => ['required', 'string', 'min:3'],
        ];
    }
}