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

                            {{-- Upload Gambar --}}
                            <div class="mb-6">
                                <label for="image"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Gambar Sampul
                                </label>

                                <div id="drop-area-banner"
                                    class="border-2 border-dashed border-gray-300 rounded-md p-6 text-center cursor-pointer transition-all hover:border-blue-400">
                                    <p>📁 Seret & lepas gambar di sini, atau klik untuk pilih</p>
                                    <input type="file" name="image" id="image-banner" class="hidden" accept="image/*">
                                </div>

                                <div class="mt-4 text-center">
                                    <img id="image-preview-banner"
                                        src="{{ isset($banner) && $banner->image ? asset('storage/' . $banner->image) : '' }}"
                                        alt="Preview Gambar" class="mx-auto rounded-md"
                                        style="max-width: 200px; max-height: 200px; {{ isset($banner) && $banner->image ? 'display: block;' : 'display: none;' }}">
                                </div>

                                @error('image')
                                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
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
    <script src="{{ asset('js/uploader.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {

            $('.ckeditor').ckeditor();

        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initImageUploader('drop-area-banner', 'image-banner', 'image-preview-banner');
        });
    </script>
@endsection
