<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KlakTeams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klak_teams', function (Blueprint $table) {
            Schema::dropIfExists('klak_teams');

            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('img');
            $table->string('imgSmall');
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
        Schema::drop('klak_teams');
    }
}
