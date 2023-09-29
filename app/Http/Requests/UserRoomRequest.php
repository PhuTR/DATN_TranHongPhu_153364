<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRoomRequest extends FormRequest
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
            'city_id' => 'required',
            'district_id' => 'required',
            'wards_id' => 'required',
            'name' => 'required',
            'description' => 'required',
        ];
    }

    public function messages(): array
{
    return [
        'city_id.required' => 'Tỉnh thành phố không được để trống',
        'district_id.required' => 'Quận huyện không được để trống',
        'price.required' => 'Giá không được để trống',
        'wards_id.required' => 'Phường xã không được để trống',
        'name.required' => 'Tiêu đề không được để trống',
        'description.required' => 'Thông tin mô tả không được để trống'

    ];
}
}
