<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistedRequest extends FormRequest
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
            'email' => ['required', 'email', 'max:50'],
            'phone' => ['required','digits_between:10,16', "regex:/^[0-9]*$/"],
            'compagny' => ['nullable', 'string'],
            'pass' => ['required', 'string'],
            'commune' => ['required', "regex:/^[a-zA-Z ']*$/", 'string','min:3', 'max:30'],
            'event_id' => ['required', 'exists:events,id'],
        ];
    }
}
// 'email' => ['required', 'unique:registeds,email', 'email', 'max:50'],
// 'phone' => ['required', 'unique:registeds,phone','digits_between:10,16', "regex:/^[0-9]*$/"],