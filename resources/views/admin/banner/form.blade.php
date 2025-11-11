@extends('layouts.app', ['title' => 'Form Banner'])
@section('content')
    <div class="xl:w-full min-h-[calc(100vh-152px)] relative pb-14">
        <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
            <div class="sm:col-span-12 md:col-span-12 lg:col-span-8 xl:col-span-6 xl:col-start-4">
                <div
                    class="bg-white dark:bg-gray-900 border border-slate-200 dark:border-slate-700/40 rounded-md w-full max-w-2xl relative mb-4">
                    <div class="border-b border-slate-200 dark:border-slate-700/40 py-3 px-4 dark:text-slate-300/70">
                        <div class="flex-none md:flex">
                            <h4 class="font-medium text-lg flex-1 self-center mb-2 md:mb-0">Form Banner</h4>
                        </div>
                    </div><!--end header-title-->
                    <div class="flex-auto p-4">
                        <form
                            action="{{ isset($banner) ? route('admin.banner.update', $banner->id) : route('admin.banner.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($banner))
                                @method('PUT')
                            @endif

                            {{-- gambar --}}
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
                                        src="{{ isset($banner) && $banner->image ? asset('storage/' . $banner->image) : '' }}"
                                        alt="Preview Gambar"
                                        style="max-width: 200px; max-height: 200px; display: {{ isset($banner) && $banner->image ? 'block' : 'none' }};">
                                </div>

                                @error('image')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- name / title --}}
                            <label for="name" class="font-medium text-sm text-slate-600 dark:text-slate-400">Nama /
                                Judul
                                <textarea class="ckeditor form-control" name="name">{{ old('name', $banner->name ?? '') }}</textarea>

                                {{-- button --}}
                                <x-button-modal />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
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
                    @if (isset($banner) && $banner->image)
                        preview.src = "{{ asset('storage/' . $banner->image) }}";
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
