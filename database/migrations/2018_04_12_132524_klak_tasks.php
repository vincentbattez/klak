<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KlakTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klak_tasks', function (Blueprint $table) {
            Schema::dropIfExists('klak_tasks');

            $table->increments('id');

            $table->unsignedInteger('id_project')->index();
            $table->foreign('id_project')->references('id')->on('klak_projects')->onDelete('cascade');

            $table->unsignedInteger('id_user')->index();
            $table->foreign('id_user')->references('id')->on('klak_users')->onDelete('cascade');
            
            $table->string('name');
            $table->integer('status');
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
        Schema::drop('klak_tasks');
    }
}
