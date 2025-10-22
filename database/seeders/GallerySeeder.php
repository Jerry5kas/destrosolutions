<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleries = [
            [
                'title' => 'Quantum Solutions Gallery',
                'description' => 'Advanced quantum computing solutions and technologies',
                'images' => [
                    'images/car1.jpg',
                    'images/car2.jpg',
                    'images/car3.jpg',
                ],
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Automotive Innovation',
                'description' => 'Cutting-edge automotive technologies and solutions',
                'images' => [
                    'images/building1.jpg',
                    'images/building2.jpg',
                    'images/people1.jpg',
                ],
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Technology Showcase',
                'description' => 'Latest technology innovations and implementations',
                'images' => [
                    'images/prodtest1.jpg',
                    'images/automation-1.webp',
                    'images/quantum-1.webp',
                ],
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($galleries as $galleryData) {
            Gallery::create($galleryData);
        }
    }
}
