<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DahboardService;

class DashboardController extends Controller
{
     public function __construct(protected DahboardService $service) {}
     public function index()
    {
        // $stats = $this->service->getStats();
        
        // $data = $this->report->generateInvestorReport();
        // dd($stats['investors']);
        
        return view('dashboard.index', [
            'post' => $this->service->getAllPost()->count(),
            'pelayanan_publik' => $this->service->getAllPelayananPublik()->count(),
            // 'mitras' =>  $stats['mitras'] ?? 0,
            // 'modul_pelatihans' => $stats['modul_pelatihans'] ?? 0,
            // 'materi_pelatihans' => $stats['materi_pelatihans'] ?? 0,
            // 'investors' => $stats['investors'] ?? 0,
            // 'produks' => $stats['produks'] ?? 0,
        ]);
    }
}
