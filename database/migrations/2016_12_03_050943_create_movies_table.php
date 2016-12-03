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
            $table->string('api_id');
            $table->string('quality');
            $table->string('category');
            $table->string('trailer')->nullable();
            $table->string('rating')->nullable();
            $table->string('genre')->nullable();
            $table->string('release_date')->nullable();
            $table->string('language',800)->nullable();
            $table->string('website')->nullable();
            $table->string('time')->nullable();
            $table->string('keyword',800)->nullable();
            $table->string('story',800)->nullable();
            $table->string('path');
            $table->string('subtitle')->nullable();
            $table->string('poster');
            $table->string('views')->nullable();
            $table->string('published')->nullable();
            $table->string('uploaded_by');
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
        Schema::dropIfExists('movies');
    }
}
