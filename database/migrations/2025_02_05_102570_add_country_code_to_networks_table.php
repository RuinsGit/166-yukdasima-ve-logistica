<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('networks', function (Blueprint $table) {
            $table->string('country_code', 3)->after('name_ru')->nullable();
        });
    }

    public function down()
    {
        Schema::table('networks', function (Blueprint $table) {
            $table->dropColumn('country_code');
        });
    }
}; 