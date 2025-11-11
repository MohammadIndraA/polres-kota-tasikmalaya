<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'title' => $this->isUpdate()
                ? ['required', 'string', 'min:6', 'max:255']
                : ['required', 'string', 'max:255', 'unique:posts,title'],
            'content' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'status' => 'required|in:draft,published,archived',
            'slug' => 'nullable|string',
            'excerpt' => 'required|string|min:8',
            'user_id' => 'nullable',
            'image' => $this->isUpdate()
                ? 'nullable|image|mimes:jpg,jpeg,png|max:2048'
                : 'required|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

  public function messages()
    {
        return [
            'title.required' => 'Judul berita wajib diisi.',
            'title.string' => 'Judul berita harus berupa teks.',
            'title.min' => 'Judul berita minimal :min karakter.',
            'title.max' => 'Judul berita maksimal :max karakter.',
            'title.unique' => 'Judul berita ini sudah digunakan. Silakan pilih judul lain.',
            
            'content.required' => 'Isi berita wajib diisi.',
            'content.string' => 'Isi berita harus berupa teks.',
            
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
            
            'status.required' => 'Status berita wajib dipilih.',
            'status.in' => 'Status berita tidak valid. Pilih: draft, dipublikasikan, atau arsip.',
            
            'slug.string' => 'Slug harus berupa teks.',
            
            'excerpt.required' => 'Ringkasan berita wajib diisi.',
            'excerpt.string' => 'Ringkasan berita harus berupa teks.',
            'excerpt.min' => 'Ringkasan berita minimal :min karakter.',
            
            'image.required' => 'Gambar sampul wajib diunggah saat membuat berita baru.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Format gambar hanya boleh JPG, JPEG, atau PNG.',
            'image.max' => 'Ukuran gambar maksimal 2 MB.',
        ];
    }

}
