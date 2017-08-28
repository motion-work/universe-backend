<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillSetItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_set_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('skill_set_id')->unsigned();
            $table->string('title');
            $table->text('description');
            $table->timestamps();

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
        Schema::dropIfExists('skill_set_items');
    }
}
