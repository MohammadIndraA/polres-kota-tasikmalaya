@extends('layouts.app', ['title' => 'Form Post'])
@section('content')
    <form
        action="{{ isset($pelayananPublik) ? route('admin.pelayanan-publik.update', $pelayananPublik->id) : route('admin.pelayanan-publik.store') }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($pelayananPublik))
            @method('PUT')
        @endif
        @if (session('error'))
            <div class="mb-4 px-4 py-3 rounded-md bg-red-100 text-red-700 border border-red-300">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 justify-between">
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

                    <x-select name="status" label="Status" :options="$status" :value="isset($pelayananPublik) ? $pelayananPublik->status : null" :required="true" />

                    {{-- Upload Gambar --}}
                    <div class="mb-6">
                        <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Gambar Sampul
                        </label>

                        <div id="drop-area-pelayanan"
                            class="border-2 border-dashed border-gray-300 rounded-md p-6 text-center cursor-pointer transition-all hover:border-blue-400">
                            <p>📁 Seret & lepas gambar di sini, atau klik untuk pilih</p>
                            <input type="file" name="image" id="image-pelayanan" class="hidden" accept="image/*">
                        </div>

                        <div class="mt-4 text-center">
                            <img id="image-preview-pelayanan"
                                src="{{ isset($pelayananPublik) && $pelayananPublik->image ? asset('storage/' . $pelayananPublik->image) : '' }}"
                                alt="Preview Gambar" class="mx-auto rounded-md"
                                style="max-width: 200px; max-height: 200px; {{ isset($pelayananPublik) && $pelayananPublik->image ? 'display: block;' : 'display: none;' }}">
                        </div>

                        @error('image')
                            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                </div><!--end card-->
            </div><!--end col-->
            <div
                class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-8 xl:col-span-8 shadow-md bg-white dark:bg-gray-900">
                <div class="w-full relative mb-4">
                    <div class="flex-auto p-0 sm:p-4">

                        {{-- nama --}}
                        <x-input-v2 name="name" label="Nama" :value="old('name', $pelayananPublik->name ?? '')" placeholder="Nama Pelayanan Publik"
                            required="true" type="text" />

                        {{-- urutan --}}
                        <x-input-v2 name="urutan" label="Urutan" :value="old('urutan', $pelayananPublik->urutan ?? '')" placeholder="Nama Pelayanan Publik"
                            required="true" type="number" />

                        {{-- deskeirpsi --}}
                        <label for="Deskripsi" class="font-medium text-sm text-slate-600 dark:text-slate-400">Deskripsi
                            <span class="text-red-500">*</span></label>
                        <textarea class="ckeditor form-control" name="content">{{ old('content', $pelayananPublik->content ?? '') }}</textarea>

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
    <script src="{{ asset('js/uploader.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('.ckeditor').ckeditor();

        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initImageUploader('drop-area-pelayanan', 'image-pelayanan', 'image-preview-pelayanan');
        });
    </script>
@endsection
