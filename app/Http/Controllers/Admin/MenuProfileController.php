<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseJson;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuProfileRequest;
use App\Services\MenuProfileService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MenuProfileController extends Controller
{
      protected MenuProfileService $menuProfilService;

    public function __construct(MenuProfileService $menuProfilService)
    {
        $this->menuProfilService = $menuProfilService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
         $menuProfil = $this->menuProfilService->getAllMenuProfiles();
        return DataTables::of($menuProfil)
            ->addIndexColumn()
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
                    'routeEdit' => 'admin.profil.edit',
                    'routeDelete' => 'admin.profil.destroy',
                    'dataTable' => 'menuProfilTable',
                    'model' => $row
                ])->render();
            })
            ->rawColumns(['status', 'action', 'content','image'])
            ->make(true);
        }
        return view('admin.menu-profil.index');
    }

    public function create()
    {
        return view('admin.menu-profil.form');
    }

    public function store(MenuProfileRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
        }

        $this->menuProfilService->createMenuProfile($data);

        return redirect()->route('admin.profil.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $menuProfil = $this->menuProfilService->findMenuProfile($id);
        return view('menuProfils.show', compact('menuProfil'));
    }

    public function edit(string $id)
    {
        $menuProfil = $this->menuProfilService->findMenuProfile($id);
        return view('admin.menu-profil.form', compact('menuProfil'));
    }

    public function update(MenuProfileRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
        }

        $this->menuProfilService->updateMenuProfile($id, $data);

        return redirect()->route('admin.profil.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $this->menuProfilService->deleteMenuProfile($id);
        return ResponseJson::success(null, 'berhasil dihapus');
    }
}
