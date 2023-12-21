<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'email' => 'unique:users',
            'phone' => 'required',
            'phone' => 'unique:users',
            'password' => 'required',
            'cfpassword' => 'required|same:password', 
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Trường này không được để trống',
            'email.required' => 'Trường này không được để trống',
            'email.unique' => 'Email này không tồn tại trong hệ thống. Vui lòng nhập lại.',
            'phone.required' => 'Trường này không được để trống',
            'phone.unique' => 'Số điện thoại này đã tồn tại trong hệ thống. Vui lòng nhập lại.',
            'password.required' => 'Trường này không được để trống',
            'cfpassword.required' => 'Trường này không được để trống',
            'cfpassword.same' => 'Mật khẩu xác nhận không đúng',
        ];
    }
}
