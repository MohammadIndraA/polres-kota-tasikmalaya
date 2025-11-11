@extends('layouts.app', ['title' => 'Form Post'])
@section('styles')
    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('design-system/assets/libs/filepond/filepond.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('design-system/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
    <link rel="stylesheet" href="{{ asset('design-system/assets/libs/vanillajs-datepicker/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('design-system/assets/libs/mobius1-selectr/selectr.min.css') }}">
    <link href="{{ asset('design-system/assets/libs/prismjs/themes/prism-twilight.min.css') }}" type="text/css"
        rel="stylesheet">
@endsection
@section('content')
    <form action="{{ isset($menuProfil) ? route('admin.profil.update', $menuProfil->id) : route('admin.profil.store') }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($menuProfil))
            @method('PUT')
        @endif
        @if (session('error'))
            <div class="mb-4 px-4 py-3 rounded-md bg-red-100 text-red-700 border border-red-300">
                {{ session('error') }}
            </div>
        @endif

        <div
            class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 justify-between">
            <div
                class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-4 xl:col-span-4 shadow-md bg-white dark:bg-gray-900">
                <div class="w-full relative p-4">

                    {{-- status --}}
                    @php
                        $status = [
                            (object) ['id' => 'draft', 'nama' => 'draft'],
                            (object) ['id' => 'published', 'nama' => 'published'],
                            (object) ['id' => 'archived', 'nama' => 'archived'],
                        ];
                    @endphp

                    <x-select name="status" label="Status" :options="$status" :value="isset($menuProfil) ? $menuProfil->status : null" :required="true" />

                    {{-- image --}}
                    <!-- Upload Gambar (Create & Edit dalam 1 blok) -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar Sampul</label>
                        <div id="drop-area"
                            style="border: 2px dashed #ccc; border-radius: 8px; padding: 20px; text-align: center; cursor: pointer; transition: all 0.3s;">
                            <p>📁 Seret & lepas gambar di sini, atau klik untuk pilih</p>
                            <input type="file" name="image" id="image" class="d-none" accept="image/*">
                        </div>

                        <!-- Preview Gambar -->
                        <div class="mt-2 text-center">
                            <img id="image-preview"
                                src="{{ isset($menuProfil) && $menuProfil->image ? asset('storage/' . $menuProfil->image) : '' }}"
                                alt="Preview Gambar"
                                style="max-width: 200px; max-height: 200px; display: {{ isset($menuProfil) && $menuProfil->image ? 'block' : 'none' }};">
                        </div>

                        @error('image')
                            <div class="text-red-500 mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                </div><!--end card-->
            </div><!--end col-->
            <div
                class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-8 xl:col-span-8 shadow-md bg-white dark:bg-gray-900">
                <div class="w-full relative mb-4">
                    <div class="flex-auto p-0 sm:p-4">

                        {{-- nama --}}
                        <x-input-v2 name="name" label="Nama" :value="old('name', $menuProfil->name ?? '')" placeholder="Nama Pelayanan Publik"
                            required="true" type="text" />

                        {{-- deskeirpsi --}}
                        <label for="Deskripsi" class="font-medium text-sm text-slate-600 dark:text-slate-400">Deskripsi
                            <span class="text-red-500">*</span></label>
                        <textarea class="ckeditor form-control" name="content">{{ old('content', $menuProfil->content ?? '') }}</textarea>

                        <div class="mt-5">
                            <button onclick="{{ url()->previous() }}"
                                class="px-2 py-2 lg:px-4 bg-brand  text-white text-sm  rounded hover:bg-brand-600 border border-brand-500">Kembali</button>
                            <button type="submit"
                                class="px-2 py-2 lg:px-4 bg-transparent  text-brand text-sm  rounded transition hover:bg-brand-500 hover:text-white border border-brand font-medium">Simpan
                                Data</button>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
        </div> <!--end grid-->
    </form>
@endsection
@section('scripts')
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="{{ asset('design-system/assets/libs/filepond/filepond.min.js') }}"></script>
    <script
        src="{{ asset('design-system/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script src="{{ asset('design-system/assets/libs/vanillajs-datepicker/js/datepicker-full.min.js') }}"></script>
    <script src="{{ asset('design-system/assets/libs/mobius1-selectr/selectr.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('.ckeditor').ckeditor();

        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropArea = document.getElementById('drop-area');
            const fileInput = document.getElementById('image');
            const preview = document.getElementById('image-preview');

            // Buka file dialog saat area diklik
            dropArea.addEventListener('click', () => {
                fileInput.click();
            });

            // Efek drag & drop
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            ['dragenter', 'dragover'].forEach(eventName => {
                dropArea.addEventListener(eventName, highlight, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, unhighlight, false);
            });

            function highlight() {
                dropArea.style.borderColor = '#0d6efd';
                dropArea.style.backgroundColor = '#e7f1ff';
            }

            function unhighlight() {
                dropArea.style.borderColor = '#ccc';
                dropArea.style.backgroundColor = '#fff';
            }

            // Handle drop
            dropArea.addEventListener('drop', function(e) {
                const dt = e.dataTransfer;
                const file = dt.files[0];
                if (file && file.type.startsWith('image/')) {
                    fileInput.files = dt.files;
                    previewImage(file);
                }
            });

            // Handle pilih file (klik)
            fileInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    previewImage(file);
                } else {
                    // Jika di edit dan user batal pilih, kembalikan ke gambar lama
                    @if (isset($menuProfil) && $menuProfil->image)
                        preview.src = "{{ asset('storage/' . $menuProfil->image) }}";
                        preview.style.display = 'block';
                    @else
                        preview.style.display = 'none';
                    @endif
                }
            });

            function previewImage(file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
