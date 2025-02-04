<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            $table->string('name_az');
            $table->string('name_en');
            $table->string('name_ru');
            $table->text('text_az');
            $table->text('text_en');
            $table->text('text_ru');
            $table->text('description_az');
            $table->text('description_en');
            $table->text('description_ru');
            $table->string('image_path');
            $table->integer('services_number');
            $table->integer('customer_number');
            $table->integer('satisfied_number');
            $table->integer('transportations_number');
            $table->string('services_text_az');
            $table->string('services_text_en');
            $table->string('services_text_ru');
            $table->string('customer_text_az');
            $table->string('customer_text_en');
            $table->string('customer_text_ru');
            $table->string('satisfied_text_az');
            $table->string('satisfied_text_en');
            $table->string('satisfied_text_ru');
            $table->string('transportation_text_az');
            $table->string('transportation_text_en');
            $table->string('transportation_text_ru');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_pages');
    }
}; 