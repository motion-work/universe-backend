<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewUserRequest extends FormRequest
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
            'firstName' => 'required|max:30',
            'lastName'  => 'required|max:30',
            'job_title' => 'required|max:100',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:6',
        ];
    }
}
