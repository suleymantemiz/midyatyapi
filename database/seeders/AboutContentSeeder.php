<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AboutContentSeeder extends Seeder
{
    public function run()
    {
        DB::table('about_contents')->truncate();
        DB::table('about_contents')->insert([
            'title' => "Midyat Emlak'a Hoş Geldiniz",
            'main_content' => "Mardin'in güzel ilçesi Midyat'ta güvenilir emlak hizmeti sunuyoruz.\n2010 yılından bu yana Midyat ve çevresinde emlak sektöründe faaliyet gösteren firmamız, müşterilerimize en kaliteli hizmeti sunmak için çalışmaktadır.\nDeneyimli ekibimiz ve güvenilir hizmet anlayışımızla, hayalinizdeki evi bulmanıza yardımcı oluyoruz.\nSatılık, kiralık konutlar, ticari gayrimenkuller ve arsa alım-satım konularında uzman kadromuzla hizmetinizdeyiz.",
            'features' => "Güvenilir Hizmet\nDeneyimli Ekip\nMüşteri Memnuniyeti\nProfesyonel Yaklaşım\nŞeffaf İletişim\nKaliteli Hizmet",
            'stats' => "500+|Mutlu Müşteri\n1000+|Tamamlanan İşlem\n15+|Yıllık Deneyim\n24/7|Müşteri Desteği",
            'contact' => "Adres|Midyat, Mardin, Türkiye\nTelefon|+90 482 123 45 67\nE-posta|info@midyatemlak.com\nÇalışma Saatleri|Pazartesi - Cumartesi: 09:00 - 18:00",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
} 