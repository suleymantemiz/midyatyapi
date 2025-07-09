<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contact_contents', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('main_content')->nullable();
            $table->text('contact_info')->nullable(); // JSON formatında iletişim bilgileri
            $table->text('working_hours')->nullable(); // JSON formatında çalışma saatleri
            $table->text('social_links')->nullable(); // JSON formatında sosyal medya linkleri
            $table->text('map_embed')->nullable(); // Google Maps embed kodu
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_contents');
    }
}; 