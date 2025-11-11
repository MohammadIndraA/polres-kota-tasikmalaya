<?php

namespace App\Repositories;

use App\Models\Banner;

class BannerRepository
{
    public function all()
    {
        return Banner::latest()->get();
    }

    public function find($id)
    {
        return Banner::findOrFail($id);
    }

    public function create(array $data)
    {
        return Banner::create($data);
    }

    public function update(Banner $banner, array $data)
    {
        $banner->update($data);
        return $banner;
    }

    public function delete(Banner $banner)
    {
        return $banner->delete();
    }
}

?>
