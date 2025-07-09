<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('service_contents', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('main_content')->nullable();
            $table->text('services')->nullable(); // JSON formatında hizmetler
            $table->text('process_steps')->nullable(); // JSON formatında süreç adımları
            $table->text('pricing_plans')->nullable(); // JSON formatında fiyatlandırma
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_contents');
    }
}; 