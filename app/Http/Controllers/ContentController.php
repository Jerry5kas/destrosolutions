<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quantum;
use App\Models\Gallery;
use App\Models\Service;
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
}
