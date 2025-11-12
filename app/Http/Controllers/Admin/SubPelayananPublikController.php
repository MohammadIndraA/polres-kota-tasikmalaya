<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseJson;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubPelayananPublikRequest;
use App\Services\SubPelayananPublikService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;


class SubPelayananPublikController extends Controller
{
      protected SubPelayananPublikService $service;

    public function __construct(SubPelayananPublikService $service)
    {
        $this->service = $service;
    }
    
    public function index(Request $request)
    {
        $sub_pelayanan = $this->service->getAllSubPelayananPublik();
        if ($request->ajax()) {
         $sub_pelayanan = $this->service->getAllSubPelayananPublik();
        return DataTables::of($sub_pelayanan)
            ->addIndexColumn()
            ->editColumn('content', function ($row) {
                 return Str::limit(strip_tags($row->content), 100); // 100 karakter, tanpa tag HTML
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
                    'routeEdit' => 'admin.sub-pelayanan-publik.edit',
                    'routeDelete' => 'admin.sub-pelayanan-publik.destroy',
                    'dataTable' => 'sub_pelayananTable',
                    'model' => $row
                ])->render();
            })
            ->rawColumns(['status', 'action', 'content','image'])
            ->make(true);
        }
        return view('admin.sub-pelayanan-publik.index');
    }

    public function create()
    {
        $playananPubliks = $this->service->getAllPelayananPublik();
        return view('admin.sub-pelayanan-publik.form', compact('playananPubliks'));
    }

    public function store(SubPelayananPublikRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
        }

        $this->service->createSubPelayananPublik($data);

        return redirect()->route('admin.sub-pelayanan-publik.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $sub_pelayanan = $this->service->findSubPelayananPublik($id);
        return view('sub_pelayanans.show', compact('sub_pelayanan'));
    }

    public function edit(string $id)
    {
        $playananPubliks = $this->service->getAllPelayananPublik();
        $subPelayananPublik = $this->service->findSubPelayananPublik($id);
        return view('admin.sub-pelayanan-publik.form', compact('subPelayananPublik', 'playananPubliks'));
    }

    public function update(SubPelayananPublikRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
        }

        $this->service->updateSubPelayananPublik($id, $data);

        return redirect()->route('admin.sub-pelayanan-publik.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $this->service->deleteSubPelayananPublik($id);
        return ResponseJson::success(null, 'berhasil dihapus');
    }
}
