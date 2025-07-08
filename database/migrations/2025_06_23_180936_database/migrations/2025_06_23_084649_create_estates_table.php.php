<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Önce boolean alanların verisini geçici olarak metne çevirelim
        DB::statement("UPDATE estates SET furnished = IF(furnished = 1, 'Evet', 'Hayır')");
        DB::statement("UPDATE estates SET available_for_credit = IF(available_for_credit = 1, 'Evet', 'Hayır')");
        DB::statement("UPDATE estates SET exchange = IF(exchange = 1, 'Var', 'Yok')");
        DB::statement("UPDATE estates SET parking = NULL"); // Park verisi anlamsız olduğu için sıfırlanıyor

        // Eski verileri temizle
        DB::statement("UPDATE estates SET title_deed_status = NULL");
        DB::statement("UPDATE estates SET from_person = NULL");

        // site_content alanını mevcut verilere göre Evet/Hayır olarak güncelle
        DB::statement("UPDATE estates SET site_content = 'Hayır' WHERE site_name IS NULL OR site_name = ''");
        DB::statement("UPDATE estates SET site_content = 'Evet' WHERE site_name IS NOT NULL AND site_name != ''");

        // Şimdi sütun tiplerini ENUM olarak değiştirelim
        DB::statement("ALTER TABLE estates MODIFY furnished ENUM('Evet', 'Hayır') NULL");
        DB::statement("ALTER TABLE estates MODIFY available_for_credit ENUM('Evet', 'Hayır') NULL");
        DB::statement("ALTER TABLE estates MODIFY exchange ENUM('Var', 'Yok') NULL");
        DB::statement("ALTER TABLE estates MODIFY parking ENUM('Yok', 'Açık Otopark', 'Kapalı Otopark') NULL");

        // String alanları ENUM'a çevirmeden önce eski verileri yeni değerlere dönüştür
        DB::statement("UPDATE estates SET type = 'Arsa' WHERE type IN ('Tarla', 'Bağ', 'Bahçe')");
        DB::statement("UPDATE estates SET type = 'Daire' WHERE type = 'Ev-Konut'");

        // usage_status değerlerini geçici olarak NULL yap
        DB::statement("UPDATE estates SET usage_status = NULL");

        // heating değerlerini geçici olarak NULL yap
        DB::statement("UPDATE estates SET heating = NULL");

        // String alanları ENUM'a çevirelim
        DB::statement("ALTER TABLE estates MODIFY type ENUM('Daire', 'Müstakil', 'Arsa', 'Dükkan', 'Ofis', 'Villa') NOT NULL");
        DB::statement("ALTER TABLE estates MODIFY status ENUM('Satılık', 'Kiralık') NOT NULL");
        DB::statement("ALTER TABLE estates MODIFY usage_status ENUM('Boş', 'Kiracı', 'Ev Sahibi', 'İnşaat Halinde') NULL");
        DB::statement("ALTER TABLE estates MODIFY heating ENUM('Doğalgaz', 'Soba', 'Klima', 'Merkezi', 'Yok') NULL");
        DB::statement("ALTER TABLE estates MODIFY title_deed_status ENUM('Kat Mülkiyetli', 'Kat İrtifaklı', 'Arsa Tapulu', 'Hisseli Tapulu') NULL");
        DB::statement("ALTER TABLE estates MODIFY from_person ENUM('Sahibinden', 'Emlakçıdan', 'Bankadan', 'Müteahhitten') NULL");
        DB::statement("ALTER TABLE estates MODIFY site_content ENUM('Evet', 'Hayır') NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Tipleri eski haline (yaklaşık olarak) döndür
        DB::statement("ALTER TABLE estates MODIFY furnished BOOLEAN NULL");
        DB::statement("ALTER TABLE estates MODIFY available_for_credit BOOLEAN NULL");
        DB::statement("ALTER TABLE estates MODIFY exchange BOOLEAN NULL");
        DB::statement("ALTER TABLE estates MODIFY parking BOOLEAN NULL");
        DB::statement("ALTER TABLE estates MODIFY type VARCHAR(255) NOT NULL");
        DB::statement("ALTER TABLE estates MODIFY status VARCHAR(255) NOT NULL");
        DB::statement("ALTER TABLE estates MODIFY usage_status VARCHAR(255) NULL");
        DB::statement("ALTER TABLE estates MODIFY heating VARCHAR(255) NULL");
        DB::statement("ALTER TABLE estates MODIFY title_deed_status VARCHAR(255) NULL");
        DB::statement("ALTER TABLE estates MODIFY from_person VARCHAR(255) NULL");
        DB::statement("ALTER TABLE estates MODIFY site_content VARCHAR(255) NULL");
    }
};
