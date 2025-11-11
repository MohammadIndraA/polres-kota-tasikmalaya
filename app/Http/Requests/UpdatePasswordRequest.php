<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
  public function rules(): array
    {
        return [
            'password_sekarang' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'], // otomatis cek dengan password_confirmation
        ];
    }


    public function messages()
    {
        return [
          'password_sekarang.required' => 'Password sekarang wajib diisi.',
          'password.required' => 'Password wajib diisi.',
          'password.min' => 'Password minimal 8 karakter.',
          'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ];
    }
}
