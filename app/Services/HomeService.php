<?php 

// app/Services/PostService.php
namespace App\Services;

use App\Repositories\HomeRepository;

class HomeService
{
    protected HomeRepository $repository;

    public function __construct(HomeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllBanners()
    {
        return $this->repository->getAllBanner();
    }
    
    public function getAllProfilMenu()
    {
        return $this->repository->getAllProfilMenu();
         
    }
    public function getAllPelayananPublik()
    {
        return $this->repository->getAllPelayananPublik();
         
    }
    public function getAllPost()
    {
        return $this->repository->getAllPost();
         
    }

}

?>
