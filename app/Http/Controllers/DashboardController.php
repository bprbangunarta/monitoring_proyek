<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $klien = User::where('role', '0')->count();
        $proyek_n = Proyek::where('is_str', '0')->count();
        $proyek_a = Proyek::where('is_str', '1')->count();
        $proyek_d = Proyek::where('is_str', '2')->count();

        return view('welcome', [
            'klien' => $klien,
            'proyek_n' => $proyek_n,
            'proyek_a' => $proyek_a,
            'proyek_d' => $proyek_d,
        ]);
    }
}
