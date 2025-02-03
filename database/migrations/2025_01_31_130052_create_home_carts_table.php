<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('home_carts', function (Blueprint $table) {
            $table->id();
            $table->string('image_path');
            $table->text('alt_az');
            $table->text('alt_en');
            $table->text('alt_ru');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_carts');
    }
}; 