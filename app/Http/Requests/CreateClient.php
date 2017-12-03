<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClient extends FormRequest
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
			'last_name' => 'required|string|max:25',
			'first_name' => 'required|string|max:25',
			'given_name' => 'nullable|string|max:25',
			'company' => 'required|string|max:25',
			'position' => 'nullable|string|max:25',
			'email' => 'required|string|email|max:25|unique:clients',
			'telephone' => 'nullable|string|max:25',
			'telephone2' => 'nullable|string|max:25',
        ];
    }
}
