<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'name'         => ['nullable', 'string', 'max:255'],
            'email'        => ['nullable', 'email', 'max:255'],
            'phone'        => ['nullable', 'string', 'max:20'],
            'address'      => ['nullable', 'string', 'max:255'],
            'postal_code'  => ['nullable', 'string', 'max:10'],
            'city'         => ['nullable', 'string', 'max:100'],
            'province'     => ['nullable', 'string', 'max:100'],
            'image'        => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'], // 2MB
            'instagram_link' => ['nullable', 'string', 'max:255'],
            'facebook_link' => ['nullable', 'string'],
            'twitter_link' => ['nullable', 'string'],
            'youtube_link' => ['nullable', 'string'],
            'googleplus_link' => ['nullable', 'string'],
            'tiktok_link' => ['nullable', 'string'],
            'linkedin_link' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.email'           => 'Format email tidak valid.',
            'email.max'             => 'Email maksimal 255 karakter.',
            'phone.max'             => 'Nomor telepon maksimal 20 karakter.',
            'postal_code.max'       => 'Kode pos maksimal 10 karakter.',
            'image.image'           => 'File harus berupa gambar.',
            'image.mimes'           => 'Gambar harus berformat jpg, jpeg, atau png.',
            'image.max'             => 'Ukuran gambar maksimal 2MB.',
        ];
    }
}
