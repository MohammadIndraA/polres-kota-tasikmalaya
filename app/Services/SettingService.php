<?php 

// app/Services/PostService.php
namespace App\Services;

use App\Repositories\BannerRepository;
use App\Repositories\PostRepository;
use App\Repositories\SettingRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SettingService
{
    protected SettingRepository $repository;

    public function __construct(SettingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllSettings()
    {
        return $this->repository->all();
    }

    public function findSetting(string $id)
    {
        return $this->repository->find($id);
    }

    protected function upload(string $directory, UploadedFile $file, string $filename = ""): string
    {
        $extension = $file->getClientOriginalExtension();
        
        // Jika filename tidak diberikan, gunakan original name (tanpa ekstensi)
        if (empty($filename)) {
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        }

        // Pastikan filename aman (hapus karakter aneh)
        $filename = preg_replace('/[^A-Za-z0-9_-]/', '_', $filename);
        
        // Tambahkan timestamp agar unik
        $filename = "{$filename}_" . now()->format('YmdHis') . ".{$extension}";

        // Simpan ke storage/app/public/{directory}
        Storage::disk('public')->putFileAs($directory, $file, $filename);

        // Return path relatif (untuk disimpan di database)
        return "$directory/$filename";
    }

    protected function deleteImage(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    public function createSetting(array $data)
    {
        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            $data['image'] = $this->upload('setting', $data['image']);
        }
        return $this->repository->create($data);
    }

    public function updateSetting(string $id, array $data)
    {
        $setting = $this->repository->find($id);

        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            $this->deleteImage($setting->image);
            $data['image'] = $this->upload('setting', $data['image']);
        }

        return $this->repository->update($setting, $data);
    }

    public function deleteBanner(string $id)
    {
        $setting = $this->repository->find($id);
        $this->deleteImage($setting->image);
        return $this->repository->delete($setting);
    }
}

?>
