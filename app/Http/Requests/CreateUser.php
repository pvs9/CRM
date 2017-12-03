<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			'last_name' => 'required|string|max:25',
			'first_name' => 'required|string|max:25',
			'position' => 'nullable|string|max:25',
			'email' => 'required|string|email|max:25|unique:users',
			'is_admin' => 'required|boolean',
			'password' => 'required|string|min:6|max:25',
        ];
    }
}
