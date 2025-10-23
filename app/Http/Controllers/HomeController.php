<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Service;
use App\Models\Product;
use App\Models\Faq;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Banner::query()
            ->where('is_active', true)
            ->where('page', 'homepage')
            ->orderBy('id')
            ->get(['title', 'description', 'image'])
            ->map(function ($b) {
                return [
                    'title' => $b->title,
                    'subtitle' => $b->description,
                    'bg' => $b->image ? Storage::url($b->image) : asset('images/car1.jpg'),
                ];
            })
            ->values()
            ->all();

        if (empty($slides)) {
            $slides = [
                ['title' => 'Structura', 'subtitle' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit...', 'bg' => asset('images/car1.jpg')],
                ['title' => 'Innovation', 'subtitle' => 'Technology meets design with smart architecture...', 'bg' => asset('images/car2.jpg')],
            ];
        }

        // Get services grouped by subtitle for about section
        $servicesBySubtitle = Service::where('is_active', true)
            ->get()
            ->groupBy('subtitle')
            ->map(function ($services) {
                return $services->take(6); // Limit to 6 services per category
            });

        // Get products for products section
        $products = Product::where('is_active', true)
            ->take(8)
            ->get();

        // Get FAQs for FAQ section
        $faqs = Faq::active()
            ->ordered()
            ->take(8)
            ->get();

        // Get blog posts for news section
        $blogPosts = BlogPost::where('is_active', true)
            ->take(3)
            ->get();

        return view('welcome', [
            'slides' => $slides,
            'servicesBySubtitle' => $servicesBySubtitle,
            'products' => $products,
            'faqs' => $faqs,
            'blogPosts' => $blogPosts
        ]);
    }
}


