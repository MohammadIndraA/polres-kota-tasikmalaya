<?php 

namespace App\Services;

use App\Repositories\SubPelayananPublikRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;


class SubPelayananPublikService
{
    protected SubPelayananPublikRepository $repo;

    public function __construct(SubPelayananPublikRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getAllSubPelayananPublik()
    {
        return $this->repo->all();
    }

    public function findSubPelayananPublik(string $id)
    {
        return $this->repo->find($id);
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

    public function createSubPelayananPublik(array $data)
    {
         if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            $data['image'] = $this->upload('sub-pelayanan-publik', $data['image']);
        }
            $data['slug'] = Str::slug($data['name']);

        return $this->repo->create($data);
    }

    public function updateSubPelayananPublik(string $id, array $data)
    {
        $PelayananPublik = $this->repo->find($id);

        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            $this->deleteImage($PelayananPublik->image);
            $data['image'] = $this->upload('sub-pelayanan-publik', $data['image']);
        }

        if (isset($data['name'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        return $this->repo->update($PelayananPublik, $data);
    }

    public function deleteSubPelayananPublik(string $id)
    {
        $PelayananPublik = $this->repo->find($id);
        $this->deleteImage($PelayananPublik->image);
        return $this->repo->delete($PelayananPublik);
    }

    public function getAllPelayananPublik()
    {
        return $this->repo->getAllPelayananPublik();
    }
}

?>
