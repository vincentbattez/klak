<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KlakProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klak_projects', function (Blueprint $table) {
            Schema::dropIfExists('klak_projects');

            $table->increments('id');

            $table->unsignedInteger('id_team')->index();
            $table->foreign('id_team')->references('id')->on('klak_teams')->onDelete('cascade');

            $table->string('name');
            $table->string('slug')->unique();
            $table->string('img')->nullable();
            $table->string('imgSmall')->nullable();
            
            $table->date('deadline');
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
        Schema::drop('klak_projects');
    }
}
