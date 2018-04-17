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
            
            $table->string('name');
            $table->string('slug');
            $table->string('content');
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
