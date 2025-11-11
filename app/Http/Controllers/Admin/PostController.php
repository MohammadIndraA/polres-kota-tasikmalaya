<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseJson;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Categories;
use App\Services\PostService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PostController extends Controller
{
     protected PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
         $posts = $this->postService->getAllPosts();
        return DataTables::of($posts)
            ->addIndexColumn()
            ->editColumn('category_id', function($row){
                   return $row->category->name;
            })
             ->editColumn('content', function ($row) {
                return $row->content;
            })
           ->editColumn('image', function($row) {
                if ($row->image) {
                    return '<img src="' . asset('storage/' . $row->image) . '" width="50" />';
                }
                return '-';
            })
             ->addColumn('status', function($row) {
                    if ($row->status === 'published') {
                        return '<span class="bg-green-500/10 text-green-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded-full">published</span>';
                    } elseif($row->status === "archived") {
                        return '<span class="bg-blue-500/10 text-blue-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded-full">archived</span>';
                    } elseif($row->status === "draft") {
                        return '<span class="bg-yellow-500/10 text-yellow-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded-full">draft</span>';
                    }
                })
            ->addColumn('action', function ($row) {
                return view('components.button-action', [
                    'id' => $row->id,
                    'routeEdit' => 'admin.post.edit',
                    'routeDelete' => 'admin.post.destroy',
                    'dataTable' => 'postTable',
                    'model' => $row
                ])->render();
            })
            ->rawColumns(['status', 'action', 'content','image'])
            ->make(true);
        }
        return view('admin.post.index');
    }

    public function create()
    {
        $categories = Categories::all(); // atau pakai CategoryService
        return view('admin.post.form', compact('categories'));
    }

    public function store(PostRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
        }

        $this->postService->createPost($data);

        return redirect()->route('admin.post.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $post = $this->postService->findPost($id);
        return view('posts.show', compact('post'));
    }

    public function edit(string $id)
    {
        $post = $this->postService->findPost($id);
        $categories = Categories::all();
        return view('admin.post.form', compact('post', 'categories'));
    }

    public function update(PostRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
        }

        $this->postService->updatePost($id, $data);

        return redirect()->route('admin.post.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $this->postService->deletePost($id);
        return ResponseJson::success(null, 'berhasil dihapus');
    }
}
