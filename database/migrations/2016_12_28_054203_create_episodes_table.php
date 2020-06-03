<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('quality');
            $table->integer('category')->unsigned();
            $table->integer('tvseries_id')->unsigned();
            $table->string('size');
            $table->string('path');
            $table->integer('season');
            $table->integer('episode');
            $table->integer('views')->nullable();
            $table->tinyInteger('published')->nullable();
            $table->integer('uploaded_by')->unsigned();
            $table->timestamps();

            
            $table->foreign('category')->references('id')->on('submenus')->onDelete('cascade');
            $table->foreign('tvseries_id')->references('id')->on('tvseries')->onDelete('cascade');
            $table->foreign('uploaded_by')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodes');
    }
}
