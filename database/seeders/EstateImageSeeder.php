<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estate;
use App\Models\EstateImage;

class EstateImageSeeder extends Seeder
{
    public function run()
    {
        // İlk estate'i bul
        $estate = Estate::first();
        
        if ($estate) {
            // Test galeri resimleri ekle
            EstateImage::create([
                'estate_id' => $estate->id,
                'image' => 'estates/gallery/test1.jpg'
            ]);
            
            EstateImage::create([
                'estate_id' => $estate->id,
                'image' => 'estates/gallery/test2.jpg'
            ]);
            
            EstateImage::create([
                'estate_id' => $estate->id,
                'image' => 'estates/gallery/test3.jpg'
            ]);
            
            EstateImage::create([
                'estate_id' => $estate->id,
                'image' => 'estates/gallery/test4.jpg'
            ]);
            
            EstateImage::create([
                'estate_id' => $estate->id,
                'image' => 'estates/gallery/test5.jpg'
            ]);
        }
    }
} 