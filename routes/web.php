<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuProfileController;
use App\Http\Controllers\Admin\PelayananPublikController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubPelayananPublikController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\MenuProfilController;
use App\Http\Controllers\PelayananPublikController as ControllersPelayananPublikController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;



// page home
Route::get('/', [HomeController::class, 'index'])->name('home');

// page berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'detail_berita'])->name('berita-detail');
Route::get('/berita/kategori/{slug}', [BeritaController::class, 'berita_by_categories'])->name('berita-ketegori');

// Untuk search umum tanpa kategori
Route::get('/cari/berita', [BeritaController::class, 'search'])->name('cari-berita');

// menu profile
Route::get('/profil/{slug}', [MenuProfilController::class, 'index'])->name('profil-detail');

// pelayanan publik
Route::get('/pelayanan-publik/{slug}', [ControllersPelayananPublikController::class, 'index'])->name('pelayanan-publik-detail');

// sub pelayanan publik
Route::get('/sub-pelayanan-publik/{slug}', [ControllersPelayananPublikController::class, 'sub_pelayanan'])->name('sub-pelayanan-publik-detail');

// page kontak
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        // route user
        Route::get('/users', [UserController::class, 'index'])->name('user-profil.index');
        Route::get('/user/create', [UserController::class, 'create'])->name('user-profil.create');
        Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user-profil.edit');
        Route::post('/user/store', [UserController::class, 'store'])->name('user-profil.store');
        Route::get('/user', [UserController::class, 'show'])->name('user-profil.show');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('user-profil.update');

        // profile user
         // profile
        Route::get('/update-profil', [ProfilController::class, 'index'])->name('update-profil.index');
        Route::put('/update-profil/update/{id}', [ProfilController::class, 'update'])->name('update-profil.update');
        Route::put('/update-profil/update-password/{id}', [ProfilController::class, 'updatePassword'])->name('update-profil.update_password');

        // update Setting
        // Route::get('/update-setting', [ProfilController::class, 'indexSetting'])->name('update-setting.index');
        Route::post('/update-setting/store', [SettingController::class, 'store'])->name('store-setting.store');
        Route::put('/update-setting/update/{id}', [SettingController::class, 'update'])->name('update-setting.update');

        // route posts
        Route::get('/posts', [PostController::class, 'index'])->name('post.index');
        Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
        Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
        Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
        Route::get('/post', [PostController::class, 'show'])->name('post.show');
        Route::put('/posts/{id}', [PostController::class, 'update'])->name('post.update');
        Route::delete('/post/{id}/delete', [PostController::class, 'destroy'])->name('post.destroy');

        // route category
        Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
        Route::get('/category/create', [CategoriesController::class, 'create'])->name('category.create');
        Route::get('/category/{id}/edit', [CategoriesController::class, 'edit'])->name('category.edit');
        Route::post('/category/store', [CategoriesController::class, 'store'])->name('category.store');
        Route::get('/category', [CategoriesController::class, 'show'])->name('category.show');
        Route::put('/category/{id}', [CategoriesController::class, 'update'])->name('category.update');
        Route::delete('/category/{id}/delete', [CategoriesController::class, 'destroy'])->name('category.destroy');

        // route banner
        Route::get('/banners', [BannerController::class, 'index'])->name('banner.index');
        Route::get('/banner/create', [BannerController::class, 'create'])->name('banner.create');
        Route::get('/banner/{id}/edit', [BannerController::class, 'edit'])->name('banner.edit');
        Route::post('/banner/store', [BannerController::class, 'store'])->name('banner.store');
        Route::get('/banner', [BannerController::class, 'show'])->name('banner.show');
        Route::put('/banner/{id}', [BannerController::class, 'update'])->name('banner.update');
        Route::delete('/banner/{id}/delete', [BannerController::class, 'destroy'])->name('banner.destroy');

        // route pelayanan-publik
        Route::get('/pelayanan-publiks', [PelayananPublikController::class, 'index'])->name('pelayanan-publik.index');
        Route::get('/pelayanan-publik/create', [PelayananPublikController::class, 'create'])->name('pelayanan-publik.create');
        Route::get('/pelayanan-publik/{id}/edit', [PelayananPublikController::class, 'edit'])->name('pelayanan-publik.edit');
        Route::post('/pelayanan-publik/store', [PelayananPublikController::class, 'store'])->name('pelayanan-publik.store');
        Route::get('/pelayanan-publik', [PelayananPublikController::class, 'show'])->name('pelayanan-publik.show');
        Route::put('/pelayanan-publik/{id}', [PelayananPublikController::class, 'update'])->name('pelayanan-publik.update');
        Route::delete('/pelayanan-publik/{id}/delete', [PelayananPublikController::class, 'destroy'])->name('pelayanan-publik.destroy');

        // route profil menu
        Route::get('/profils', [MenuProfileController::class, 'index'])->name('profil.index');
        Route::get('/profil/create', [MenuProfileController::class, 'create'])->name('profil.create');
        Route::get('/profil/{id}/edit', [MenuProfileController::class, 'edit'])->name('profil.edit');
        Route::post('/profil/store', [MenuProfileController::class, 'store'])->name('profil.store');
        Route::get('/profil', [MenuProfileController::class, 'show'])->name('profil.show');
        Route::put('/profil/{id}', [MenuProfileController::class, 'update'])->name('profil.update');
        Route::delete('/profil/{id}/delete', [MenuProfileController::class, 'destroy'])->name('profil.destroy');

         // route pelayanan-publik
        Route::get('/sub-pelayanan-publiks', [SubPelayananPublikController::class, 'index'])->name('sub-pelayanan-publik.index');
        Route::get('/sub-pelayanan-publik/create', [SubPelayananPublikController::class, 'create'])->name('sub-pelayanan-publik.create');
        Route::get('/sub-pelayanan-publik/{id}/edit', [SubPelayananPublikController::class, 'edit'])->name('sub-pelayanan-publik.edit');
        Route::post('/sub-pelayanan-publik/store', [SubPelayananPublikController::class, 'store'])->name('sub-pelayanan-publik.store');
        Route::get('/sub-pelayanan-publik', [SubPelayananPublikController::class, 'show'])->name('sub-pelayanan-publik.show');
        Route::put('/sub-pelayanan-publik/{id}', [SubPelayananPublikController::class, 'update'])->name('sub-pelayanan-publik.update');
        Route::delete('/sub-pelayanan-publik/{id}/delete', [SubPelayananPublikController::class, 'destroy'])->name('sub-pelayanan-publik.destroy');
    });
});

// === Sitemap ===
Route::get('/sitemap.xml', [HomeController::class, 'sitemap']);

// === robots.txt ===
Route::get('/robots.txt', function () {
$content = "User-agent: *\n";
$content .= "Disallow: /admin/\n";
$content .= "Allow: /\n";
$content .= "Sitemap: " . url('/sitemap.xml') . "\n";

return response($content, 200)->header('Content-Type', 'text/plain');
});
