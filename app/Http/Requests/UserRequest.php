<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'login' => 'required', 'string',
            'password' => 'required', 'string',
        ];
    }
    public function messages()
    {
        return [
            'login.required' => 'Bạn không được để trống !',
            'login.string' => 'Bạn phải nhập chuỗi !',
            'password.required' => 'Bạn không được để trống !',
            'password.string' => 'Bạn phải nhập chuỗi !',
        ];
    }
}
