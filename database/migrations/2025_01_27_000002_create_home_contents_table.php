<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
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
            
            // Hizmetler Bolumu
            $table->string('services_title');
            $table->text('services_subtitle');
            $table->json('services')->nullable();
            
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

    public function down()
    {
        Schema::dropIfExists('home_contents');
    }
}; 