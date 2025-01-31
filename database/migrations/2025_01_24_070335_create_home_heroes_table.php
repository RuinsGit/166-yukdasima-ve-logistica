<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('home_heroes', function (Blueprint $table) {
            $table->id();
            $table->enum('media_type', ['image', 'video'])->default('image');
            $table->string('media_path');
            $table->text('alt_az')->nullable();
            $table->text('alt_en')->nullable();
            $table->text('alt_ru')->nullable();
            $table->string('video_title')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_heroes');
    }
}; 