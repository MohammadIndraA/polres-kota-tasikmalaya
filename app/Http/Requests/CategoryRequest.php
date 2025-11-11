<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

       protected function isUpdate(): bool
    {
        return $this->isMethod('put') || $this->isMethod('patch');
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
     public function rules()
    {
        // Jika update (PUT/PATCH), abaikan ID saat cek unique
        $categoryId = $this->route('category'); // asumsi route: /categories/{category}

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:categories,name' . ($categoryId ? ',' . $categoryId : ''),
            ],
            'slug' => [
                'string',
                'max:255',
                'unique:categories,slug' . ($categoryId ? ',' . $categoryId : ''),
            ],
            'description' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            // Validasi Name
            'name.required' => 'Nama kategori wajib diisi.',
            'name.string' => 'Nama kategori harus berupa teks.',
            'name.max' => 'Nama kategori maksimal :max karakter.',
            'name.unique' => 'Nama kategori ini sudah digunakan. Silakan pilih nama lain.',

            // Validasi Slug
            'slug.required' => 'Slug kategori wajib diisi.',
            'slug.string' => 'Slug kategori harus berupa teks.',
            'slug.max' => 'Slug kategori maksimal :max karakter.',
            'slug.unique' => 'Slug kategori ini sudah digunakan. Silakan pilih slug lain.',

            // Validasi Description
            'description.string' => 'Deskripsi kategori harus berupa teks.',
        ];
    }
}
