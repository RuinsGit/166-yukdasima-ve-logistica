<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBottomImageToHomeSectionsTable extends Migration
{
    public function up()
    {
        Schema::table('home_sections', function (Blueprint $table) {
            if (!Schema::hasColumn('home_sections', 'bottom_image_path')) {
                $table->string('bottom_image_path')->nullable()->after('image_path');
                $table->text('bottom_alt_az')->nullable();
                $table->text('bottom_alt_en')->nullable();
                $table->text('bottom_alt_ru')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('home_sections', function (Blueprint $table) {
            $table->dropColumn([
                'bottom_image_path',
                'bottom_alt_az',
                'bottom_alt_en',
                'bottom_alt_ru'
            ]);
        });
    }
} 