<?php

namespace App\Repositories;

use App\Models\Categories;
use App\Models\MenuProfile;
use App\Models\PelayananPublik;

class PelayananPublikRepository
{
    public function all()
    {
        return PelayananPublik::orderBy('urutan', 'asc')->get();
    }

    public function find($id)
    {
        return PelayananPublik::findOrFail($id);
    }

    public function create(array $data)
    {
        return PelayananPublik::create($data);
    }

    public function update(PelayananPublik $pelayananPublik, array $data)
    {
        $pelayananPublik->update($data);
        return $pelayananPublik;
    }

    public function delete(PelayananPublik $pelayananPublik)
    {
        return $pelayananPublik->delete();
    }
}

?>
