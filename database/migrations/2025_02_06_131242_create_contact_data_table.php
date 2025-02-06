<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('contact_data', function (Blueprint $table) {
            $table->id();
            $table->string('title_az');
            $table->string('title_en');
            $table->string('title_ru');
            $table->text('text_az');
            $table->text('text_en');
            $table->text('text_ru');
            $table->string('contact_title_az');
            $table->string('contact_title_en');
            $table->string('contact_title_ru');
            $table->string('image_path');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_data');
    }
}; 