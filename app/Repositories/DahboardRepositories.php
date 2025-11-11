<?php

namespace App\Repositories;

use App\Models\PelayananPublik;
use App\Models\Post;

class DahboardRepositories
{
    public function getAllPost()
    {
        return Post::latest()->get();
    }

    public function getAllPelayananPublik()
    {
        return PelayananPublik::latest()->get();
    }

}

?>
