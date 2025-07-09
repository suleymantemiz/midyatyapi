<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estate;
use App\Models\EstateImage;

class CleanGallerySeeder extends Seeder
{
    public function run()
    {
        // Tüm galeri resimlerini temizle
        EstateImage::truncate();
        echo "Tüm galeri resimleri temizlendi.\n";
        
        // İlk estate'i bul
        $estate = Estate::first();
        
        if ($estate) {
            echo "Estate bulundu: ID = " . $estate->id . "\n";
            
            // Test galeri resimleri ekle
            $galleryImages = [
                'estates/gallery/test1.jpg',
                'estates/gallery/test2.jpg', 
                'estates/gallery/test3.jpg',
                'estates/gallery/test4.jpg',
                'estates/gallery/test5.jpg'
            ];
            
            foreach ($galleryImages as $image) {
                EstateImage::create([
                    'estate_id' => $estate->id,
                    'image_path' => $image
                ]);
                echo "Galeri resmi eklendi: " . $image . "\n";
            }
            
            echo "Toplam " . count($galleryImages) . " galeri resmi eklendi.\n";
        } else {
            echo "Estate bulunamadı!\n";
        }
    }
} 