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

            $table->unsignedInteger('id_user')->index();
            $table->foreign('id_user')->references('id')->on('klak_users')->onDelete('cascade');

            $table->unsignedInteger('id_team')->index();
            $table->foreign('id_team')->references('id')->on('klak_teams')->onDelete('cascade');
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
