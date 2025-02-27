<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_photos', function (Blueprint $table) {
            $table->id();
            $table->string('title_az');
            $table->string('title_en');
            $table->string('title_ru');
            $table->string('image_path')->nullable();
            $table->string('image_alt')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_photos');
    }
}; 