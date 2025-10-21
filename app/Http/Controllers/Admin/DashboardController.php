<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Models\{Banner, Service, Product, Contact, Quantum, Training, BlogPost, Gallery, Faq, Team};

class DashboardController extends Controller
{
    public function index()
    {
        $stats = Cache::remember('dashboard.stats', 60, function () {
            return [
                'banners' => Banner::count(),
                'quantum' => Quantum::count(),
                'services' => Service::count(),
                'products' => Product::count(),
                'training' => Training::count(),
                'blog_posts' => BlogPost::count(),
                'contacts' => Contact::count(),
                'galleries' => Gallery::count(),
                'faqs' => Faq::count(),
                'teams' => Team::count(),
            ];
        });

        // Get latest blog posts with categories
        $latestPosts = Cache::remember('dashboard.latest_posts', 30, function () {
            return BlogPost::with('category')
                ->latest()
                ->limit(5)
                ->get();
        });

        return view('admin.dashboard', compact('stats', 'latestPosts'));
    }
}


