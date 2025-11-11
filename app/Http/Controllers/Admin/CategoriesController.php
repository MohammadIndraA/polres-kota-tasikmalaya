<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseJson;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class CategoriesController extends Controller
{
        protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
         $categorys = $this->categoryService->getAllCategories();
        return DataTables::of($categorys)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return view('components.button-action', [
                    'id' => $row->id,
                    'routeEdit' => 'admin.category.edit',
                    'routeDelete' => 'admin.category.destroy',
                    'dataTable' => 'categoryTable',
                    'model' => $row
                ])->render();
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.form');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $this->categoryService->createCategory($data);

        return redirect()->route('admin.categories.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $category = $this->categoryService->findCategory($id);
        return view('categorys.show', compact('category'));
    }

    public function edit(string $id)
    {
        $category = $this->categoryService->findCategory($id);
        return view('admin.categories.form', compact('category'));
    }

    public function update(CategoryRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
        }

        $this->categoryService->updateCategory($id, $data);

        return redirect()->route('admin.categories.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $this->categoryService->deleteCategory($id);
        return ResponseJson::success(null, 'berhasil dihapus');
    }

}
