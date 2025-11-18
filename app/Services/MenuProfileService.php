<?php 

namespace App\Services;

use App\Repositories\MenuProfileRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;


class MenuProfileService
{
    protected MenuProfileRepository $repository;

    public function __construct(MenuProfileRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllMenuProfiles()
    {
        return $this->repository->all();
    }

    public function findMenuProfile(string $id)
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

        public function createMenuProfile(array $data)
        {
            if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
                $data['image'] = $this->upload('menu-profile', $data['image']);
            }

            // kalau dokumen berupa array hasil uploadMultiple, biarkan saja
            // pastikan field di migration tipe JSON atau TEXT
            // if (isset($data['dokumen']) && is_array($data['dokumen'])) {
            //     $data['dokumen'] = json_encode($data['dokumen']); 
            //     // atau langsung array kalau model cast ke json
            // }

            $data['slug'] = Str::slug($data['name']);

            return $this->repository->create($data);
        }


        public function updateMenuProfile(string $id, array $data)
        {
            $menuProfile = $this->repository->find($id);

            // image
            if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
                $this->deleteImage($menuProfile->image);
                $data['image'] = $this->upload('menu-profile', $data['image']);
            }

            // slug
            if (isset($data['name'])) {
                $data['slug'] = Str::slug($data['name']);
            }

            // dokumen: merge lama + baru
            if (isset($data['dokumen']) && is_array($data['dokumen'])) {
                $existing = $menuProfile->dokumen ?? [];
                $merged   = array_merge($existing, $data['dokumen']);
                $data['dokumen'] = array_values($merged); // reset index
            } else {
                $data['dokumen'] = $menuProfile->dokumen ?? [];
            }

            // hapus dokumen yang dipilih user
            if (request()->has('deleted_files')) {
                $filtered = array_diff($data['dokumen'], request()->deleted_files);
                $data['dokumen'] = array_values($filtered); // reset index lagi
            }

            return $this->repository->update($menuProfile, $data);
        }



    public function deleteMenuProfile(string $id)
    {
        $menuProfile = $this->repository->find($id);
        $this->deleteImage($menuProfile->image);

        return $this->repository->delete($menuProfile);
    }
}

?>
