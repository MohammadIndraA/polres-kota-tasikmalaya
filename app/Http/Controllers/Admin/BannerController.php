<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseJson;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Services\BannerService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BannerController extends Controller
{
      protected BannerService $bannerService;

    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
         $banners = $this->bannerService->getAllBanners();
        return DataTables::of($banners)
            ->addIndexColumn()
           ->editColumn('image', function($row) {
                if ($row->image) {
                    return '<img src="' . asset('storage/' . $row->image) . '" width="50" />';
                }
                return '-';
            })
             ->editColumn('name', function ($row) {
                return $row->name;
            })
            ->addColumn('action', function ($row) {
                return view('components.button-action', [
                    'id' => $row->id,
                    'routeEdit' => 'admin.banner.edit',
                    'routeDelete' => 'admin.banner.destroy',
                    'dataTable' => 'bannerTable',
                    'model' => $row
                ])->render();
            })
            ->rawColumns(['action','image','name'])
            ->make(true);
        }
        return view('admin.banner.index');
    }

    public function create()
    {
        return view('admin.banner.form');
    }

    public function store(BannerRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
        }

        $this->bannerService->createBanner($data);

        return redirect()->route('admin.banner.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $banner = $this->bannerService->findBanner($id);
        return view('posts.show', compact('banner'));
    }

    public function edit(string $id)
    {
        $banner = $this->bannerService->findBanner($id);
        return view('admin.banner.form', compact('banner'));
    }

    public function update(BannerRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
        }

        $this->bannerService->updateBanner($id, $data);

        return redirect()->route('admin.banner.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $this->bannerService->deleteBanner($id);
        return ResponseJson::success(null, 'berhasil dihapus');
    }
}
