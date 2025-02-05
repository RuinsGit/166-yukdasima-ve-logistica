<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('service_types', function (Blueprint $table) {
            $table->id();
            
            $table->string('name_az');
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('image')->nullable();
            $table->integer('number')->default(1);
            $table->boolean('status')->default(true);
            $table->timestamps();
            
            // İndeksler ekleyelim
            $table->index('status');
            $table->index('number');
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_types');
    }
}; 