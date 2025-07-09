<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactContentSeeder extends Seeder
{
    public function run()
    {
        DB::table('contact_contents')->truncate();
        DB::table('contact_contents')->insert([
            'title' => 'Bizimle İletişime Geçin',
            'main_content' => 'Sorularınız için bize ulaşın, size yardımcı olmaktan mutluluk duyarız',
            'contact_info' => json_encode([
                [
                    'title' => 'Adres',
                    'value' => 'Midyat, Mardin, Türkiye',
                    'icon' => 'ion-ios-location'
                ],
                [
                    'title' => 'Telefon',
                    'value' => '+90 482 123 45 67',
                    'icon' => 'ion-ios-telephone'
                ],
                [
                    'title' => 'E-posta',
                    'value' => 'info@midyatemlak.com',
                    'icon' => 'ion-ios-email'
                ]
            ]),
            'working_hours' => json_encode([
                ['day' => 'Pazartesi', 'hours' => '09:00 - 18:00'],
                ['day' => 'Salı', 'hours' => '09:00 - 18:00'],
                ['day' => 'Çarşamba', 'hours' => '09:00 - 18:00'],
                ['day' => 'Perşembe', 'hours' => '09:00 - 18:00'],
                ['day' => 'Cuma', 'hours' => '09:00 - 18:00'],
                ['day' => 'Cumartesi', 'hours' => '09:00 - 15:00'],
                ['day' => 'Pazar', 'hours' => 'Kapalı']
            ]),
            'social_links' => json_encode([
                [
                    'platform' => 'Facebook',
                    'url' => '#',
                    'icon' => 'ion-logo-facebook'
                ],
                [
                    'platform' => 'Twitter',
                    'url' => '#',
                    'icon' => 'ion-logo-twitter'
                ],
                [
                    'platform' => 'Instagram',
                    'url' => '#',
                    'icon' => 'ion-logo-instagram'
                ],
                [
                    'platform' => 'LinkedIn',
                    'url' => '#',
                    'icon' => 'ion-logo-linkedin'
                ]
            ]),
            'map_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12345.67890!2d41.123456!3d37.123456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzfCsDA3JzM0LjQiTiA0McKwMDcnMzQuNCJF!5e0!3m2!1str!2str!4v1234567890" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
} 