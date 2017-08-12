<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalaxyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galaxy_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('galaxy_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('username')->unique();
            $table->timestamps();

            $table->foreign('galaxy_id')->references('id')->on('galaxies');
            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galaxy_user');
    }

}
