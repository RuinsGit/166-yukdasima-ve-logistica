<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleImagesToContactsTable extends Migration
{
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            // Number Title Images
            $table->string('number_title_az')->nullable()->after('number_image');
            $table->string('number_title_en')->nullable()->after('number_title_az');
            $table->string('number_title_ru')->nullable()->after('number_title_en');
            
            // Mail Title Images
            $table->string('mail_title_az')->nullable()->after('mail_image');
            $table->string('mail_title_en')->nullable()->after('mail_title_az');
            $table->string('mail_title_ru')->nullable()->after('mail_title_en');
            
            // Address Title Images
            $table->string('address_title_az')->nullable()->after('address_image');
            $table->string('address_title_en')->nullable()->after('address_title_az');
            $table->string('address_title_ru')->nullable()->after('address_title_en');
        });
    }

    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn([
                'number_title_az',
                'number_title_en',
                'number_title_ru',
                'mail_title_az',
                'mail_title_en',
                'mail_title_ru',
                'address_title_az',
                'address_title_en',
                'address_title_ru'
            ]);
        });
    }
} 