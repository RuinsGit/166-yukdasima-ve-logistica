<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('network_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('continent_id')->constrained()->onDelete('cascade');
            $table->string('ulke_adi_az');
            $table->string('ulke_adi_en');
            $table->string('ulke_adi_ru');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('network_sections');
    }
}; 