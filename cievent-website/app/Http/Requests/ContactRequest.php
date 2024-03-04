<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'title' => ['required', 'string','min:3', 'max:25'],
            'subject' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email', 'max:150'],
            'message' => ['required', 'string', 'min:20'],
        ];
    }
}
