<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillSetSubitemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_set_subitems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('skill_set_item_id')->unsigned();
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('skill_set_item_id')->references('id')->on('skill_set_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skill_set_subitem_table');
    }
}
