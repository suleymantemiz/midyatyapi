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
    Schema::create('estates', function (Blueprint $table) {
        $table->id();
            $table->enum('type', ['Daire', 'Müstakil', 'Arsa', 'Dükkan', 'Ofis', 'Villa']);
            $table->enum('status', ['Satılık', 'Kiralık']);
        $table->string('name');
        $table->decimal('price', 15, 2);
        $table->string('main_image')->nullable();
        $table->string('parcel_number')->nullable();
        $table->text('features')->nullable();
        // Yeni ek alanlar:
        $table->integer('gross_m2')->nullable(); // m² (Gross)
        $table->integer('net_m2')->nullable();   // m² (Net)
        $table->integer('open_area_m2')->nullable(); // Open Area m²
        $table->integer('number_of_rooms')->nullable(); // Number of Rooms
        $table->integer('building_age')->nullable(); // Building Age
        $table->integer('number_of_floors')->nullable(); // Number of Floors
            $table->enum('heating', ['Doğalgaz', 'Soba', 'Klima', 'Merkezi', 'Yok'])->nullable();
        $table->integer('number_of_bathrooms')->nullable(); // Number of Bathrooms
        $table->string('kitchen')->nullable(); // Kitchen (Amerikan, Ayrı vs.)
            $table->enum('parking', ['Yok', 'Açık Otopark', 'Kapalı Otopark'])->nullable();
            $table->enum('furnished', ['Evet', 'Hayır'])->nullable();
            $table->enum('usage_status', ['Boş', 'Kiracı', 'Ev Sahibi', 'İnşaat Halinde'])->nullable();
        $table->text('site_content')->nullable(); // Site İçeriği
        $table->string('site_name')->nullable(); // Site Adı
        $table->decimal('help_tl', 15, 2)->nullable(); // Aidat (Help TL)
            $table->enum('available_for_credit', ['Evet', 'Hayır'])->nullable();
        $table->string('title_deed_status')->nullable(); // Tapu Durumu
        $table->string('from_person')->nullable(); // Sahibinden/Emlakçı
            $table->enum('exchange', ['Var', 'Yok'])->nullable();

        $table->timestamps();
        $table->softDeletes();
    });

        // furnished
        DB::statement("ALTER TABLE estates MODIFY furnished ENUM('Evet', 'Hayır') NULL");
        DB::statement("UPDATE estates SET furnished = 'Evet' WHERE furnished = 1");
        DB::statement("UPDATE estates SET furnished = 'Hayır' WHERE furnished = 0");

        // available_for_credit
        DB::statement("ALTER TABLE estates MODIFY available_for_credit ENUM('Evet', 'Hayır') NULL");
        DB::statement("UPDATE estates SET available_for_credit = 'Evet' WHERE available_for_credit = 1");
        DB::statement("UPDATE estates SET available_for_credit = 'Hayır' WHERE available_for_credit = 0");

        // parking
        DB::statement("ALTER TABLE estates MODIFY parking ENUM('Yok', 'Açık Otopark', 'Kapalı Otopark') NULL");
        // Burada eski boolean değerler için uygun bir eşleme yapılmalı, örneğin:
        // 1 → 'Yok', 0 → 'Açık Otopark' gibi, eğer eski verilerde anlamlı bir karşılık yoksa elle güncellenmeli.

        // exchange
        DB::statement("ALTER TABLE estates MODIFY exchange ENUM('Var', 'Yok') NULL");
        DB::statement("UPDATE estates SET exchange = 'Var' WHERE exchange = 1");
        DB::statement("UPDATE estates SET exchange = 'Yok' WHERE exchange = 0");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estates');

        // Geriye dönüş için tekrar boolean'a çevirebilirsin (isteğe bağlı)
        DB::statement("ALTER TABLE estates MODIFY furnished BOOLEAN NULL");
        DB::statement("ALTER TABLE estates MODIFY available_for_credit BOOLEAN NULL");
        DB::statement("ALTER TABLE estates MODIFY parking BOOLEAN NULL");
        DB::statement("ALTER TABLE estates MODIFY exchange BOOLEAN NULL");
    }
};
