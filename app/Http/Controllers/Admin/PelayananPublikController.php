<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseJson;
use App\Http\Controllers\Controller;
use App\Http\Requests\PelayananPublikRequest;
use App\Models\PelayananPublik;
use App\Services\PelayananPublikService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PelayananPublikController extends Controller
{
      protected PelayananPublikService $pelayananPublik;

    public function __construct(PelayananPublikService $pelayananPublik)
    {
        $this->pelayananPublik = $pelayananPublik;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
         $pelayananPublik = $this->pelayananPublik->getAllPelayananPublik();
        return DataTables::of($pelayananPublik)
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
                    'routeEdit' => 'admin.pelayanan-publik.edit',
                    'routeDelete' => 'admin.pelayanan-publik.destroy',
                    'dataTable' => 'pelayananPublikTable',
                    'model' => $row
                ])->render();
            })
            ->rawColumns(['status', 'action', 'content','image'])
            ->make(true);
        }
        return view('admin.pelayanan-publik.index');
    }

    public function create()
    {
        return view('admin.pelayanan-publik.form');
    }

    public function store(PelayananPublikRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
        }

        $this->pelayananPublik->createPelayananPublik($data);

        return redirect()->route('admin.pelayanan-publik.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $pelayananPublik = $this->pelayananPublik->findPelayananPublik($id);
        return view('pelayananPubliks.show', compact('pelayananPublik'));
    }

    public function edit(string $id)
    {
        $pelayananPublik = $this->pelayananPublik->findPelayananPublik($id);
        return view('admin.pelayanan-publik.form', compact('pelayananPublik'));
    }

    public function update(PelayananPublikRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
        }

        $this->pelayananPublik->updatePelayananPublik($id, $data);

        return redirect()->route('admin.pelayanan-publik.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $this->pelayananPublik->deletePelayananPublik($id);
        return ResponseJson::success(null, 'berhasil dihapus');
    }
}
