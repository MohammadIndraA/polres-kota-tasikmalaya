@extends('layouts.app', ['title' => 'Dashboard'])
@section('content')
    <div class="container-fluid">
        <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4">
            <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-3 xl:col-span-3">
                <div
                    class="bg-white px-3 py-2 shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900  rounded-md w-full relative mb-4">
                    <div class="flex-auto p-4">
                        <div class="flex justify-between xl:gap-x-2 items-cente">
                            <div class="self-center">
                                <p class="text-gray-800 font-semibold dark:text-slate-400 text-lg uppercase">Berita
                                </p>
                                <h3 class="my-4 font-semibold text-[30px] dark:text-slate-200">{{ $post ?? '0' }}</h3>
                            </div>
                            <div class="self-center">
                                <i data-lucide="shopping-cart" class=" h-16 w-16 stroke-primary-500/30"></i>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div> <!--end inner-grid-->
            </div><!--end col-->
            <div class="col-span-12 px-3 py-2 sm:col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900  rounded-md w-full relative mb-4">
                    <div class="flex-auto p-4">
                        <div class="flex justify-between xl:gap-x-2 items-cente">
                            <div class="self-center">
                                <p class="text-gray-800 font-semibold dark:text-slate-400 uppercase">Pelayanna Publik</p>
                                <h3 class="my-4 font-semibold text-[30px] dark:text-slate-200">
                                    {{ $pelayanan_publik ?? '0' }}</h3>
                            </div>
                            <div class="self-center">
                                <i data-lucide="users" class=" h-16 w-16 stroke-green/30"></i>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div> <!--end inner-grid-->
            </div><!--end col-->
            <div class="col-span-12 px-3 py-2 sm:col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900  rounded-md w-full relative mb-4">
                    <div class="flex-auto p-4">
                        <div class="flex justify-between xl:gap-x-2 items-cente">
                            <div class="self-center">
                                <p class="text-gray-800 font-semibold dark:text-slate-400 uppercase">Mitra</p>
                                <h3 class="my-4 font-semibold text-[30px] dark:text-slate-200" id="mitras">
                                    -</h3>
                            </div>
                            <div class="self-center">
                                <i data-lucide="hand" class=" h-16 w-16 stroke-yellow-500/30"></i>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div> <!--end inner-grid-->
            </div>
            <div class="col-span-12 px-3 py-2 sm:col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900  rounded-md w-full relative mb-4">
                    <div class="flex-auto p-4">
                        <div class="flex justify-between xl:gap-x-2 items-cente">
                            <div class="self-center">
                                <p class="text-gray-800 font-semibold dark:text-slate-400 uppercase">Modul Pelatihan</p>
                                <h3 class="my-4 font-semibold text-[30px] dark:text-slate-200" id="modul_pelatihans">
                                    -</h3>
                            </div>
                            <div class="self-center">
                                <i data-lucide="book" class=" h-16 w-16 stroke-grey-500/30"></i>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div> <!--end inner-grid-->
            </div>
            <div class="col-span-12 px-3 py-2 sm:col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900  rounded-md w-full relative mb-4">
                    <div class="flex-auto p-4">
                        <div class="flex justify-between xl:gap-x-2 items-cente">
                            <div class="self-center">
                                <p class="text-gray-800 font-semibold dark:text-slate-400 uppercase">Investor</p>
                                <h3 class="my-4 font-semibold text-[30px] dark:text-slate-200" id="investors">
                                    -</h3>
                            </div>
                            <div class="self-center">
                                <i data-lucide="circle-dollar-sign" class=" h-16 w-16 stroke-yellow-500/30"></i>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div> <!--end inner-grid-->
            </div>
            <div class="col-span-12 px-3 py-2 sm:col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
                <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900  rounded-md w-full relative mb-4">
                    <div class="flex-auto p-4">
                        <div class="flex justify-between xl:gap-x-2 items-cente">
                            <div class="self-center">
                                <p class="text-gray-800 font-semibold dark:text-slate-400 uppercase">Produk</p>
                                <h3 class="my-4 font-semibold text-[30px] dark:text-slate-200" id="produks">
                                    -</h3>
                            </div>
                            <div class="self-center">
                                <i data-lucide="shopping-basket" class=" h-16 w-16 stroke-red-500/30"></i>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div> <!--end inner-grid-->
            </div>
        </div> <!--end grid-->

    </div>
@endsection
@section('scripts')
@endsection
