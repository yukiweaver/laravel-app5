<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActressItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actress_item', function (Blueprint $table) {
            $table->unsignedBigInteger('actress_id');
            $table->unsignedBigInteger('item_id');
            $table->timestamps();
            $table->primary(['actress_id', 'item_id']);

            $table->foreign('actress_id')->references('id')->on('actresses')->onDelete('cascade');
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
        Schema::dropIfExists('actress_item');
    }
}
