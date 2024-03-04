<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditInviteRequest extends FormRequest
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
            'name_invit' => ['required', 'string', "regex:/^[a-zA-Z0-9 ']*$/", 'min:2', 'max:25'],
            'surname_invit' => ['required', 'string', "regex:/^[a-zA-Z0-9 ']*$/", 'min:2', 'max:255'],
            'compagny_invit' => ['required', 'string', 'min:3', 'max:255'],
            'description_invit' => ['required', 'string', 'min:3'],
            'event_id' => ['required'],
            'img_invit' => ['nullable', 'image', 'mimes:jpeg,jpg,png'],
        ];
    }
}
