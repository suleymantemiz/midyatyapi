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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estate_id');
            $table->string('name'); // Kullanıcı adı
            $table->string('email'); // E-posta
            $table->text('comment'); // Yorum
            $table->integer('rating')->default(5); // Puan (1-5)
            $table->boolean('is_approved')->default(false); // Onay durumu
            $table->timestamps();

            $table->foreign('estate_id')->references('id')->on('estates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
}; 