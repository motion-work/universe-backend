<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalaxySkillSetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galaxy_skill_set', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('galaxy_id')->unsigned();
            $table->integer('skill_set_id')->unsigned();
            $table->timestamps();

            $table->foreign('galaxy_id')->references('id')->on('galaxies');
            $table->foreign('skill_set_id')->references('id')->on('skill_sets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('create_galaxy_skill_set_table');
    }
}
