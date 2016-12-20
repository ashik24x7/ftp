<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('year')->nullable();
            $table->string('api_id')->unique();
            $table->string('quality');
            $table->integer('category')->unsigned();
            $table->string('trailer',1500)->nullable();
            $table->string('rating')->nullable();
            $table->string('genre',1500)->nullable();
            $table->string('cast',2500)->nullable();
            $table->string('release_date')->nullable();
            $table->string('language',1500)->nullable();
            $table->string('website')->nullable();
            $table->string('time')->nullable();
            $table->string('size');
            $table->string('keyword',2500)->nullable();
            $table->string('story',1500)->nullable();
            $table->string('path');
            $table->string('subtitle')->nullable();
            $table->string('poster');
            $table->integer('views')->nullable();
            $table->tinyInteger('published')->nullable();
            $table->integer('uploaded_by')->unsigned();
            $table->timestamps();

            
            $table->foreign('category')->references('id')->on('submenus')->onDelete('cascade');
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
        Schema::dropIfExists('movies');
    }
}
