<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->string('id');
            $table->primary('id');
            $table->string('title');
            $table->text('item_url')->nullable();
            $table->text('affiliate_url')->nullable();
            $table->text('s_image_url')->nullable();
            $table->text('l_image_url')->nullable();
            $table->text('sample_image_url_1')->nullable();
            $table->text('sample_image_url_2')->nullable();
            $table->text('sample_image_url_3')->nullable();
            $table->text('sample_image_url_4')->nullable();
            $table->text('sample_image_url_5')->nullable();
            $table->string('price')->nullable();
            $table->datetime('release_date')->nullable();
            $table->string('series_name')->nullable();
            $table->string('maker_name')->nullable();
            $table->string('director_name')->nullable();
            $table->string('label_name')->nullable();
            $table->string('volume')->nullable();
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
        Schema::dropIfExists('items');
    }
}
