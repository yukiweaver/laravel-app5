<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenreItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre_item', function (Blueprint $table) {
          $table->unsignedBigInteger('genre_id');
          $table->unsignedBigInteger('item_id');
          $table->timestamps();
          $table->primary(['genre_id', 'item_id']);

          $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
          $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre_item');
    }
}
