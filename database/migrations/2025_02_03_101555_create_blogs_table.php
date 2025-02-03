<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_type_id')->constrained()->onDelete('cascade');
            $table->string('name_az');
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('slug_az')->unique();
            $table->string('slug_en')->unique();
            $table->string('slug_ru')->unique();
            $table->text('text_az');
            $table->text('text_en');
            $table->text('text_ru');
            $table->text('description_az');
            $table->text('description_en');
            $table->text('description_ru');
            $table->string('meta_title_az')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->string('meta_title_ru')->nullable();
            $table->text('meta_description_az')->nullable();
            $table->text('meta_description_en')->nullable();
            $table->text('meta_description_ru')->nullable();
            $table->string('image_path');
            $table->string('bottom_image_path');
            $table->string('alt_az');
            $table->string('alt_en');
            $table->string('alt_ru');
            $table->string('bottom_alt_az');
            $table->string('bottom_alt_en');
            $table->string('bottom_alt_ru');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}; 