<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Models\{Banner, Service, Product, Contact};

class DashboardController extends Controller
{
    public function index()
    {
        $stats = Cache::remember('dashboard.stats', 60, function () {
            return [
                'banners' => Banner::count(),
                'services' => Service::count(),
                'products' => Product::count(),
                'contacts' => Contact::count(),
            ];
        });
        return view('admin.dashboard', compact('stats'));
    }
}


