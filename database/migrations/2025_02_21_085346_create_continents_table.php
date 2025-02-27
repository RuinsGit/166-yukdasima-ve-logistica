<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('continents', function (Blueprint $table) {
            $table->id();
            $table->string('name_az');
            $table->string('name_en');
            $table->string('name_ru');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('continents');
    }
}; 