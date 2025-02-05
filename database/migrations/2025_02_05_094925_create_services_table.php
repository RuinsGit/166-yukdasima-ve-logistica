<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_type_id')->constrained()->onDelete('cascade');
            $table->string('slug_az')->unique();
            $table->string('slug_en')->unique();
            $table->string('slug_ru')->unique();
            $table->string('name_az');
            $table->string('name_en');
            $table->string('name_ru');
            $table->text('text_az');
            $table->text('text_en');
            $table->text('text_ru');
            $table->text('description_az');
            $table->text('description_en');
            $table->text('description_ru');
            $table->string('image_main')->nullable();
            $table->string('image_main_alt_az')->nullable();
            $table->string('image_main_alt_en')->nullable();
            $table->string('image_main_alt_ru')->nullable();
            $table->string('image_bottom')->nullable();
            $table->string('image_bottom_alt_az')->nullable();
            $table->string('image_bottom_alt_en')->nullable();
            $table->string('image_bottom_alt_ru')->nullable();
            $table->text('description2_az')->nullable();
            $table->text('description2_en')->nullable();
            $table->text('description2_ru')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
}; 