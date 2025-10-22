<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quantum;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Product;
use App\Models\Training;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    /**
     * Display the quantum page with all active quantum content.
     */
    public function quantum()
    {
        $quantumContent = Quantum::where('is_active', true)->get();
        
        // Fetch active galleries ordered by sort_order
        $galleries = Gallery::active()->ordered()->get();

        $galleryImages = [
            ['src' => asset('images/car1.jpg'), 'alt' => 'Car 1', 'fallback' => 'https://picsum.photos/400/300?random=1'],
            ['src' => asset('images/car2.jpg'), 'alt' => 'Car 2', 'fallback' => 'https://picsum.photos/400/300?random=2'],
            ['src' => asset('images/car3.jpg'), 'alt' => 'Car 3', 'fallback' => 'https://picsum.photos/400/300?random=3'],
            ['src' => asset('images/building1.jpg'), 'alt' => 'Building 1', 'fallback' => 'https://picsum.photos/400/300?random=4'],
            ['src' => asset('images/building2.jpg'), 'alt' => 'Building 2', 'fallback' => 'https://picsum.photos/400/300?random=5'],
            ['src' => asset('images/people1.jpg'), 'alt' => 'People 1', 'fallback' => 'https://picsum.photos/400/300?random=6'],
        ];

        return view('quantum', compact('quantumContent', 'galleryImages', 'galleries'));
    }

    /**
     * Display a specific quantum item.
     */
    public function quantumItem(Quantum $quantum)
    {
        return view('quantum-item', compact('quantum'));
    }

    /**
     * Get gallery images as JSON (for API use).
     */
    public function getGalleryImages()
    {
        $galleryImages = [
            ['src' => asset('images/car1.jpg'), 'alt' => 'Car 1', 'fallback' => 'https://picsum.photos/400/300?random=1'],
            ['src' => asset('images/car2.jpg'), 'alt' => 'Car 2', 'fallback' => 'https://picsum.photos/400/300?random=2'],
            ['src' => asset('images/car3.jpg'), 'alt' => 'Car 3', 'fallback' => 'https://picsum.photos/400/300?random=3'],
            ['src' => asset('images/building1.jpg'), 'alt' => 'Building 1', 'fallback' => 'https://picsum.photos/400/300?random=4'],
            ['src' => asset('images/building2.jpg'), 'alt' => 'Building 2', 'fallback' => 'https://picsum.photos/400/300?random=5'],
            ['src' => asset('images/people1.jpg'), 'alt' => 'People 1', 'fallback' => 'https://picsum.photos/400/300?random=6'],
        ];

        return response()->json(['images' => $galleryImages]);
    }

    /**
     * Display the services page with all active services.
     */
    public function services()
    {
        $services = Service::where('is_active', true)->get();
        
        // Get unique subtitles for filtering
        $subtitles = Service::where('is_active', true)
            ->distinct()
            ->pluck('subtitle')
            ->filter()
            ->values();
        
        // Fetch active galleries ordered by sort_order
        $galleries = Gallery::active()->ordered()->get();

        $galleryImages = [
            ['src' => asset('images/car1.jpg'), 'alt' => 'Car 1', 'fallback' => 'https://picsum.photos/400/300?random=1'],
            ['src' => asset('images/car2.jpg'), 'alt' => 'Car 2', 'fallback' => 'https://picsum.photos/400/300?random=2'],
            ['src' => asset('images/car3.jpg'), 'alt' => 'Car 3', 'fallback' => 'https://picsum.photos/400/300?random=3'],
            ['src' => asset('images/building1.jpg'), 'alt' => 'Building 1', 'fallback' => 'https://picsum.photos/400/300?random=4'],
            ['src' => asset('images/building2.jpg'), 'alt' => 'Building 2', 'fallback' => 'https://picsum.photos/400/300?random=5'],
            ['src' => asset('images/people1.jpg'), 'alt' => 'People 1', 'fallback' => 'https://picsum.photos/400/300?random=6'],
        ];

        return view('service', compact('services', 'subtitles', 'galleryImages', 'galleries'));
    }

    /**
     * Display services filtered by subtitle.
     */
    public function servicesBySubtitle($subtitle)
    {
        // Convert slug back to original subtitle format
        $originalSubtitle = Service::where('is_active', true)
            ->whereRaw('LOWER(REPLACE(REPLACE(REPLACE(subtitle, " ", "-"), "&", "and"), " ", "-")) = ?', [strtolower($subtitle)])
            ->value('subtitle');
        
        if (!$originalSubtitle) {
            // If no exact match, try to find by slug conversion
            $originalSubtitle = Service::where('is_active', true)
                ->get()
                ->first(function ($service) use ($subtitle) {
                    return Str::slug($service->subtitle) === $subtitle;
                })?->subtitle;
        }
        
        if (!$originalSubtitle) {
            abort(404, 'Service category not found');
        }
        
        $services = Service::where('is_active', true)
            ->where('subtitle', $originalSubtitle)
            ->get();
        
        // Get unique subtitles for filtering
        $subtitles = Service::where('is_active', true)
            ->distinct()
            ->pluck('subtitle')
            ->filter()
            ->values();
        
        // Fetch active galleries ordered by sort_order
        $galleries = Gallery::active()->ordered()->get();

        $galleryImages = [
            ['src' => asset('images/car1.jpg'), 'alt' => 'Car 1', 'fallback' => 'https://picsum.photos/400/300?random=1'],
            ['src' => asset('images/car2.jpg'), 'alt' => 'Car 2', 'fallback' => 'https://picsum.photos/400/300?random=2'],
            ['src' => asset('images/car3.jpg'), 'alt' => 'Car 3', 'fallback' => 'https://picsum.photos/400/300?random=3'],
            ['src' => asset('images/building1.jpg'), 'alt' => 'Building 1', 'fallback' => 'https://picsum.photos/400/300?random=4'],
            ['src' => asset('images/building2.jpg'), 'alt' => 'Building 2', 'fallback' => 'https://picsum.photos/400/300?random=5'],
            ['src' => asset('images/people1.jpg'), 'alt' => 'People 1', 'fallback' => 'https://picsum.photos/400/300?random=6'],
        ];

        return view('service', compact('services', 'subtitles', 'galleryImages', 'galleries', 'originalSubtitle'));
    }

    /**
     * Display the products page with all active products.
     */
    public function products()
    {
        $products = Product::where('is_active', true)->get();

        $subtitles = Product::where('is_active', true)
            ->distinct()
            ->pluck('subtitle')
            ->filter()
            ->values();

        $galleries = Gallery::active()->ordered()->get();

        $galleryImages = [
            ['src' => asset('images/car1.jpg'), 'alt' => 'Car 1', 'fallback' => 'https://picsum.photos/400/300?random=1'],
            ['src' => asset('images/car2.jpg'), 'alt' => 'Car 2', 'fallback' => 'https://picsum.photos/400/300?random=2'],
            ['src' => asset('images/car3.jpg'), 'alt' => 'Car 3', 'fallback' => 'https://picsum.photos/400/300?random=3'],
            ['src' => asset('images/building1.jpg'), 'alt' => 'Building 1', 'fallback' => 'https://picsum.photos/400/300?random=4'],
            ['src' => asset('images/building2.jpg'), 'alt' => 'Building 2', 'fallback' => 'https://picsum.photos/400/300?random=5'],
            ['src' => asset('images/people1.jpg'), 'alt' => 'People 1', 'fallback' => 'https://picsum.photos/400/300?random=6'],
        ];

        return view('product', compact('products', 'subtitles', 'galleryImages', 'galleries'));
    }

    /**
     * Display products filtered by subtitle.
     */
    public function productsBySubtitle($subtitle)
    {
        $originalSubtitle = Product::where('is_active', true)
            ->get()
            ->first(function ($product) use ($subtitle) {
                return Str::slug($product->subtitle) === strtolower($subtitle);
            })?->subtitle;

        if (!$originalSubtitle) {
            abort(404, 'Product category not found');
        }

        $products = Product::where('is_active', true)
            ->where('subtitle', $originalSubtitle)
            ->get();

        $subtitles = Product::where('is_active', true)
            ->distinct()
            ->pluck('subtitle')
            ->filter()
            ->values();

        $galleries = Gallery::active()->ordered()->get();

        $galleryImages = [
            ['src' => asset('images/car1.jpg'), 'alt' => 'Car 1', 'fallback' => 'https://picsum.photos/400/300?random=1'],
            ['src' => asset('images/car2.jpg'), 'alt' => 'Car 2', 'fallback' => 'https://picsum.photos/400/300?random=2'],
            ['src' => asset('images/car3.jpg'), 'alt' => 'Car 3', 'fallback' => 'https://picsum.photos/400/300?random=3'],
            ['src' => asset('images/building1.jpg'), 'alt' => 'Building 1', 'fallback' => 'https://picsum.photos/400/300?random=4'],
            ['src' => asset('images/building2.jpg'), 'alt' => 'Building 2', 'fallback' => 'https://picsum.photos/400/300?random=5'],
            ['src' => asset('images/people1.jpg'), 'alt' => 'People 1', 'fallback' => 'https://picsum.photos/400/300?random=6'],
        ];

        return view('product', compact('products', 'subtitles', 'galleryImages', 'galleries', 'originalSubtitle'));
    }

    /**
     * Display the training page with all active trainings.
     */
    public function trainings()
    {
        $trainings = Training::where('is_active', true)->get();

        $subtitles = Training::where('is_active', true)
            ->distinct()
            ->pluck('subtitle')
            ->filter()
            ->values();

        $galleries = Gallery::active()->ordered()->get();

        $galleryImages = [
            ['src' => asset('images/car1.jpg'), 'alt' => 'Car 1', 'fallback' => 'https://picsum.photos/400/300?random=1'],
            ['src' => asset('images/car2.jpg'), 'alt' => 'Car 2', 'fallback' => 'https://picsum.photos/400/300?random=2'],
            ['src' => asset('images/car3.jpg'), 'alt' => 'Car 3', 'fallback' => 'https://picsum.photos/400/300?random=3'],
            ['src' => asset('images/building1.jpg'), 'alt' => 'Building 1', 'fallback' => 'https://picsum.photos/400/300?random=4'],
            ['src' => asset('images/building2.jpg'), 'alt' => 'Building 2', 'fallback' => 'https://picsum.photos/400/300?random=5'],
            ['src' => asset('images/people1.jpg'), 'alt' => 'People 1', 'fallback' => 'https://picsum.photos/400/300?random=6'],
        ];

        return view('training', compact('trainings', 'subtitles', 'galleryImages', 'galleries'));
    }

    /**
     * Display trainings filtered by subtitle.
     */
    public function trainingsBySubtitle($subtitle)
    {
        $originalSubtitle = Training::where('is_active', true)
            ->get()
            ->first(function ($training) use ($subtitle) {
                return Str::slug($training->subtitle) === strtolower($subtitle);
            })?->subtitle;

        if (!$originalSubtitle) {
            abort(404, 'Training category not found');
        }

        $trainings = Training::where('is_active', true)
            ->where('subtitle', $originalSubtitle)
            ->get();

        $subtitles = Training::where('is_active', true)
            ->distinct()
            ->pluck('subtitle')
            ->filter()
            ->values();

        $galleries = Gallery::active()->ordered()->get();

        $galleryImages = [
            ['src' => asset('images/car1.jpg'), 'alt' => 'Car 1', 'fallback' => 'https://picsum.photos/400/300?random=1'],
            ['src' => asset('images/car2.jpg'), 'alt' => 'Car 2', 'fallback' => 'https://picsum.photos/400/300?random=2'],
            ['src' => asset('images/car3.jpg'), 'alt' => 'Car 3', 'fallback' => 'https://picsum.photos/400/300?random=3'],
            ['src' => asset('images/building1.jpg'), 'alt' => 'Building 1', 'fallback' => 'https://picsum.photos/400/300?random=4'],
            ['src' => asset('images/building2.jpg'), 'alt' => 'Building 2', 'fallback' => 'https://picsum.photos/400/300?random=5'],
            ['src' => asset('images/people1.jpg'), 'alt' => 'People 1', 'fallback' => 'https://picsum.photos/400/300?random=6'],
        ];

        return view('training', compact('trainings', 'subtitles', 'galleryImages', 'galleries', 'originalSubtitle'));
    }
}
