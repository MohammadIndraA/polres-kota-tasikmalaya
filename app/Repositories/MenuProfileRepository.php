<?php

namespace App\Repositories;

use App\Models\Categories;
use App\Models\MenuProfile;

class MenuProfileRepository
{
    public function all()
    {
        return MenuProfile::latest()->get();
    }

    public function find($id)
    {
        return MenuProfile::findOrFail($id);
    }

    public function create(array $data)
    {
        return MenuProfile::create($data);
    }

    public function update(MenuProfile $menuProfile, array $data)
    {
        $menuProfile->update($data);
        return $menuProfile;
    }

    public function delete(MenuProfile $menuProfile)
    {
        return $menuProfile->delete();
    }
}

?>
