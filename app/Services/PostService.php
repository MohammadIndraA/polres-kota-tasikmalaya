<?php 

// app/Services/PostService.php
namespace App\Services;

use App\Repositories\PostRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostService
{
    protected PostRepository $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllPosts()
    {
        return $this->repository->all();
    }

    public function findPost(string $id)
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

    public function createPost(array $data)
    {
        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            $data['image'] = $this->upload('posts', $data['image']);
        }
        return $this->repository->create($data);
    }

    public function updatePost(string $id, array $data)
    {
        $post = $this->repository->find($id);

        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            $this->deleteImage($post->image);
            $data['image'] = $this->upload('posts', $data['image']);
        }

        if (isset($data['title'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        return $this->repository->update($post, $data);
    }

    public function deletePost(string $id)
    {
        $post = $this->repository->find($id);
        $this->deleteImage($post->image);
        return $this->repository->delete($post);
    }
}

?>
