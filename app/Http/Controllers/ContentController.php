<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quantum;

class ContentController extends Controller
{
    /**
     * Display the quantum page with all active quantum content.
     */
    public function quantum()
    {
        $quantumContent = Quantum::where('is_active', true)->get();

        $galleryImages = [
            ['src' => asset('images/car1.jpg'), 'alt' => 'Car 1', 'fallback' => 'https://picsum.photos/400/300?random=1'],
            ['src' => asset('images/car2.jpg'), 'alt' => 'Car 2', 'fallback' => 'https://picsum.photos/400/300?random=2'],
            ['src' => asset('images/car3.jpg'), 'alt' => 'Car 3', 'fallback' => 'https://picsum.photos/400/300?random=3'],
            ['src' => asset('images/building1.jpg'), 'alt' => 'Building 1', 'fallback' => 'https://picsum.photos/400/300?random=4'],
            ['src' => asset('images/building2.jpg'), 'alt' => 'Building 2', 'fallback' => 'https://picsum.photos/400/300?random=5'],
            ['src' => asset('images/people1.jpg'), 'alt' => 'People 1', 'fallback' => 'https://picsum.photos/400/300?random=6'],
        ];

        return view('quantum', compact('quantumContent', 'galleryImages'));
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
}
