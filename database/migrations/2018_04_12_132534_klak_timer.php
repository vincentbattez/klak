<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KlakTimer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klak_timer', function (Blueprint $table) {
            Schema::dropIfExists('klak_timer');

            $table->increments('id');

            $table->unsignedInteger('idTask');
            $table->foreign('idTask')->references('id')->on('klak_tasks');

            $table->unsignedInteger('idUser');
            $table->foreign('idUser')->references('id')->on('klak_users');

            $table->string('slug');
            $table->string('content');
            $table->tinyInteger('status');
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
        Schema::drop('klak_timer');
    }
}
