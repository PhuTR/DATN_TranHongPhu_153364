<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdatePhoneRequest extends FormRequest
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
            'phone_new' => 'required',
            'code' => 'required',
        ];
    }

    public function messages(): array
{
    return [
        'phone_new.required' => 'Số điện thoại mới không được để trống',
        'code.required' => 'Mã xác thực không được để trống',
    ];
}
}
