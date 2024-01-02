<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'password' => 'required', 'string',
            'name' => 'required', 'string',
            'email' => 'required', 'email','unique:users',
            'password_confirmation' => 'required', 'string',
        ];
    }
    public function messages()
    {
        return [
            'password.required' => 'Bạn không được để trống !',
            'password.string' => 'Bạn phải nhập chuỗi !',
            'name.required' => 'Bạn không được để trống !',
            'name.string' => 'Bạn phải nhập chuỗi !',
            'email.required' => 'Bạn không được để trống !',
            'email.string' => 'Bạn phải nhập chuỗi !',
            'email.email' => 'Bạn phải nhập đúng định dạng email !',
            'email.unique' => 'Email của bạn đã tồn tại trong hệ thống !',
            'password_confirmation.required' => 'Bạn không được để trống !',
            'password_confirmation.string' => 'Bạn phải nhập chuỗi !',
        ];
    }
}
