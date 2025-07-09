<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estate;
use App\Models\EstateImage;

class ManualGallerySeeder extends Seeder
{
    public function run()
    {
        // İlk estate'i bul
        $estate = Estate::first();
        
        if ($estate) {
            echo "Estate bulundu: ID = " . $estate->id . "\n";
            
            // Mevcut galeri resimlerini sil
            EstateImage::where('estate_id', $estate->id)->delete();
            
            // Test galeri resimleri ekle
            $galleryImages = [
                'estates/gallery/gallery1.jpg',
                'estates/gallery/gallery2.jpg', 
                'estates/gallery/gallery3.jpg',
                'estates/gallery/gallery4.jpg',
                'estates/gallery/gallery5.jpg'
            ];
            
            foreach ($galleryImages as $image) {
                EstateImage::create([
                    'estate_id' => $estate->id,
                    'image' => $image
                ]);
                echo "Galeri resmi eklendi: " . $image . "\n";
            }
            
            echo "Toplam " . count($galleryImages) . " galeri resmi eklendi.\n";
        } else {
            echo "Estate bulunamadı!\n";
        }
    }
} 