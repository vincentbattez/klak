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
            $table->primary('id')->autoIncrement();

            $table->unsignedInteger('idUser');
            $table->foreign('idUser')->references('id')->on('klak_users');

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
