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

            $table->unsignedInteger('id_project');
            $table->foreign('id_project')->references('id')->on('klak_projects');

            $table->unsignedInteger('id_user');
            $table->foreign('id_user')->references('id')->on('klak_users');
            
            $table->string('name');
            $table->string('slug');
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
