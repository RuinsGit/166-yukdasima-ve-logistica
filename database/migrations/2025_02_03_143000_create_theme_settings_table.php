<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('theme_settings', function (Blueprint $table) {
            $table->id();
            $table->string('background_type')->nullable()->default('image'); // image/color
            $table->string('background_image')->nullable();
            $table->string('background_color')->nullable()->default('#ffffff');
            $table->string('header_color')->nullable()->default('#2a3042');
            $table->string('sidebar_width')->nullable()->default('default'); // default/compact/wide
            $table->boolean('dark_mode')->nullable()->default(false);
            $table->text('footer_text')->nullable();
            $table->string('footer_bg_color')->nullable()->default('#2a3042');
            $table->string('footer_text_color')->nullable()->default('#ffffff');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('theme_settings');
    }
}; 