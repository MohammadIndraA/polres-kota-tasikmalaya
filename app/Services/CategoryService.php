<?php 

// app/Services/PostService.php
namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryService
{
    protected CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllCategories()
    {
        return $this->repository->all();
    }

    public function findCategory(string $id)
    {
        return $this->repository->find($id);
    }

    public function createCategory(array $data)
    {

        return $this->repository->create($data);
    }

    public function updateCategory(string $id, array $data)
    {
        $category = $this->repository->find($id);

        if (isset($data['name'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        return $this->repository->update($category, $data);
    }

    public function deleteCategory(string $id)
    {
        $category = $this->repository->find($id);
        return $this->repository->delete($category);
    }
}

?>
