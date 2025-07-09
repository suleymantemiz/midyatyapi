<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomeContent;

class HomeContentSeeder extends Seeder
{
    public function run()
    {
        HomeContent::create([
            'hero_title' => 'Midyat\'ta Güvenilir Emlak Çözümleri',
            'hero_subtitle' => 'Hayalinizdeki evi bulun, güvenle yatırım yapın',
            'hero_button_text' => 'İlanları İncele',
            'hero_button_url' => '/properties',
            
            'about_title' => 'Neden Bizi Seçmelisiniz?',
            'about_content' => 'Midyat\'ta emlak sektöründe uzun yıllar deneyimimizle, size en uygun gayrimenkulü bulmanızda yardımcı oluyoruz.',
            'about_features' => [
                'Profesyonel Danışmanlık',
                'Güvenilir Hizmet',
                'Hızlı Çözüm',
                'Müşteri Memnuniyeti'
            ],
            
            'statistics' => [
                '500+ Mutlu Müşteri',
                '1000+ Tamamlanan İşlem',
                '10+ Yıllık Deneyim',
                '%98 Müşteri Memnuniyeti'
            ],
            
            'home_services_title' => 'Sunduğumuz Hizmetler',
            'home_services_subtitle' => 'Kapsamlı emlak hizmetlerimizle yanınızdayız',
            'home_services' => [
                [
                    'title' => 'Kredi Desteği',
                    'description' => 'Midyat\'ta emlak alımında kredi desteği sağlıyoruz. Bankalarla anlaşmalı çözümlerimizle hayalinizdeki eve kavuşun.'
                ],
                [
                    'title' => 'Nakit Alım',
                    'description' => 'Nakit alım yapmak isteyen müşterilerimiz için özel fırsatlar sunuyoruz. Hızlı ve güvenli işlem garantisi.'
                ],
                [
                    'title' => 'Uzman Danışmanlık',
                    'description' => 'Midyat\'ın en deneyimli emlak uzmanları size hizmet veriyor. Her adımda yanınızdayız.'
                ],
                [
                    'title' => 'Sabit Fiyat Garantisi',
                    'description' => 'Anlaştığımız fiyatlar değişmez. Şeffaf ve güvenilir fiyatlandırma politikamızla hizmetinizdeyiz.'
                ]
            ],
            
            'featured_title' => 'Öne Çıkan İlanlar',
            'featured_subtitle' => 'Sizin için seçtiğimiz özel teklifler',
            
            'testimonials_title' => 'Müşteri Yorumları',
            'testimonials_subtitle' => 'Müşterilerimizin deneyimleri',
            'testimonials' => [
                '"Harika hizmet aldık, çok teşekkürler" - Ahmet Yılmaz',
                '"Güvenilir ve profesyonel ekip" - Fatma Demir',
                '"Hayalimizdeki evi bulduk" - Mehmet Kaya',
                '"Kesinlikle tavsiye ederim" - Ayşe Özkan'
            ],
            
            'cta_title' => 'Hayalinizdeki Evi Bulun',
            'cta_content' => 'Uzman ekibimizle iletişime geçin, size en uygun çözümü sunalım',
            'cta_button_text' => 'İletişime Geç',
            'cta_button_url' => '/contact',
        ]);
    }
} 