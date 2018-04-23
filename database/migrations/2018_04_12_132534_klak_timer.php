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

            $table->unsignedInteger('id_task')->index();
            $table->foreign('id_task')->references('id')->on('klak_tasks')->onDelete('cascade');

            $table->unsignedInteger('id_user')->index();
            $table->foreign('id_user')->references('id')->on('klak_users')->onDelete('cascade');

            $table->timestampTz('start_time')->nullable();
            $table->timestampTz('end_time')->nullable();
            $table->integer('total_time')->nullable();

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
