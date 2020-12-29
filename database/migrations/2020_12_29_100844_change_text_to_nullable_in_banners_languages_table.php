<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTextToNullableInBannersLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banners_languages', function (Blueprint $table) {
            $table->text('text')->nullable()->change();
            $table->text('text_1')->nullable()->change();
            $table->text('text_2')->nullable()->change();
            $table->text('text_3')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banners_languages', function (Blueprint $table) {
            $table->text('text');
            $table->text('text_1');
            $table->text('text_2');
            $table->text('text_3');
        });
    }
}
