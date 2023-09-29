<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdatePasswordRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'password' => 'required',
            'password_new' => 'required',
            'password_confirm' => 'required|same:password_new',
            
            
        ];
    }
    public function messages(): array
    {
        return [
            'password.required' => 'Trường này không được để trống',
            'password_new.required' => 'Trường này không được để trống',
            'password_confirm.required' => 'Trường này không được để trống',
            'password_confirm.same' => 'Mật khẩu xác nhận không đúng',
        ];
    }
}
