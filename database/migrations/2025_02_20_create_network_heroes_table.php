<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('network_heroes', function (Blueprint $table) {
            $table->id();
            $table->string('image_path')->nullable();
            $table->string('alt_az')->nullable();
            $table->string('alt_en')->nullable();
            $table->string('alt_ru')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('network_heroes');
    }
}; 