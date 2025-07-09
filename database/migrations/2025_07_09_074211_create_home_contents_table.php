<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('home_contents', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title');
            $table->text('hero_subtitle');
            $table->string('hero_button_text');
            $table->string('hero_button_url');
            
            // Hakkimizda Bolumu
            $table->string('about_title');
            $table->text('about_content');
            $table->json('about_features')->nullable();
            
            // Istatistikler
            $table->json('statistics')->nullable();
            
            // Ana Sayfa Hizmetler Bolumu (Tanıtımsal)
            $table->string('home_services_title');
            $table->text('home_services_subtitle');
            $table->json('home_services')->nullable();
            
            // One Cikan Ilanlar
            $table->string('featured_title');
            $table->text('featured_subtitle');
            
            // Musteri Yorumlari
            $table->string('testimonials_title');
            $table->text('testimonials_subtitle');
            $table->json('testimonials')->nullable();
            
            // Iletisim CTA
            $table->string('cta_title');
            $table->text('cta_content');
            $table->string('cta_button_text');
            $table->string('cta_button_url');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_contents');
    }
};
