<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('services_heroes', function (Blueprint $table) {
            $table->id();
            // Main Section
            $table->string('main_image_path');
            
            // Experience Section
            $table->string('experience_text_az');
            $table->string('experience_text_en');
            $table->string('experience_text_ru');
            $table->text('experience_description_az');
            $table->text('experience_description_en');
            $table->text('experience_description_ru');
            $table->string('experience_image_path');
            
            // Manager Section
            $table->string('manager_text_az');
            $table->string('manager_text_en');
            $table->string('manager_text_ru');
            $table->text('manager_description_az');
            $table->text('manager_description_en');
            $table->text('manager_description_ru');
            $table->string('manager_image_path');
            
            // Security Section
            $table->string('security_text_az');
            $table->string('security_text_en');
            $table->string('security_text_ru');
            $table->text('security_description_az');
            $table->text('security_description_en');
            $table->text('security_description_ru');
            $table->string('security_image_path');
            
            // Alt Tags for Images
            $table->string('main_image_alt_az');
            $table->string('main_image_alt_en');
            $table->string('main_image_alt_ru');
            $table->string('experience_image_alt_az');
            $table->string('experience_image_alt_en');
            $table->string('experience_image_alt_ru');
            $table->string('manager_image_alt_az');
            $table->string('manager_image_alt_en');
            $table->string('manager_image_alt_ru');
            $table->string('security_image_alt_az');
            $table->string('security_image_alt_en');
            $table->string('security_image_alt_ru');
            
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('services_heroes');
    }
}; 