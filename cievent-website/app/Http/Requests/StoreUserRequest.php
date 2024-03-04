<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => ['required', 'string', "regex:/^[a-zA-Z ']*$/", 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'digits_between:10,16', "regex:/^[0-9]*$/", 'unique:users'],
            'admin' => [ 'nullable', 'boolean'],
            'author' => [ 'nullable', 'boolean'],
            'password' => ['required', 'string', 'min:8', 'max:150','confirmed'],
        ];
    }
}
