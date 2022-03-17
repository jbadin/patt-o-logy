<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateA9bk4BreedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a9bk4_breeds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->text('description');
            $table->integer('id_petsCategories')->unsigned();
            $table->timestamps();
        });
        Schema::table('a9bk4_breeds', function ($table) {
            $table->foreign('id_petsCategories')->references('id')->on('a9bk4_pets_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('a9bk4_breeds');
    }
}
