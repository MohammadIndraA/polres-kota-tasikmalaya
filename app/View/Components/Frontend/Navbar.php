<?php

namespace App\View\Components\Frontend;

use App\Models\MenuProfile;
use App\Models\PelayananPublik;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public $pelayanan_publik;
    public $menu_profil;

    public function __construct()
    {
        $this->pelayanan_publik = cache()->remember('navbar_pelayanan', 3600, function () {
            return PelayananPublik::where('status', 'published')
                ->orderBy('urutan', 'asc')
                ->get();
        });

        $this->menu_profil = cache()->remember('navbar_menu_profil', 3600, function () {
            return MenuProfile::where('status', 'published')->get();
        });

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.navbar');
    }
}
