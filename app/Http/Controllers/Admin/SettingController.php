<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Services\SettingService;
use Illuminate\Http\Request;

class SettingController extends Controller
{

      protected $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

        public function store(SettingRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
        }

        $this->settingService->createSetting($data);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }
      public function update(SettingRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
        }

        $this->settingService->updateSetting($id, $data);

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }
}
