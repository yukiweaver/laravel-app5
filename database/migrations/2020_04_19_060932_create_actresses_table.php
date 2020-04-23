<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actresses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_kana')->nullable();
            $table->string('bust')->nullable();
            $table->string('cup')->nullable();
            $table->string('waist')->nullable();
            $table->string('hip')->nullable();
            $table->string('height')->nullable();
            $table->string('birthday')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('hobby')->nullable();
            $table->string('prefectures')->nullable();
            $table->text('image_url')->nullable();
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
        Schema::dropIfExists('actresses');
    }
}
