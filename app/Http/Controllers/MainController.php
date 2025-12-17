<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        // 1. Data Pie Chart (Gender)
        $totalMale   = Pegawai::where('gender', 'male')->count();
        $totalFemale = Pegawai::where('gender', 'female')->count();

        // 2. Data Bar Chart (Top 5 Pekerjaan)
        $topJobs = Pekerjaan::withCount('pegawai')
            ->orderBy('pegawai_count', 'desc')
            ->take(5)
            ->get();

        $jobLabels = $topJobs->pluck('nama');
        $jobTotals = $topJobs->pluck('pegawai_count');

        return view('index', compact('totalMale', 'totalFemale', 'jobLabels', 'jobTotals'));
    }
}