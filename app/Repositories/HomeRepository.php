<?php

namespace App\Repositories;

use App\Models\Banner;
use App\Models\MenuProfile;
use App\Models\PelayananPublik;
use App\Models\Post;

class HomeRepository
{
    public function getAllBanner()
    {
        return Banner::latest()->get();
    }

    public function getAllProfilMenu()
    {
        return MenuProfile::latest()->get();
    }

    public function getAllPelayananPublik()
    {
        return PelayananPublik::latest()->get();
    }

    public function getAllPost()
    {
        return Post::with('category')->latest()->paginate(15);
    }

    


}

?>
