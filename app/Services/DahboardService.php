<?php 

namespace App\Services;

use App\Repositories\BannerRepository;
use App\Repositories\DahboardRepositories;

class DahboardService
{

      protected DahboardRepositories $repository;

    public function __construct(DahboardRepositories $repository)
    {
        $this->repository = $repository;
    }

    public function getAllPost()
    {
        return $this->repository->getAllPost();
    }

    public function getAllPelayananPublik()
    {
        return $this->repository->getAllPelayananPublik();
    }


}

?>
