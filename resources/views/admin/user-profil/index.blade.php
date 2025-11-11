@extends('layouts.app', ['title' => 'Profile'])
@section('content')
    <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
        <div class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 ">
            <div class="bg-white dark:bg-slate-800 shadow  rounded-md w-full relative">
                <div class="flex-auto p-0">
                    <img src="{{ asset('design-system/assets/images/widgets/bg-p.png') }}" alt=""
                        class="bg-cover bg-center h-48 w-fit rounded-md clip-path-bottom">
                </div><!--end card-body-->
                <div class="flex-auto p-4 pt-0">
                    <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4">
                        <div class="sm:col-span-12  md:col-span-12 lg:col-span-6 xl:col-span-6 ">
                            <div class="flex items-center relative -mt-[74px]">
                                <div class="w-36 h-36 relative">
                                    <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('design-system/assets/images/users/avatar-7.png') }}"
                                        alt="User Avatar" class="rounded-full border-white dark:border-slate-800" />
                                    <span
                                        class="absolute cursor-pointer w-7 h-7 bg-green-600 rounded-full bottom-4 right-3 flex items-center justify-center border-2 border-white dark:border-slate-800">
                                        <i class="fas fa-camera text-white text-xs"></i>
                                    </span>
                                </div>
                                <div class="self-end ml-3">
                                    <h5
                                        class="text-xl  md:text-[28px] font-semibold sm:text-white md:text-slate-700 dark:text-gray-300 mb-0 md:mb-2">
                                        {{ Auth::user()->name }}</h5>
                                    <p class="block text-xs lg:text-base  font-medium text-slate-500">
                                        {{ Auth::user()->mitra->nama_usaha ?? '' }}
                                    </p>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end inner-grid-->
                </div><!--end card-body-->
            </div> <!--end card-->
        </div><!--end col-->
    </div><!--end inner-grid-->

    @if (session()->has('success'))
        <div class="flex p-3 mb-4 bg-green-100 rounded-lg dark:bg-green-200" role="alert">
            <i class="fas fa-check-circle flex-shrink-0 text-green-700 self-center"></i>
            <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
                {{ session('success') }}
            </div>
            <button type="button" class="ml-auto text-green-700 hover:text-green-900"
                onclick="this.parentElement.remove()">
                <i class="icofont-close"></i>
            </button>
        </div>
    @endif


    <div class="grid md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 ">
        <div class="sm:col-span-12  md:col-span-12 lg:col-span-12 xl:col-span-12 ">
            <div class="w-full relative overflow-hidden">
                <div class="p-0 xl:p-4">
                    <div class="mb-4 border-b border-dashed border-gray-200 dark:border-gray-700 flex flex-wrap justify-start lg:justify-between"
                        data-fc-type="tab">
                        <ul class="flex flex-wrap mb-5 lg:-mb-px" aria-label="Tabs">
                            <li class="mr-2" role="presentation">
                                <button
                                    class="inline-block py-4 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300 border-gray-100 dark:border-gray-700 active"
                                    id="Posts-tab" data-fc-target="#Posts" type="button" role="tab"
                                    aria-controls="Posts" aria-selected="false">Profile</button>
                            </li>
                            <li role="presentation">
                                <button
                                    class="inline-block py-4 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300 border-gray-100 dark:border-gray-700"
                                    id="Settings-tab" data-fc-target="#Settings" type="button" role="tab"
                                    aria-controls="Settings" aria-selected="false">Settings</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!--end col-->
    </div>

    <!-- Tabs Wrapper -->
    <div class="active" id="Posts" role="tabpanel" aria-labelledby="Posts-tab">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-4">
            <!-- Sidebar -->

            <!-- Main Content -->
            <div class="lg:col-span-8 shadow-md bg-white dark:bg-gray-900 p-6 rounded-md">
                <form action="{{ route('admin.update-profil.update', auth()->user()->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" value="{{ auth()->user()->id }}">

                    {{-- Input Nama & Email --}}
                    <div class="mb-6">
                        <x-input-v2 name="name" label="Name" :value="old('name', auth()->user()->name ?? '')" placeholder="Your Name" required="true"
                            type="text" />

                        <x-input-v2 name="email" label="Email" :value="old('email', auth()->user()->email ?? '')" placeholder="Your Email" required="true"
                            type="text" />
                    </div>

                    {{-- Upload Gambar --}}
                    <div class="mb-6">
                        <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Gambar Sampul
                        </label>

                        <div id="drop-area-1"
                            class="border-2 border-dashed border-gray-300 rounded-md p-6 text-center cursor-pointer transition-all hover:border-blue-400">
                            <p>📁 Seret & lepas gambar di sini, atau klik untuk pilih</p>
                            <input type="file" name="image" id="image-1" class="hidden" accept="image/*">
                        </div>

                        <div class="mt-4 text-center">
                            <img id="image-preview-1"
                                src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : '' }}"
                                alt="Preview Gambar" class="mx-auto rounded-md"
                                style="max-width: 200px; max-height: 200px; {{ auth()->user()->image ? 'display: block;' : 'display: none;' }}">
                        </div>

                        @error('image')
                            <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div>


                    {{-- Tombol Submit --}}
                    <div class="text-right">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

            <div class="lg:col-span-4 shadow-md bg-white dark:bg-gray-900">
                <form action="{{ route('admin.update-profil.update_password', auth()->user()->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="w-full relative p-4">
                        <input type="hidden" name="id" value="{{ auth()->user()->id }}">

                        <x-input-v2 name="password_sekarang" label="Password Sekarang" :value="old('password_sekarang')"
                            placeholder="Password Sekarang" required="true" type="password" />

                        <x-input-v2 name="password" label="Password Baru" :value="old('password')" placeholder="Password Baru"
                            required="true" type="password" />

                        <x-input-v2 name="password_confirmation" label="Konfirmasi Password" :value="old('password_confirmation')"
                            placeholder="Konfirmasi Password" required="true" type="password" />

                        <div class="mt-5">
                            <button type="submit"
                                class="px-2 py-2 lg:px-4 bg-transparent text-brand text-sm rounded transition hover:bg-brand-500 hover:text-white border border-brand font-medium">
                                Simpan Data
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Settings Tab -->
    <div class="hidden" id="Settings" role="tabpanel" aria-labelledby="Settings-tab">
        @php
            $isUpdate = isset($setting) && $setting->id;
        @endphp
        {{-- @dd($setting) --}}
        <form
            action="{{ $isUpdate ? route('admin.update-setting.update', $setting->id) : route('admin.store-setting.store') }}"
            method="POST" enctype="multipart/form-data" class="contents">
            @csrf
            @if ($isUpdate)
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-4">

                <!-- Sidebar -->
                <div class="lg:col-span-4 shadow-md bg-white dark:bg-gray-900">
                    <div class="w-full p-4 space-y-4">
                        <x-input-v2 name="facebook_link" label="Facebook Link" :value="old('facebook_link', $setting->facebook_link ?? '')"
                            placeholder="Facebook Link" :required="false" type="text" />
                        <x-input-v2 name="instagram_link" label="Instagram Link" :value="old('instagram_link', $setting->instagram_link ?? '')"
                            placeholder="Instagram Link" :required="false" type="text" />
                        <x-input-v2 name="youtube_link" label="Youtube Link" :value="old('youtube_link', $setting->youtube_link ?? '')" placeholder="Youtube Link"
                            :required="false" type="text" />
                        <x-input-v2 name="twitter_link" label="Twitter Link" :value="old('twitter_link', $setting->twitter_link ?? '')"
                            placeholder="Twitter Link" :required="false" type="text" />

                        {{-- upload gambr 2 --}}
                        <div class="mb-6">
                            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Gambar Sampul
                            </label>

                            <div id="drop-area-2"
                                class="border-2 border-dashed border-gray-300 rounded-md p-6 text-center cursor-pointer transition-all hover:border-blue-400">
                                <p>📁 Seret & lepas gambar di sini, atau klik untuk pilih</p>
                                <input type="file" name="image" id="image-2" class="hidden" accept="image/*">
                            </div>

                            <div class="mt-4 text-center">
                                <img id="image-preview-2"
                                    src="{{ old('image_preview') ?? ($setting->image ?? false) ? asset('storage/' . $setting->image) : '' }}"
                                    alt="Preview Gambar" class="mx-auto rounded-md"
                                    style="max-width: 200px; max-height: 200px; {{ isset($setting) && $setting->image ? 'display: block;' : 'display: none;' }}">
                            </div>

                            @error('image')
                                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:col-span-8 shadow-md bg-white dark:bg-gray-900">
                    <div class="w-full p-4 space-y-4">
                        <x-input-v2 name="name" label="Nama Usaha" :value="old('name', $setting->name ?? '')" placeholder="Nama Instansi"
                            required="true" type="text" />

                        <div class="grid grid-cols-2 gap-3">
                            <x-input-v2 name="email" label="Email" :value="old('email', $setting->email ?? '')" placeholder="Email"
                                required="true" type="email" />
                            <x-input-v2 name="phone" label="Phone" :value="old('phone', $setting->phone ?? '')" placeholder="Phone"
                                required="true" type="text" />
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <x-input-v2 name="city" label="Kota" :value="old('city', $setting->city ?? '')" placeholder="Kota"
                                required="true" type="text" />
                            <x-input-v2 name="province" label="Provinsi" :value="old('province', $setting->province ?? '')" placeholder="Provinsi"
                                required="true" type="text" />
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <x-input-v2 name="postal_code" label="Kode Pos" :value="old('postal_code', $setting->postal_code ?? '')" placeholder="Kode Pos"
                                required="true" type="text" />
                            <x-input-v2 name="googleplus_link" label="Google Plus Link" :value="old('googleplus_link', $setting->googleplus_link ?? '')"
                                placeholder="Google Plus Link" :required="false" type="text" />
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <x-input-v2 name="tiktok_link" label="Tiktok Link" :value="old('tiktok_link', $setting->tiktok_link ?? '')"
                                placeholder="Tiktok Link" required="true" type="text" />
                            <x-input-v2 name="linkedin_link" label="Linkedin Link" :value="old('linkedin_link', $setting->linkedin_link ?? '')"
                                placeholder="Linkedin Link" :required="false" type="text" />
                        </div>

                        <x-textarea name="address" label="Alamat Lengkap" :value="old('address', $setting->address ?? '')" :rows="5"
                            :required="true" />

                        <div class="text-right">
                            <button type="submit"
                                class="px-4 py-2 bg-brand text-white rounded hover:bg-brand-600 transition">
                                Simpan Data
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/uploader.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initImageUploader('drop-area-1', 'image-1', 'image-preview-1');
            initImageUploader('drop-area-2', 'image-2', 'image-preview-2');
        });
    </script>
@endsection
