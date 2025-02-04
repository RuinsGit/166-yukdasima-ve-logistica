<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            
            // Çok dilli adres alanları
            $table->string('address_az');
            $table->string('address_en');
            $table->string('address_ru');
            $table->string('address_image');
            
            // Tek dilde mail ve numara
            $table->string('mail')->unique();
            $table->string('mail_image');
            $table->string('number');
            $table->string('number_image');
            
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}; 