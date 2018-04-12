<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KlakTeamsUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klak_teamUsers', function (Blueprint $table) {
            Schema::dropIfExists('klak_teamUsers');

            $table->increments('id');

            $table->unsignedInteger('idUser');
            $table->foreign('idUser')->references('id')->on('users');

            $table->unsignedInteger('idTeam');
            $table->foreign('idTeam')->references('id')->on('klak_teams');

            $table->string('name');
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
        Schema::drop('klak_teamUsers');
    }
}
