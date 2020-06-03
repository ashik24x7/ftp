<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',1500);
            $table->string('folder_name',1500);
            $table->integer('category')->unsigned();
            $table->string('platform',1500);
            $table->string('size',1500);
            $table->string('cover');
            $table->string('path');
            $table->string('trailer');
            $table->integer('views');
            $table->text('details',5000);
            $table->integer('added_by')->unsigned();
            $table->timestamps();

            $table->foreign('category')->references('id')->on('submenus')->onDelete('cascade');
            $table->foreign('added_by')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
