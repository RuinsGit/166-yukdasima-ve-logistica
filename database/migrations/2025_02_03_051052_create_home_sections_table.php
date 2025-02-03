<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('home_sections', function (Blueprint $table) {
            $table->id();
            $table->string('name_az');
            $table->string('name_en');
            $table->string('name_ru');
            $table->unsignedInteger('number_one');
            $table->unsignedInteger('number_two');
            $table->text('text_one_az');
            $table->text('text_one_en');
            $table->text('text_one_ru');
            $table->text('text_two_az');
            $table->text('text_two_en');
            $table->text('text_two_ru');
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
        Schema::dropIfExists('home_sections');
    }
}; 