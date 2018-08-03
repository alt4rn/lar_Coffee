<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
{
    protected $errorBag = 'login';
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
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Anda belum menuliskan surel.',
            'password.required' => 'Anda belum menuliskan kata sandi.',
            'email.email' => 'Gunakan surel anda sebagai nama pengguna.',
        ];
    }
}
