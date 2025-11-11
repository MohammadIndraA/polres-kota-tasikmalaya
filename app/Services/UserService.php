<?php 

namespace App\Services;

use App\Repositories\MenuProfileRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;


class UserService
{
    protected UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function findUser(string $id)
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

    public function createUser(array $data)
    {

        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            $data['image'] = $this->upload('menu-profile', $data['image']);
        }
        return $this->repository->create($data);
    }

    public function updateUser(string $id, array $data)
    {
        $User = $this->repository->find($id);

        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            $this->deleteImage($User->image);
            $data['image'] = $this->upload('profile', $data['image']);
        }
        return $this->repository->update($User, $data);
    }

}

?>
