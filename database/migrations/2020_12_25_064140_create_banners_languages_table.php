<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners_languages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('banner_id')->constrained('banners')->onDelete('cascade');
            $table->foreignId('language_id')->constrained('localizations')->onDelete('cascade');
            $table->string('header');
            $table->string('header_1');
            $table->string('header_2');
            $table->string('header_3');
            $table->text('text');
            $table->text('text_1');
            $table->text('text_2');
            $table->text('text_3');
            $table->index(['banner_id', 'language_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners_languages');
    }
}
