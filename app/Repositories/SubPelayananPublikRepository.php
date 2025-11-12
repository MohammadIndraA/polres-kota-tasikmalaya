<?php

namespace App\Repositories;

use App\Models\PelayananPublik;
use App\Models\SubPelayananPublik;

class SubPelayananPublikRepository
{
    public function all()
    {
        return SubPelayananPublik::latest()->get();
    }

    public function find($id)
    {
        return SubPelayananPublik::findOrFail($id);
    }

    public function create(array $data)
    {
        return SubPelayananPublik::create($data);
    }

    public function update(SubPelayananPublik $pelayananPublik, array $data)
    {
        $pelayananPublik->update($data);
        return $pelayananPublik;
    }

    public function delete(SubPelayananPublik $pelayananPublik)
    {
        return $pelayananPublik->delete();
    }

     public function getAllPelayananPublik()
    {
        return PelayananPublik::latest()->get();
    }
}

?>
