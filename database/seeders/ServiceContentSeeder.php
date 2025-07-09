<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceContentSeeder extends Seeder
{
    public function run()
    {
        DB::table('service_contents')->truncate();
        DB::table('service_contents')->insert([
            'title' => 'Sunduğumuz Hizmetler',
            'main_content' => 'Midyat\'ta emlak sektöründe kapsamlı hizmetler sunuyoruz',
            'services' => json_encode([
                [
                    'title' => 'Konut Alım-Satım',
                    'description' => 'Satılık ve kiralık konutlar için profesyonel danışmanlık hizmeti sunuyoruz.',
                    'icon' => 'ion-ios-home',
                    'features' => ['Daire ve Villa Satışı', 'Kiralık Konut Hizmeti', 'Değerleme ve Fiyat Analizi', 'Pazarlık ve Müzakere Desteği']
                ],
                [
                    'title' => 'Ticari Gayrimenkul',
                    'description' => 'Ofis, dükkan, depo gibi ticari gayrimenkuller için özel hizmetler.',
                    'icon' => 'ion-ios-business',
                    'features' => ['Ofis ve Dükkan Satışı', 'Depo ve Fabrika Hizmeti', 'Yatırım Danışmanlığı', 'Kira Yönetimi']
                ],
                [
                    'title' => 'Arsa ve Tarla',
                    'description' => 'Arsa, tarla ve bahçe alım-satım konularında uzman hizmet.',
                    'icon' => 'ion-ios-location',
                    'features' => ['Arsa Satışı', 'Tarla ve Bahçe Hizmeti', 'İmar Durumu Kontrolü', 'Tapu İşlemleri']
                ],
                [
                    'title' => 'Parsel Sorgulama',
                    'description' => 'TKGM entegrasyonu ile anlık parsel sorgulama hizmeti.',
                    'icon' => 'ion-ios-search',
                    'features' => ['Anlık Parsel Bilgisi', 'Tapu Durumu Kontrolü', 'İmar Bilgileri', 'Mülkiyet Analizi']
                ],
                [
                    'title' => 'Tapu İşlemleri',
                    'description' => 'Tapu işlemleri ve resmi süreçlerde profesyonel destek.',
                    'icon' => 'ion-ios-document',
                    'features' => ['Tapu Devir İşlemleri', 'İpotek İşlemleri', 'Belge Hazırlama', 'Resmi Süreç Takibi']
                ],
                [
                    'title' => 'Değerleme',
                    'description' => 'Gayrimenkul değerleme ve fiyat analizi hizmetleri.',
                    'icon' => 'ion-ios-calculator',
                    'features' => ['Piyasa Analizi', 'Değerleme Raporu', 'Fiyat Tahmini', 'Yatırım Danışmanlığı']
                ]
            ]),
            'process_steps' => json_encode([
                [
                    'number' => 1,
                    'title' => 'İlk Görüşme',
                    'description' => 'İhtiyaçlarınızı dinleyip size en uygun seçenekleri sunuyoruz.'
                ],
                [
                    'number' => 2,
                    'title' => 'Araştırma',
                    'description' => 'Piyasayı analiz edip size en uygun gayrimenkulleri buluyoruz.'
                ],
                [
                    'number' => 3,
                    'title' => 'Görüntüleme',
                    'description' => 'Seçtiğimiz gayrimenkulleri birlikte görüntülüyoruz.'
                ],
                [
                    'number' => 4,
                    'title' => 'Anlaşma',
                    'description' => 'Kararınızı verdikten sonra tüm işlemleri tamamlıyoruz.'
                ]
            ]),
            'pricing_plans' => json_encode([
                [
                    'title' => 'Temel Hizmet',
                    'price' => '%2',
                    'features' => ['Gayrimenkul Arama', 'Görüntüleme Desteği', 'Temel Danışmanlık', 'İletişim Koordinasyonu'],
                    'featured' => false
                ],
                [
                    'title' => 'Kapsamlı Hizmet',
                    'price' => '%3',
                    'features' => ['Tüm Temel Hizmetler', 'Değerleme Raporu', 'Pazarlık Desteği', 'Tapu İşlemleri', 'Kredi Danışmanlığı'],
                    'featured' => true
                ],
                [
                    'title' => 'Premium Hizmet',
                    'price' => '%4',
                    'features' => ['Tüm Kapsamlı Hizmetler', 'Özel Pazarlama', 'Hukuki Danışmanlık', 'Sigorta Hizmetleri', '7/24 Destek'],
                    'featured' => false
                ]
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
} 