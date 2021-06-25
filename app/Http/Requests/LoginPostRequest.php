<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // true : ho tro validation
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // dinh nghia cac luat de kiem tra tinh hop le cua du lieu
            'email' => 'required|email',
            'password' => 'required|min:6|max:60'
        ];
    }

    /**
     * view messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Khong duoc trong email',
            'email.email' => 'Vui long nhap dung dinh dang email',
            'password.required' => 'Khong duoc trong password',
            'password.min' => 'Mat khau phai it nhat :min ki tu tro len',
            'password.max' => 'Mat khau khong nhieu hon :max ki tu'
        ];
    }
}
