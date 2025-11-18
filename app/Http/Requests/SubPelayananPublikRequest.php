<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubPelayananPublikRequest extends FormRequest
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
     protected function isUpdate(): bool
    {
        return $this->isMethod('put') || $this->isMethod('patch');
    }

    public function rules()
    {
        $pageId = $this->route('sub-pelayanan-publik'); // route: /pages/{page}

        return [
            'name' => 'required|string|max:255',
            'slug' => [
                'string',
                'max:255',
                'unique:pelayanan_publiks,slug' . ($pageId ? ',' . $pageId : ''),
            ],
            'status' => 'required|in:draft,published,archived',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'urutan' => 'nullable|integer',
            'pelayanan_publik_id' => 'required', 

            'dokumen' => 'nullable|array',
            'dokumen.*' => 'file|mimes:jpg,jpeg,png,gif,pdf|max:2048',
        ];
    }


    public function messages()
    {
        return [
            'name.string' => 'Nama halaman harus berupa teks.',
            'name.max' => 'Nama halaman maksimal 255 karakter.',

            'pelayanan_publik_id.required' => 'Slug halaman wajib diisi.',
            'slug.string' => 'Slug halaman harus berupa teks.',
            'slug.max' => 'Slug halaman maksimal 255 karakter.',
            'slug.unique' => 'Slug ini sudah digunakan. Silakan pilih slug lain.',

            'status.required' => 'Status halaman wajib dipilih.',
            'status.in' => 'Status tidak valid. Pilih: draft, dipublikasikan, atau arsip.',

            'content.string' => 'Konten halaman harus berupa teks.',

            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Format gambar hanya boleh JPG, JPEG, atau PNG.',
            'image.max' => 'Ukuran gambar maksimal 2 MB.',

            'urutan.integer' => 'Urutan harus berupa angka.',

             'dokumen.required' => 'Dokumen wajib diunggah.',
            'dokumen.*.file' => 'Dokumen harus berupa file.',
            'dokumen.*.mimes' => 'Format dokumen hanya boleh JPG, JPEG, PNG, GIF, atau PDF.',
            'dokumen.*.max' => 'Ukuran dokumen maksimal 2 MB.',
        ];
    }
}
