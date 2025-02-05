<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('name_az');
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('slug_az')->unique();
            $table->string('slug_en')->unique();
            $table->string('slug_ru')->unique();
            $table->text('text_az');
            $table->text('text_en');
            $table->text('text_ru');
            $table->text('text_2_az')->nullable();
            $table->text('text_2_en')->nullable();
            $table->text('text_2_ru')->nullable();
            $table->longText('description_az')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_ru')->nullable();
            $table->longText('description_2_az')->nullable();
            $table->longText('description_2_en')->nullable();
            $table->longText('description_2_ru')->nullable();
            $table->longText('description_3_az')->nullable();
            $table->longText('description_3_en')->nullable();
            $table->longText('description_3_ru')->nullable();
            $table->string('meta_title_az')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->string('meta_title_ru')->nullable();
            $table->text('meta_description_az')->nullable();
            $table->text('meta_description_en')->nullable();
            $table->text('meta_description_ru')->nullable();
            $table->string('image_path')->nullable();
            $table->string('bottom_image_path')->nullable();
            $table->json('multiple_image_path')->nullable();
            $table->string('alt_az')->nullable();
            $table->string('alt_en')->nullable();
            $table->string('alt_ru')->nullable();
            $table->string('bottom_alt_az')->nullable();
            $table->string('bottom_alt_en')->nullable();
            $table->string('bottom_alt_ru')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}; 