<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estate;
use App\Models\EstateImage;

class TestGallerySeeder extends Seeder
{
    public function run()
    {
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
                // Eğer bu resim zaten varsa ekleme
                $existingImage = EstateImage::where('estate_id', $estate->id)
                                          ->where('image', $image)
                                          ->first();
                
                if (!$existingImage) {
                    EstateImage::create([
                        'estate_id' => $estate->id,
                        'image' => $image
                    ]);
                    echo "Galeri resmi eklendi: " . $image . "\n";
                } else {
                    echo "Galeri resmi zaten mevcut: " . $image . "\n";
                }
            }
            
            echo "İşlem tamamlandı.\n";
        } else {
            echo "Estate bulunamadı!\n";
        }
    }
} 