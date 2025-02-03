<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('home_cart_twos', function (Blueprint $table) {
            $table->id();
            $table->text('text_az');
            $table->text('text_en');
            $table->text('text_ru');
            $table->string('image_path');
            $table->string('alt_az');
            $table->string('alt_en');
            $table->string('alt_ru');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_cart_twos');
    }
}; 