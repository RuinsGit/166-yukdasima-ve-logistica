<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('split_image_1')->nullable()->after('number_image');
            $table->string('split_image_2')->nullable()->after('split_image_1');
        });
    }

    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn(['split_image_1', 'split_image_2']);
        });
    }
}; 