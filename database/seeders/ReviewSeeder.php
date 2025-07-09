<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Estate;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estates = Estate::all();

        if ($estates->count() > 0) {
            foreach ($estates as $estate) {
                // Onaylı yorumlar
                Review::create([
                    'estate_id' => $estate->id,
                    'name' => 'Ahmet Yılmaz',
                    'email' => 'ahmet@example.com',
                    'comment' => 'Bu ilan gerçekten çok güzel. Fiyatı da uygun. Kesinlikle tavsiye ederim.',
                    'rating' => 5,
                    'is_approved' => true,
                ]);

                Review::create([
                    'estate_id' => $estate->id,
                    'name' => 'Fatma Demir',
                    'email' => 'fatma@example.com',
                    'comment' => 'Konumu çok iyi, ulaşım kolay. İç mekan da oldukça ferah.',
                    'rating' => 4,
                    'is_approved' => true,
                ]);

                // Bekleyen yorumlar
                Review::create([
                    'estate_id' => $estate->id,
                    'name' => 'Mehmet Kaya',
                    'email' => 'mehmet@example.com',
                    'comment' => 'Bu ilan hakkında düşüncelerimi paylaşmak istiyorum. Genel olarak memnunum.',
                    'rating' => 3,
                    'is_approved' => false,
                ]);
            }
        }
    }
} 