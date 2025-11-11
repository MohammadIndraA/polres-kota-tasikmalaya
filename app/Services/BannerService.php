<?php 

// app/Services/PostService.php
namespace App\Services;

use App\Repositories\BannerRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BannerService
{
    protected BannerRepository $repository;

    public function __construct(BannerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllBanners()
    {
        return $this->repository->all();
    }

    public function findBanner(string $id)
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

    public function createBanner(array $data)
    {
        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            $data['image'] = $this->upload('banner', $data['image']);
        }
        return $this->repository->create($data);
    }

    public function updateBanner(string $id, array $data)
    {
        $banner = $this->repository->find($id);

        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            $this->deleteImage($banner->image);
            $data['image'] = $this->upload('banner', $data['image']);
        }

        return $this->repository->update($banner, $data);
    }

    public function deleteBanner(string $id)
    {
        $banner = $this->repository->find($id);
        $this->deleteImage($banner->image);
        return $this->repository->delete($banner);
    }
}

?>
