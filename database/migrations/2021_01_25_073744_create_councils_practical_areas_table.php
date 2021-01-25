<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouncilsPracticalAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('councils_practical_areas', function (Blueprint $table) {
            $table->bigInteger('council_id')->unsigned()->index();
            $table->bigInteger('practical_area_id')->unsigned()->index();

            $table->foreign('council_id')->references('id')->on('councils')->onDelete('cascade');
            $table->foreign('practical_area_id')->references('id')->on('practical_areas')->onDelete('cascade');

            $table->primary(['council_id','practical_area_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('councils_practical_areas');
    }
}
