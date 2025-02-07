<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('our_clients', function (Blueprint $table) {
            $table->id();
            // Main Section
            $table->string('main_image_path');
            $table->text('text_az');
            $table->text('text_en');
            $table->text('text_ru');
            $table->text('description_az');
            $table->text('description_en');
            $table->text('description_ru');
            $table->string('main_alt_az');
            $table->string('main_alt_en');
            $table->string('main_alt_ru');
            
            // Bottom Images
            $table->string('bottom_image1_path');
            $table->string('bottom_image2_path');
            $table->string('bottom1_alt_az');
            $table->string('bottom1_alt_en');
            $table->string('bottom1_alt_ru');
            $table->string('bottom2_alt_az');
            $table->string('bottom2_alt_en');
            $table->string('bottom2_alt_ru');
            
            $table->boolean('status')->default(true);
            $table->string('meta_title_az')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->string('meta_title_ru')->nullable();
            $table->string('meta_description_az', 500)->nullable();
            $table->string('meta_description_en', 500)->nullable();
            $table->string('meta_description_ru', 500)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('our_clients');
    }
}; 