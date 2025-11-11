<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\Setting;

class SettingRepository
{
    public function all()
    {
        return Setting::latest()->get();
    }

    public function find($id)
    {
        return Setting::findOrFail($id);
    }

    public function create(array $data)
    {
        return Setting::create($data);
    }

    public function update(Setting $setting, array $data)
    {
        $setting->update($data);
        return $setting;
    }

    public function delete(Setting $setting)
    {
        return $setting->delete();
    }
}

?>
