<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'image' => 'file|max:512|mimes:jpg,bmp,png',
        ];
        if ($this->route()->named('users.update')) {
            $rules['name'] = [
                'required',
                Rule::unique('users', 'name')->ignore($this->user->id),
            ];
            $rules['email'] = [
                'required',
                Rule::unique('users', 'email')->ignore($this->user->id),
            ];
        }
        return $rules;
    }
}
